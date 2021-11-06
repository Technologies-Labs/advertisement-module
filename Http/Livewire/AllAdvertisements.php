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
    public $advertisements;
    public $position;
    protected $paginationTheme = 'bootstrap';

    public function __construct()
    {
        $this->advertisementRepository = new AdvertisementRepository();
    }

    public function render()
    {
        $this->advertisements = $this->advertisementRepository->getAllAdvertisementByPosition($this->position);
        return view('advertisementmodule::livewire.all-advertisements');
    }
}
