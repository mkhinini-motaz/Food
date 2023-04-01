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

class ProfitCalculator extends Command
{
    const DAYS_IN_MONTH = 30;
    const DAYS_IN_YEAR = 365;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'profit:calc {avg=20}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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
     */
    public function handle()
    {
        [$profitDelivery, $costDelivery] = $this->delivery();
        [$profitServiceFee, $costServiceFee] = $this->serviceFee();
        $profitPartner = $this->partner();
        [$profitTotal, $costTotal] = $this->total();



        $output = [
            'profit Delivery / Day' => $profitDelivery['day'],
            'expenses Delivery / Day' => $costDelivery['day'],
            'profit Service Fee / Day' => $profitServiceFee['day'],
            'expenses Service Fee / Day' => $costServiceFee['day'],
            'profit Partner / Day' => $profitPartner['day'],
            '--------------',
            'profit Total / Day' => $profitTotal['day'],
            'expenses Total / Day' => $costTotal['day'],
            "---------------------------------------------\n",
            'profit Delivery / Month' => $profitDelivery['month'],
            'expenses Delivery / Month' => $costDelivery['month'],
            'profit Service Fee / Month' => $profitServiceFee['month'],
            'expenses Service Fee / Month' => $costServiceFee['month'],
            'profit Partner / Month' => $profitPartner['month'],
            '--------------',
            'profit Total / Month' => $profitTotal['month'],
            'expenses Total / Month' => $costTotal['month'],
            "---------------------------------------------\n",
            'profit Delivery / Year' => $profitDelivery['year'],
            'expenses Delivery / Year' => $costDelivery['year'],
            'profit Service Fee / Year' => $profitServiceFee['year'],
            'expenses Service Fee / Year' => $costServiceFee['year'],
            'profit Partner / Year' => $profitPartner['year'],
            '--------------',
            'profit Total / Year' => $profitTotal['year'],
            'expenses Total / Year' => $costTotal['year'],
        ];

        $this->showResults($output);

    }

    private function delivery()
    {
        $avgCountDeliveriesPerDay = $this->argument('avg');
        $transporterPayPerDay = 27000;
        $fuelPerDelivery = 400;
        $scooterMaintenancePerDelivery = 100;
        $deliveryPrice = 2000;
        $scooterCostPerDelivery = $fuelPerDelivery + $scooterMaintenancePerDelivery;

        $deliveryProfit = $deliveryPrice - $scooterCostPerDelivery;

        $profitFromDeliveryPerDay = ($deliveryProfit * $avgCountDeliveriesPerDay) - $transporterPayPerDay;
        $deliveryCostPerDay = $transporterPayPerDay + $scooterCostPerDelivery * $avgCountDeliveriesPerDay;

        return [
            [
                'day'   => $profitFromDeliveryPerDay,
                'month' => $profitFromDeliveryPerDay * self::DAYS_IN_MONTH,
                'year' => $profitFromDeliveryPerDay * self::DAYS_IN_YEAR,
            ],[
                'day'   => $deliveryCostPerDay,
                'month' => $deliveryCostPerDay * self::DAYS_IN_MONTH,
                'year' => $deliveryCostPerDay * self::DAYS_IN_YEAR,
            ],
        ];
    }

    private function serviceFee()
    {
        $avgCountDeliveriesPerDay = $this->argument('avg');
        $serviceFeePerDelivery = 500;
        $profit = $serviceFeePerDelivery * $avgCountDeliveriesPerDay;

        $serverDeployment = round(43900 / self::DAYS_IN_MONTH);
        $forge = round(36580 / self::DAYS_IN_MONTH);
        $marketing = round(350000 / self::DAYS_IN_MONTH);
        $expenses = $serverDeployment + $forge + $marketing;

        return [
            [
                'day'   => $profit,
                'month' => $profit * self::DAYS_IN_MONTH,
                'year' => $profit * self::DAYS_IN_YEAR,
            ],[
                'day'   => $expenses,
                'month' => $expenses * self::DAYS_IN_MONTH,
                'year' => $expenses * self::DAYS_IN_YEAR,
            ],
        ];
    }

    private function partner()
    {
        $avgCountDeliveriesPerDay = $this->argument('avg');
        $partnerMargin = 0.08;
        $orderAvgPrice = 15000;
        $profit = round($orderAvgPrice * $partnerMargin);
        $profit *= $avgCountDeliveriesPerDay;

        return [
            'day'   => $profit,
            'month' => $profit * self::DAYS_IN_MONTH,
            'year' => $profit * self::DAYS_IN_YEAR,
        ];
    }

    private function total()
    {
        [$profitDelivery, $costDelivery] = $this->delivery();
        [$profitServiceFee, $costServiceFee] = $this->serviceFee();
        $profitPartner = $this->partner();

        $profit = $profitDelivery['day'] + $profitServiceFee['day'] + $profitPartner['day'];
        $expenses = $costDelivery['day'] + $costServiceFee['day'];

        return [
            [
                'day'   => $profit,
                'month' => $profit * self::DAYS_IN_MONTH,
                'year' => $profit * self::DAYS_IN_YEAR,
            ],[
                'day'   => $expenses,
                'month' => $expenses * self::DAYS_IN_MONTH,
                'year' => $expenses * self::DAYS_IN_YEAR,
            ],
        ];
    }

    private function showResults($output)
    {
        foreach ($output as $message => $value) {
            if (is_numeric($message)) {
                $this->line($value);
                continue;
            }

            $formattedValue = number_format(round($value / 100) / 10, 1, ',', ' ');
            $formattedValue = preg_replace('#,0$#', '', $formattedValue);
            $formattedMessage = $message . ' : ' . $formattedValue . ' TND';
            $this->{strpos($message, 'expenses') === 0 ? 'warn' :'info'}($formattedMessage);
        }
    }
}
