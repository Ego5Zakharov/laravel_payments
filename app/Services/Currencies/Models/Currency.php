<?php

namespace App\Services\Currencies\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 */
class Currency extends Model
{
    use HasFactory;

    protected $table = 'currencies';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'name'
    ];
    public const RUB = 'RUB';
}
