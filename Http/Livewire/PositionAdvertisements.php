<?php

namespace Modules\Advertisement\Http\Livewire;

use Livewire\Component;
use Modules\Advertisement\Enum\AdvertisementPositionEnum;
use Modules\Advertisement\Repositories\AdvertisementRepository;

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
        return view("advertisement::livewire.".strtolower($this->position)."-advertisements");
    }
}
