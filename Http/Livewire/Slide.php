<?php

namespace Modules\AdvertisementModule\Http\Livewire;

use Livewire\Component;
use Modules\AdvertisementModule\Enum\AdvertisementPositionEnum;
use Modules\AdvertisementModule\Repositories\AdvertisementRepository;

class Slide extends Component
{
    private $advertisementRepository;
    public  $advertisements;

    public function __construct()
    {
        $this->advertisementRepository = new AdvertisementRepository();
    }
    public function render()
    {
        $this->advertisements = $this->advertisementRepository->getAllAdvertisementByPosition(AdvertisementPositionEnum::HOME);
        return view('advertisementmodule::livewire.slide');
    }
}
