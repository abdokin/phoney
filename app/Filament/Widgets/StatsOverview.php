<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ftp;
use App\Models\Ssh;
use App\Models\Smtp;
use App\Models\Http;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $ftpConnections = Ftp::count();
        $sshConnections = Ssh::count();
        $smtpConnections = Smtp::count();
        $httpConnections = Http::count();

        return [
            Stat::make('FTP Connections', $ftpConnections),
            Stat::make('SSH Connections', $sshConnections),
            Stat::make('SMTP Connections', $smtpConnections),
            Stat::make('HTTP Connections', $httpConnections),
        ];
    }
}
