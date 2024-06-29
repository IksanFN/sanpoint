<?php

namespace App\Filament\Widgets;

use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\Prestasi;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Siswa', Siswa::count())
                ->icon('heroicon-o-user-group')
                ->color('gray')
                ->description('Total siswa'),
            Stat::make('Pelanggaran', Pelanggaran::count())
                ->icon('heroicon-o-exclamation-triangle')
                ->color('gray')
                ->description('Total Pelanggaran'),
            Stat::make('Prestasi', Prestasi::count())
                ->icon('heroicon-o-check-badge')
                ->color('gray')
                ->description('Total Prestasi')
        ];
    }
}