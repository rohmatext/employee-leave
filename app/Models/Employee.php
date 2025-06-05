<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'gender',
    ];

    protected function casts(): array
    {
        return [
            'gender' => GenderEnum::class,
        ];
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->last_name) {
                    return "{$this->first_name} {$this->last_name}";
                }

                return $this->first_name;
            },
        );
    }
}
