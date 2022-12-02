<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\LoyaltyAction;
use App\Models\Order;
use App\Repositories\ClientRepository;
use App\Repositories\LoyaltyActionRepository;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Symfony\Component\Console\Helper\ProgressBar;

class ClientInitializer extends Command
{
    const PROGRESS_BAR_FORMAT = '%current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s%';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'client:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates clients models for existing associated phones in orders';

    /**
     * @var ProgressBar
     */
    private $progressBar;

    /**
     * @var Collection
     */
    private $existingClientsPhones;

    /**
     * @var int
     */
    private $updatedOrdersCountForExistingClients;

    /**
     * @var int
     */
    private $ordersPointsSumForExistingClients;

    /**
     * @var int
     */
    private $loyaltyBonusPointsSumForExistingClients;

    /**
     * @var int
     */
    private $loyaltyBonusPointsSum;

    /**
     * @var int
     */
    private $updatedOrdersCount;

    /**
     * @var int
     */
    private $ordersPointsSum;

    /**
     * @var int
     */
    private $clientsCount;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->existingClientsPhones = Client::query()->pluck('phone');

        $this->clientsCount                            = 0;
        $this->ordersPointsSum                         = 0;
        $this->updatedOrdersCount                      = 0;
        $this->loyaltyBonusPointsSum                   = 0;
        $this->updatedOrdersCountForExistingClients    = 0;
        $this->ordersPointsSumForExistingClients       = 0;
        $this->loyaltyBonusPointsSumForExistingClients = 0;
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

        $this->generateNewClients();
        $this->processExistingClients();
        $this->showResults();
    }

    /**
     *
     */
    private function generateNewClients()
    {
        $page    = 1;
        $perPage = 50;
        $loyaltyBonusPoints = LoyaltyAction::POINTS_AWARDED_BY_TYPE[LoyaltyAction::TYPE_LOYALTY_BONUS];
        while(true) {
            $phones = $this->phones($page++, $perPage);
            if ($phones->isEmpty()) {
                break;
            }
            $this->clientsCount          += ClientRepository::createFromPhones($phones, $loyaltyBonusPoints);
            $this->updatedOrdersCount    += ClientRepository::associateOrdersByPhone($phones);
            $this->loyaltyBonusPointsSum += LoyaltyActionRepository::createTypeLoyaltyBonusByPhone($phones);
            $this->ordersPointsSum       += LoyaltyActionRepository::createTypeOrderByPhone($phones);

            $this->progressBar->advance($phones->count());
        }
    }

    /**
     *
     */
    private function processExistingClients()
    {
        $this->updatedOrdersCountForExistingClients    = ClientRepository::associateOrdersByPhone($this->existingClientsPhones);
        $this->ordersPointsSumForExistingClients       = LoyaltyActionRepository::createTypeOrderByPhone($this->existingClientsPhones);
        $this->loyaltyBonusPointsSumForExistingClients = LoyaltyActionRepository::createTypeLoyaltyBonusByPhone($this->existingClientsPhones);
    }

    /**
     * @param $page
     * @param $perPage
     *
     * @return Collection
     */
    public function phones($page, $perPage)
    {
        return $this->ordersQuery()
            ->selectRaw('DISTINCT associated_phone')
            ->forPage($page, $perPage)
            ->pluck('associated_phone');
    }

    /**
     * @return Order|Builder
     */
    private function ordersQuery()
    {
        return Order::query()
            ->whereNotIn('status', Order::CANCELED_STATUSES)
            ->whereNotNull('associated_phone')
            ->whereNotIn('associated_phone', $this->existingClientsPhones);
    }

    /**
     * @return ProgressBar
     */
    private function createProgressBar()
    {
        $count = $this->ordersQuery()
            ->selectRaw('COUNT(DISTINCT associated_phone) AS count')
            ->first()
            ->count;
        if (0 === $count) {
            return null;
        }

        $progressBar = $this->output->createProgressBar($count);
        $progressBar->setFormat(self::PROGRESS_BAR_FORMAT);
        $progressBar->start();

        return $progressBar;
    }

    /**
     *
     */
    private function showResults()
    {
        $this->line('');
        $this->info('Created ' . $this->clientsCount . ' clients and associated ' . $this->updatedOrdersCount . ' orders to them');
        $this->info('Added ' . $this->loyaltyBonusPointsSum . ' loyalty bonus points for clients and ' . $this->ordersPointsSum . ' for orders, total of ' . ($this->loyaltyBonusPointsSum + $this->ordersPointsSum));
        $this->line('');

        $this->info('Associated ' . $this->updatedOrdersCountForExistingClients . ' orders to existing clients');
        $this->info('Added ' . $this->loyaltyBonusPointsSumForExistingClients . ' loyalty bonus points for clients and ' . $this->ordersPointsSumForExistingClients . ' for orders, total of ' . ($this->loyaltyBonusPointsSumForExistingClients + $this->ordersPointsSumForExistingClients));

        $this->info('Total points added ' . ($this->loyaltyBonusPointsSum + $this->ordersPointsSum + $this->loyaltyBonusPointsSumForExistingClients + $this->ordersPointsSumForExistingClients));
    }
}
