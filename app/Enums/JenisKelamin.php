<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum JenisKelamin: string implements HasLabel
{
    case LAKI_LAKI = 'laki_laki';
    case PEREMPUAN = 'perempuan';

    public function getLabel(): ?string
    {
        return str($this->value)->replace('_', ' ')->title();
    }

    public function getColor(): string
    {
        return match ($this) {
            self::LAKI_LAKI => 'info',
            self::PEREMPUAN => 'success',
        };
    }
}