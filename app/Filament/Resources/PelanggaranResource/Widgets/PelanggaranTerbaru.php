<?php

namespace App\Filament\Resources\PelanggaranResource\Widgets;

use App\Models\Pelanggaran;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PelanggaranTerbaru extends BaseWidget
{

    protected static ?string $title = 'Pelanggaran';

    public function table(Table $table): Table
    {
        return $table
            ->query(Pelanggaran::orderBy('waktu', 'desc')->limit(5))
            ->columns([
                TextColumn::make('siswa.nama')
                    ->label('Siswa')
                    ->description(fn ($record) => 'Kelas: '.$record->siswa->kelas->nama),
                Tables\Columns\TextColumn::make('kategoriPelanggaran.point')
                    ->label('Point Pelanggaran')
                    ->alignCenter(true)
                    ->color('danger')
                    ->badge(),
                TextColumn::make('waktu')
                    ->date()
                    ->label('Tanggal Pelanggaran')
            ]);
    }
}
