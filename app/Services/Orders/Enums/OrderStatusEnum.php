<?php

namespace App\Services\Orders\Enums;

enum OrderStatusEnum: string
{
    case pending = 'pending';
    case canceled = 'canceled';
    case completed = 'completed';

    public function name(): string
    {
        return match ($this) {
            self::pending => 'Ожидает',
            self::completed => 'Завершено',
            self::canceled => 'Отменено',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::pending => 'warning',
            self::completed => 'success',
            self::canceled => 'danger',
        };
    }
}
