<?php

namespace App\Filament\Exports;

use App\Models\Siswa;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SiswaExporter extends Exporter
{
    protected static ?string $model = Siswa::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('jurusan.nama'),
            ExportColumn::make('kelas.nama'),
            ExportColumn::make('tahunAjaran.kode'),
            ExportColumn::make('nisn'),
            ExportColumn::make('nama'),
            ExportColumn::make('email'),
            ExportColumn::make('nomor_hp'),
            ExportColumn::make('jenis_kelamin'),
            ExportColumn::make('status'),
            ExportColumn::make('alamat'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your siswa export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
