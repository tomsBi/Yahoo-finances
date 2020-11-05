<?php

namespace App\Controllers;

use App\Repositories\DatabaseRepository;
use App\Repositories\YahooDataRepository;
use App\Models\Stock;
use App\Services\StockService;

class StockController
{
    public function index()
    {

        return require_once __DIR__ . '/../Views/StockIndexView.php';
    }

    public function search()
    {
        $stockService = new StockService();
        $stock = $stockService->getStock($_POST['symbol']);

        return require_once __DIR__ . '/../Views/StockIndexView.php';
    }
}