<?php

namespace App\Filament\Exports;

use App\Models\Prestasi;
use App\Models\Siswa;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Enums\ExportFormat;

class PrestasiExporter extends Exporter
{
    protected static ?string $model = Prestasi::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('siswa.nama'),
            ExportColumn::make('nama'),
            ExportColumn::make('point'),
            ExportColumn::make('waktu')
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

    public function getFormats(): array
    {
        return [
            ExportFormat::Xlsx,
        ];
    }
}
