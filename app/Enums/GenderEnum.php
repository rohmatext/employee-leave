<?php

namespace App\Enums;

enum GenderEnum: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public static function all(): array
    {
        return [
            self::MALE->value,
            self::FEMALE->value,
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::MALE => 'Laki-laki',
            self::FEMALE => 'Perempuan',
        };
    }

    public static function values(): array
    {
        return array_map(fn(self $gender) => $gender->value, self::cases());
    }
}
