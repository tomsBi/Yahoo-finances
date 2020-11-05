<?php

namespace App\Services;

use App\Models\Stock;
use App\Repositories\DatabaseRepository;
use App\Repositories\YahooDataRepository;
use Carbon\Carbon;

class StockService
{
    public function getStock(string $symbol): Stock
    {
        $repo = new DatabaseRepository();
        $data = $repo->getBySymbol($symbol);

        if (!$data) {
            $yahooData = new YahooDataRepository();
            $stock = $yahooData->getYahooData($symbol);
            $repo->import($stock);
        }

        if (Carbon::now()->diffInMinutes($data['created_at']) > 10) {
            $yahooData = new YahooDataRepository();
            $stock = $yahooData->getYahooData($symbol);
            $repo->update($stock);
        }

        $data = $repo->getBySymbol($symbol);
        return Stock::create((array)$data);
    }
}