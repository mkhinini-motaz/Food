<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\LoyaltyAction;
use App\Models\Order;
use App\Repositories\ClientRepository;
use App\Repositories\LoyaltyActionRepository;
use App\Support\OrangeSmsSender;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Helper\ProgressBar;

class SmsSender extends Command
{
    const PROGRESS_BAR_FORMAT = '%current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s%';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send sms to clients';

    /**
     * @var ProgressBar
     */
    private $progressBar;

    /**
     * @var Collection
     */
    private $existingClientsPhones;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static function sendWelcomeSms()
    {


    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->progressBar = $this->createProgressBar();
        if (! $this->progressBar) {
            $this->info('No new clients to add');
            return;
        }

        $message = 'بمناسبة مرور عام على إفتتاحه Ghostchef يدعوكم لزيارة متجره الإلكتروني https://ghostchef.shop/register?phone=';

        $clientsData = $this->clientsQuery()
            ->get()
            ->toArray();

        $smsSender = new OrangeSmsSender();
        $failedPhones = [];
        foreach ($clientsData as $clientData) {
            $phone = $clientData['associated_phone'];
            try {
                $smsSender->sendMessage($phone, $message . $phone);
            } catch (\exception $e) {
                $failedPhones[] = $phone;
            }
            $this->progressBar->advance();
        }

        $this->info('sent : ' . (count($clientsData) - count($failedPhones)), $failedPhones);
        if (0 < count($failedPhones)) {
            $this->warn('Failed phones : ' . implode(',', $failedPhones));
        }
    }

    /**
     * @return Order|Builder
     */
    private function clientsQuery()
    {
        return Order::query()
            ->selectRaw('associated_phone, SUM(total_price) AS sum_total_price, COUNT(associated_phone) AS count, GROUP_CONCAT(additional_note SEPARATOR \', \') AS additional_note')
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->whereNotNull('associated_phone')
            ->whereRaw('associated_phone NOT LIKE \'+2167%\'')
            ->whereNotin('associated_phone', ["+21655883014", "+21653000666", "+21650365852", "+21651928008",])
            ->groupBy('associated_phone')
            ->having('count', '<=', 3)
            ->having('sum_total_price', '<', 40000)
            ->having('sum_total_price', '>', 10000)
            ->orderByDesc('sum_total_price');
    }

    /**
     * @return ProgressBar
     */
    private function createProgressBar()
    {
        $count = $this->clientsQuery()->count();
dd($count);
        if (0 === $count) {
            return null;
        }

        $progressBar = $this->output->createProgressBar($count);
        $progressBar->setFormat(self::PROGRESS_BAR_FORMAT);
        $progressBar->start();

        return $progressBar;
    }
}
