<?php

namespace Modules\AdvertisementModule\Repositories;

use League\Fractal\Resource\Collection;
use Modules\AdvertisementModule\Entities\Advertisement;
use Modules\AdvertisementModule\Transformers\AdvertisementTransformer;

class AdvertisementRepository
{
    public function getAllAdvertisements()
    {
        return Advertisement::all();
    }

    public function getAllAdvertisementByPosition($position , $paginate = 10)
    {
        $advertisements = Advertisement::where('position',$position)->paginate($paginate,['*'],null);
        return new Collection($advertisements, new AdvertisementTransformer);

    // return (new AdvertisementTransformer())->transformAllAdvertisements($position , $paginate = 10);
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
