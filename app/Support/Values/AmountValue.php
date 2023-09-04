<?php

namespace App\Support\Values;


use Illuminate\Contracts\Database\Eloquent\Castable;
use InvalidArgumentException;

class AmountValue implements Castable
{
    private string $value; // 123.45

    public function __construct(string $value)
    {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException(
                'Invalid argument value: ' . $value
            );
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public static function castUsing(array $arguments): string
    {
        return AmountCast::class;
    }
    public function __toString(): string
    {
        return $this->value();
    }
}
