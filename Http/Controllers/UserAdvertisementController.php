<?php

namespace Modules\AdvertisementModule\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\AdvertisementModule\Repositories\AdvertisementRepository;

class UserAdvertisementController extends Controller
{
    private $advertisementRepository;

    public function __construct()
    {
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function showAdvertisement($id)
    {
        $advertisement = $this->advertisementRepository->getAdvertisement($id);
        dd($advertisement);
    }
}
