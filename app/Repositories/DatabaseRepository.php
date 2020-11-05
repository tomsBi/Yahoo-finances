<?php

namespace App\Repositories;

use App\Models\Stock;
use Carbon\Carbon;

class DatabaseRepository
{

    public function getBySymbol(string $symbol)
    {
        $data = query()
            ->select('*')
            ->from('stocks')
            ->where('symbol = :symbol')
            ->setParameter('symbol', $symbol)
            ->execute()
            ->fetchAssociative();

        return $data;
    }

    public function import(Stock $stock): void
    {
        query()
            ->insert('stocks')
            ->values([
                'long_name' => ':long_name',
                'symbol' => ':symbol',
                'regular_market_previous_close' => ':regular_market_previous_close',
                'regular_market_open' => ':regular_market_open',
                'regular_market_price' => ':regular_market_price',
                'regular_market_day_low' => ':regular_market_day_low',
                'regular_market_day_high' => ':regular_market_day_high',
                'fifty_two_week_low' => ':fifty_two_week_low',
                'fifty_two_week_high' => ':fifty_two_week_high',
                'regular_market_volume' => ':regular_market_volume',
                'average_daily_volume_3_month' => ':average_daily_volume_3_month',
                'created_at' => ':created_at'
            ])
            ->setParameters([
                'long_name' => $stock->getLongName(),
                'symbol' => $stock->getSymbol(),
                'regular_market_previous_close' => $stock->getRegularMarketPreviousClose(),
                'regular_market_open' => $stock->getRegularMarketOpen(),
                'regular_market_price' => $stock->getRegularMarketPrice(),
                'regular_market_day_low' => $stock->getRegularMarketDayLow(),
                'regular_market_day_high' => $stock->getRegularMarketDayHigh(),
                'fifty_two_week_low' => $stock->getFiftyTwoWeekLow(),
                'fifty_two_week_high' => $stock->getFiftyTwoWeekHigh(),
                'regular_market_volume' => $stock->getRegularMarketVolume(),
                'average_daily_volume_3_month' => $stock->getAverageDailyVolume3Month(),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ])
            ->execute();
    }

    public function update(Stock $stock)
    {
        query()
            ->update('stocks')
            ->set('symbol', ':symbol')
            ->set('regular_market_previous_close', ':regular_market_previous_close')
            ->set('regular_market_open', ':regular_market_open')
            ->set('regular_market_price', ':regular_market_price')
            ->set('regular_market_day_low', ':regular_market_day_low')
            ->set('regular_market_day_high', ':regular_market_day_high')
            ->set('fifty_two_week_low', ':fifty_two_week_low')
            ->set('fifty_two_week_high', ':fifty_two_week_high')
            ->set('regular_market_volume', ':regular_market_volume')
            ->set('average_daily_volume_3_month', ':average_daily_volume_3_month')
            ->set('created_at', ':created_at')
            ->setParameters([
                'regular_market_previous_close' => $stock->getRegularMarketPreviousClose(),
                'regular_market_open' => $stock->getRegularMarketOpen(),
                'regular_market_price' => $stock->getRegularMarketPrice(),
                'regular_market_day_low' => $stock->getRegularMarketDayLow(),
                'regular_market_day_high' => $stock->getRegularMarketDayHigh(),
                'fifty_two_week_low' => $stock->getFiftyTwoWeekLow(),
                'fifty_two_week_high' => $stock->getFiftyTwoWeekHigh(),
                'regular_market_volume' => $stock->getRegularMarketVolume(),
                'average_daily_volume_3_month' => $stock->getAverageDailyVolume3Month(),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ])
            ->where('symbol = :symbol')
            ->setParameter('symbol', $stock->getSymbol())
            ->execute();
    }
}