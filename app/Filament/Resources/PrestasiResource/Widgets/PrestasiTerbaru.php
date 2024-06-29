<?php

namespace App\Filament\Resources\PrestasiResource\Widgets;

use App\Filament\Resources\PrestasiResource;
use App\Models\Prestasi;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PrestasiTerbaru extends BaseWidget
{
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Prestasi::orderBy('waktu', 'desc')->limit(5))
            ->columns([
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->description(fn ($record) => $record->siswa->kelas->nama)
                    ->numeric(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Prestasi'),
                Tables\Columns\TextColumn::make('point')
                    ->label('Point Prestasi')
                    ->alignCenter(true)
                    ->badge()
                    ->color('success')
                    ->sortable(),
                Tables\Columns\TextColumn::make('waktu')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
            ]);
    }
}
