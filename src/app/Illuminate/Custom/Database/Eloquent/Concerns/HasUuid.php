<?php

namespace App\Illuminate\Custom\Database\Eloquent\Concerns;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function boot()
    {
        parent::boot();
        self::creating(fn ($model) => $model->uuid = Str::uuid());
    }
}
