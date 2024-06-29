<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Models\Siswa;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\SiswaResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListSiswas extends ListRecords
{
    protected static string $resource = SiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All')
                ->badge(Siswa::count()),
            'aktif' => Tab::make('Aktif')
                ->badge(Siswa::query()->where('status', 'aktif')->count())
                ->badgeColor('success')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'aktif')),
            'non_aktif' => Tab::make('Non Aktif')
                ->badge(Siswa::query()->where('status', 'non_aktif')->count())
                ->badgeColor('warning')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'non_aktif')),
            'drop_out' => Tab::make('Drop Out')
                ->badge(Siswa::query()->where('status', 'drop_out')->count())
                ->badgeColor('danger')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'drop_out')),
            'alumni' => Tab::make('Alumni')
                ->badge(Siswa::query()->where('status', 'alumni')->count())
                ->badgeColor('info')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'alumni'))
        ];
    }
}
