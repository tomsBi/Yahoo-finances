<?php

namespace App\Repositories;

use Scheb\YahooFinanceApi\ApiClientFactory;
use GuzzleHttp\Client;
use App\Models\Stock;

class YahooDataRepository
{
    public function getYahooData(string $symbol): Stock
    {
        $guzzleClient = new Client();
        $client = ApiClientFactory::createApiClient($guzzleClient);
        $quote = $client->getQuote($symbol);

        return new Stock(
            $quote->getLongName(),
            $quote->getSymbol(),
            $quote->getRegularMarketPreviousClose(),
            $quote->getRegularMarketOpen(),
            $quote->getRegularMarketPrice(),
            $quote->getRegularMarketDayLow(),
            $quote->getRegularMarketDayHigh(),
            $quote->getFiftyTwoWeekLow(),
            $quote->getFiftyTwoWeekHigh(),
            $quote->getRegularMarketVolume(),
            $quote->getAverageDailyVolume3Month(),
        );

    }
}