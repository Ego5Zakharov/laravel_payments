<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Collection;

class GetPaymentMethodsAction
{
    private bool|null $active = null;

    public function active(bool $active = true): self
    {
        $this->active = $active;

        return $this;
    }

    public function run(): Collection
    {
        $query = PaymentMethod::query();

        if (!is_null($this->active)) {
            $query->where('active', $this->active);
        }

        return $query->get();
    }

}
