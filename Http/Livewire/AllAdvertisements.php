<?php

namespace Modules\AdvertisementModule\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\AdvertisementModule\Enum\AdvertisementPositionEnum;
use Modules\AdvertisementModule\Repositories\AdvertisementRepository;

class AllAdvertisements extends Component
{
    use WithPagination;
    private $advertisementRepository;

    public  $position;

    protected $paginationTheme = 'bootstrap';

    public function __construct()
    {
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function render()
    {
        $advertisements = $this->advertisementRepository->getAllAdvertisementByPosition($this->position , 1)->getData();

        return view('advertisementmodule::livewire.all-advertisements',[
            'advertisements'    => $advertisements
        ]);
    }
}
