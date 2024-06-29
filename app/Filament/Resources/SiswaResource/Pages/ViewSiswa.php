<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\SiswaResource;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;

class ViewSiswa extends ViewRecord
{
    protected static string $resource = SiswaResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                TextEntry::make('nisn')
                    ->columnSpanFull(),
                TextEntry::make('nama'),
                TextEntry::make('email'),
                TextEntry::make('nomor_hp'),
                TextEntry::make('jenis_kelamin')
                    ->badge()
                    ->color('info'),
                TextEntry::make('jurusan.nama'),
                TextEntry::make('kelas.nama'),
                TextEntry::make('tahunAjaran.kode'),
                TextEntry::make('status')
                    ->badge()
                    ->color(fn ($state) => $state->getColor())

            ])->columns(2)->columnSpanFull()
            ]);
    } 

}
