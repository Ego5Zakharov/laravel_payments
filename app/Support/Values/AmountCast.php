<?php

namespace App\Support\Values;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AmountCast implements CastsAttributes
{

    public function get($model, string $key, mixed $value, array $attributes): mixed
    {
        return new AmountValue($value);
    }

    public function set($model, string $key, mixed $value, array $attributes): mixed
    {
        if ($value instanceof AmountValue) {
            return $value->value();
        }

        throw new \InvalidArgumentException(
          'Value must be type AmountValue',
        );
    }
}
