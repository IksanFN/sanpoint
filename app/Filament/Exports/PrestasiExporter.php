<?php

namespace App\Filament\Exports;

use App\Models\Prestasi;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PrestasiExporter extends Exporter
{
    protected static ?string $model = Prestasi::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('siswa.nama')->label('Nama Siswa'),
            ExportColumn::make('siswa.kelas.nama')->label('Kelas'),
            ExportColumn::make('nama')->label('Prestasi'),
            ExportAction::make('point')->label('Point Pelanggaran'),
            ExportAction::make('waktu')->label('Tanggal')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your prestasi export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
