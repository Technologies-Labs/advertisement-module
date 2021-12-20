<?php

namespace Modules\Advertisement\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Advertisement\Enum\AdvertisementPositionEnum;
use Modules\Advertisement\Repositories\AdvertisementRepository;

class AllAdvertisements extends Component
{
    private $advertisementRepository;

    public  $position;

    public  $perPage = 20;

    public function loadMore()
    {
        $this->perPage += 20;
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
        return view('advertisement::livewire.all-advertisements',[
            'advertisements'    => $this->advertisements
        ]);
    }
}
