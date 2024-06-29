<?php

namespace App\Filament\Resources\SiswaResource\Widgets;

use App\Models\Siswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SiswaOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Siswa', Siswa::count())
                ->icon('heroicon-o-user-group')
                ->color('gray')
                ->description('Total siswa'),
        ];
    }
}
