<?php

namespace Modules\AdvertisementModule\Repositories;

use Modules\AdvertisementModule\Entities\Advertisement;
use Modules\AdvertisementModule\Transformers\AdvertisementTransformer;

class AdvertisementRepository
{
    public function getAllAdvertisements()
    {
        return Advertisement::all();
    }

    public function getAllAdvertisementByPosition($position)
    {
       return (new AdvertisementTransformer())->transformAllAdvertisements($position);
    }

    public function getAdvertisement($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement){
            return [];
        }
        return
            [
                $advertisement->image,
                $advertisement->is_active,
                $advertisement->start_date,
                $advertisement->end_date
            ];
    }
}
