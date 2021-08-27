<?php

namespace Modules\AdvertisementModule\Repositories;

use Modules\AdvertisementModule\Entities\Advertisement;

class AdvertisementRepository
{
    public function getAllAdvertisements()
    {
        return Advertisement::all();
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
