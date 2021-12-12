<?php

namespace Modules\AdvertisementModule\Http\Livewire;

use Livewire\Component;
use Modules\AdvertisementModule\Enum\AdvertisementPositionEnum;
use Modules\AdvertisementModule\Repositories\AdvertisementRepository;

class PositionAdvertisements extends Component
{
    private $advertisementRepository;
    public $position;
    public $advertisements;

    public function __construct()
    {
         $this->advertisementRepository     = new AdvertisementRepository();
    }

    public function mount()
    {
        $advertisements     = $this->advertisementRepository->getAllAdvertisementByPosition($this->position, null)->getData();
        $this->advertisements = $advertisements->random($advertisements->count()/2);

    }
    public function render()
    {
        return view("advertisementmodule::livewire.".strtolower($this->position)."-advertisements");
    }
}
