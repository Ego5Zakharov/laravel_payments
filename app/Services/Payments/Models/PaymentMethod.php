<?php

namespace App\Services\Payments\Models;

use App\Services\Payments\Enums\PaymentDriverEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property boolean $active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property PaymentDriverEnum $driver
 */
class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'active', 'driver'
    ];

    protected $casts = [
        'active' => 'boolean',
        'driver' => PaymentDriverEnum::class
    ];
}
