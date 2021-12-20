<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Advertisement\Repositories\AdvertisementRepository;

class UserAdvertisementController extends Controller
{
    private $advertisementRepository;

    public function __construct()
    {
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function getAllAdvertisement()
    {
        return view('advertisement::website.advertisements.index');
    }

    public function showAdvertisement($id)
    {
        $advertisement = $this->advertisementRepository->getAdvertisement($id);
        dd($advertisement);
    }
}
