<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard;

class Statistik extends Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    protected static ?string $title = 'Statistik';

    protected int | string | array $columnSpan = ['md' => 2, 'xl' => 3];
}