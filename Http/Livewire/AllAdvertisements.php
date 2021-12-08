<?php

namespace Modules\AdvertisementModule\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\AdvertisementModule\Enum\AdvertisementPositionEnum;
use Modules\AdvertisementModule\Repositories\AdvertisementRepository;

class AllAdvertisements extends Component
{
    private $advertisementRepository;

    public  $position;

    public  $perPage = 1;

    public function loadMore()
    {
        $this->perPage += 1;
    }

    // protected $paginationTheme = 'bootstrap';
    public function getAdvertisementsProperty()
    {
        return $this->advertisementRepository->getAllAdvertisementByPosition($this->position , $this->perPage)->getData();
    }

    public function boot()
    {
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function render()
    {
        return view('advertisementmodule::livewire.all-advertisements',[
            'advertisements'    => $this->advertisements
        ]);
    }
}
