<?php

namespace App\Services\Payments\Actions;

use App\Services\Payments\Models\PaymentMethod;

class FindPaymentMethodAction
{
    private bool|null $active = null;
    private int|null $id = null;

    public function run(): PaymentMethod|null
    {
        $query = PaymentMethod::query();

        if (!is_null($this->active)) {
            $query->where('active', $this->active);
        }

        if (!is_null($this->id)) {
            $query->where('id', $this->id);
        }

        return $query->first();
    }

    public function active(bool $active = true): self
    {
        $this->active = $active;

        return $this;
    }

    public function id(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
