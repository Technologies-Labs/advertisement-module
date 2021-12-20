<?php

namespace Modules\Advertisement\Entities;

use Database\Factories\AdvertisementsFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Advertisement\Scopes\AdvertisementScope;

class Advertisement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new AdvertisementScope);
    }

    protected static function newFactory()
    {
        return AdvertisementsFactory::new();
    }
}
