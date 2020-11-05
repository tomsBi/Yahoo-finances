<?php

namespace App\Models;

use Scheb\YahooFinanceApi\Results\Quote;

class Stock
{
    private string $longName;
    private string $symbol;
    private float $regularMarketPreviousClose;
    private float $regularMarketOpen;
    private float $regularMarketPrice;
    private float $regularMarketDayLow;
    private float $regularMarketDayHigh;
    private float $fiftyTwoWeekLow;
    private float $fiftyTwoWeekHigh;
    private float $regularMarketVolume;
    private int $averageDailyVolume3Month;
    private ?string $createdAt;

    public function __construct(
        string $longName,
        string $symbol,
        float $regularMarketPreviousClose,
        float $regularMarketOpen,
        float $regularMarketPrice,
        float $regularMarketDayLow,
        float $regularMarketDayHigh,
        float $fiftyTwoWeekLow,
        float $fiftyTwoWeekHigh,
        float $regularMarketVolume,
        int $averageDailyVolume3Month,
        ?string $createdAt = null
    )
    {
        $this->longName = $longName;
        $this->symbol = $symbol;
        $this->regularMarketPreviousClose = $regularMarketPreviousClose;
        $this->regularMarketOpen = $regularMarketOpen;
        $this->regularMarketPrice = $regularMarketPrice;
        $this->regularMarketDayLow = $regularMarketDayLow;
        $this->regularMarketDayHigh = $regularMarketDayHigh;
        $this->fiftyTwoWeekLow = $fiftyTwoWeekLow;
        $this->fiftyTwoWeekHigh = $fiftyTwoWeekHigh;
        $this->regularMarketVolume = $regularMarketVolume;
        $this->averageDailyVolume3Month = $averageDailyVolume3Month;
        $this->createdAt = $createdAt;
    }

    public function getLongName(): string
    {
        return $this->longName;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getRegularMarketPreviousClose(): float
    {
        return $this->regularMarketPreviousClose;
    }

    public function getRegularMarketOpen(): float
    {
        return $this->regularMarketOpen;
    }

    public function getRegularMarketPrice(): float
    {
        return $this->regularMarketPrice;
    }

    public function getRegularMarketDayLow(): float
    {
        return $this->regularMarketDayLow;
    }

    public function getRegularMarketDayHigh(): float
    {
        return $this->regularMarketDayHigh;
    }

    public function getFiftyTwoWeekLow(): float
    {
        return $this->fiftyTwoWeekLow;
    }

    public function getFiftyTwoWeekHigh(): float
    {
        return $this->fiftyTwoWeekHigh;
    }

    public function getRegularMarketVolume(): float
    {
        return $this->regularMarketVolume;
    }

    public function getAverageDailyVolume3Month(): int
    {
        return $this->averageDailyVolume3Month;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public static function create(array $data): self
    {
        return new self(
            (string)$data['long_name'],
            (string)$data['symbol'],
            (float)$data['regular_market_previous_close'],
            (float)$data['regular_market_open'],
            (float)$data['regular_market_price'],
            (float)$data['regular_market_day_low'],
            (float)$data['regular_market_day_high'],
            (float)$data['fifty_two_week_low'],
            (float)$data['fifty_two_week_high'],
            (float)$data['regular_market_volume'],
            (int)$data['average_daily_volume_3_month'],
        );
    }
}