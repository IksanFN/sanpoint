<?php

namespace App\Filament\Exports;

use App\Models\Pelanggaran;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PelanggaranExporter extends Exporter
{
    protected static ?string $model = Pelanggaran::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('siswa.id'),
            ExportColumn::make('kategoriPelanggaran.nama'),
            ExportColumn::make('waktu'),
            ExportColumn::make('deskripsi')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your pelanggaran export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }

    public function getFormats(): array
    {
        return [
            ExportFormat::Xlsx,
        ];
    }
}
