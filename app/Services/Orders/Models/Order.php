<?php

namespace App\Services\Orders\Models;

use App\Services\Orders\Enums\OrderStatusEnum;
use App\Services\Payments\Commands\Payable;
use App\Support\Values\AmountValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property OrderStatusEnum $status,
 * @property string $currency_id
 * @property AmountValue $amount
 */
class Order extends Model implements Payable
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'status',
        'amount', 'currency_id',
    ];
    protected $casts = [
        'status' => OrderStatusEnum::class,
        'amount' => AmountValue::class,
    ];

    public function getPayableCurrencyId(): string
    {
        return $this->currency_id;
    }

    public function getPayableAmount(): AmountValue
    {
        return $this->amount;
    }

    public function getPayableType(): string
    {
        return $this->getMorphClass(); // order
    }

    public function getPayableId(): int
    {
        return $this->id;
    }

    public function getPayableName(): string
    {
        return "Заказа " . $this->uuid;
    }
}
