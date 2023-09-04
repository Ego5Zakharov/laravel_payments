<?php

namespace App\Services\Payments\Commands;

use App\Support\Values\AmountValue;

interface Payable
{
    public function getPayableCurrencyId(): string;

    public function getPayableAmount(): AmountValue;

    public function getPayableType(): string;

    public function getPayableId(): int;

    public function getPayableName(): string;

}
