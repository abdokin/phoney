<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Ftp;


class FtpConnectionsChart extends ChartWidget
{
    protected static ?string $heading = 'FTP Connections';

    protected function getData(): array
    {
        $data = Trend::model(Ftp::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Connections',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
