<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum StatusSiswa: string implements HasLabel
{
    case AKTIF = 'aktif';
    case DROP_OUT = 'drop_out';
    case ALUMNI = 'alumni';
    case NON_AKTIF = 'non_aktif';

    public function getLabel(): ?string
    {
        return str($this->value)->replace('_', ' ')->title();
    }

    public function getColor(): string
    {
        return match ($this) {
            self::NON_AKTIF => 'warning',
            self::AKTIF => 'success',
            self::DROP_OUT => 'danger',
            self::ALUMNI => 'info'
        };
    }
}