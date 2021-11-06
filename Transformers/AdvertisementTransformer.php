<?php

namespace Modules\AdvertisementModule\Transformers;

use Modules\AdvertisementModule\Entities\Advertisement;

class AdvertisementTransformer
{

    public function transformAllAdvertisements($position)
    {
        return [
            'advertisements'  => Advertisement::where('position',$position)->where('is_active','1')->paginate(10),
        ];
    }

}
