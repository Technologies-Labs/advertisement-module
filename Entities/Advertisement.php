<?php

namespace Modules\AdvertisementModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'order',
        'start_date',
        'end_date',
        'is_in_banner',
    ];

}
