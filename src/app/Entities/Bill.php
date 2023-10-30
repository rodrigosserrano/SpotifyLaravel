<?php

namespace App\Entities;

use App\Illuminate\Custom\Database\Eloquent\Concerns\HasUuid;
use App\Illuminate\Custom\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bill extends Model
{
    use HasFactory, HasUuid;

    protected static function booted(): void
    {
        static::creating(fn(self $model) => $model->uuid = Str::uuid()->toString());
    }
}
