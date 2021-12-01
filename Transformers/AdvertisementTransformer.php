<?php

namespace Modules\AdvertisementModule\Transformers;

use Modules\AdvertisementModule\Entities\Advertisement;
use League\Fractal;

class AdvertisementTransformer  extends Fractal\TransformerAbstract
{

    public function transform(Advertisement $advertisement)
	{
	    return [
	        'id'            => (int) $advertisement->id,
	        'image'         => $advertisement->image,
	        'start_date'    => $advertisement->start_date,
            "end_date"      => $advertisement->end_date

	    ];
	}

    // public function transformAllAdvertisements($position , $paginate = 10)
    // {
    //     return [
    //         'advertisements'  => Advertisement::where('position',$position)->where('is_active','1')->paginate($paginate),
    //     ];
    // }

}
