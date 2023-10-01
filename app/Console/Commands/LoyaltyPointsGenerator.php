<?php

namespace App\Console\Commands;

use App\Models\LoyaltyAction;
use App\Models\Order;
use App\Repositories\LoyaltyActionRepository;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\Console\Helper\ProgressBar;
use function App\Support\Helpers\columnInPeriod;

class LoyaltyPointsGenerator extends Command
{
    const PROGRESS_BAR_FORMAT = '%current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s%';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loyalty:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates loyalty points for orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->alreadyBeenDoneToday()) {
            $this->warn('Loyalty points can be generated only one time per day');
            \Log::warning('Loyalty points can be generated only one time per day');
            return 1;
        }

        $progressBar = $this->createProgressBar();

        $page    = 1;
        $perPage = 50;
        $addedOrdersPoints = 0;
        $addedFriendInvitePoints = 0;
        while (true) {
            $orders = $this->ordersQuery()
                ->paginate($perPage, ['*'], 'page', $page++);
            if ($orders->isEmpty()) {
                break;
            }

            /** @var Order $order */
            foreach ($orders as $order) {
                $loyaltyAction = LoyaltyActionRepository::createTypeOrder($order);
                $addedOrdersPoints += $loyaltyAction->points_rewarded;

                $client = $order->client;
                if ($client->inviterClient && $order->isTheFirstForClient()) {
                    $loyaltyAction = LoyaltyActionRepository::createTypeFriendInvite($client->inviterClient, $client);
                    $addedFriendInvitePoints += $loyaltyAction->points_rewarded;
                }

                $progressBar->advance();
            }
        }

        $progressBar->finish();
        $text = 'Done, generated ' . $addedOrdersPoints . ' points for orders and ' . $addedFriendInvitePoints . ' points for friends invite';
        $this->output->info($text);
        \Log::info($text); // TODO: log in db in a report
        return 1;
    }

    /**
     * @return array
     */
    private function hours()
    {
        return date('H') >= 3 ?
            [ strtotime('today 03:00'), strtotime('tomorrow 03:00') ] :
            [ strtotime('yesterday 03:00'), strtotime('today 03:00') ];
    }

    /**
     * @return Builder
     */
    private function ordersQuery()
    {
        return Order::query()
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->where(columnInPeriod($this->hours(), 'orders.created_at'))
            ->whereNotNull('client_id');
    }

    /**
     * @return ProgressBar
     */
    private function createProgressBar()
    {
        $count = $this->ordersQuery()->count();

        $progressBar = $this->output->createProgressBar($count);
        $progressBar->setFormat(self::PROGRESS_BAR_FORMAT);
        $progressBar->start();

        return $progressBar;
    }

    /**
     * @return bool
     */
    private function alreadyBeenDoneToday()
    {
        return 0 < LoyaltyAction::where('type', '=', LoyaltyAction::TYPE_ORDER)
            ->where(columnInPeriod($this->hours(), 'created_at'))
            ->count();
    }
}
