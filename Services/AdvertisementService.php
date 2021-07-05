<?php
namespace Modules\AdvertisementModule\Services;
use App\Traits\UploadTrait;
use Modules\AdvertisementModule\Entities\Advertisement;
use Modules\AdvertisementModule\Entities\Category;
use Modules\AdvertisementModule\Enum\AdvertisementEnum;

use function PHPUnit\Framework\isNull;

class  AdvertisementService {

    use UploadTrait;
    public $image;
    public $order;
    public $start_date;
    public $end_date;
    public $is_in_banner;

    public function createAdvertisement()
    {
       return  Advertisement::create([
        'image'         => $this->image ,
        'order'         => $this->order ,
        'start_date'    =>$this->start_date,
        'end_date'      =>$this->end_date,
        'is_in_banner'  =>$this->is_in_banner,
       ]);
    }

    public function updateAdvertisement(Advertisement $advertisement)
    {
        $advertisement->    update([
            'image'         => ($this->image??$advertisement->image),
            'order'         => $this->order ,
            'start_date'    =>$this->start_date,
            'end_date'      =>$this->end_date,
            'is_in_banner'  =>$this->is_in_banner,
           ]);
        return Advertisement::find($advertisement->id);
    }

    public function setOrder($order)
    {
       $this->order =$order;
       return $this;
    }
    public function setImage($image)
    {
        $this->image =$this->storeImage($image,AdvertisementEnum::ADVERTISEMENT_IMAGE_PATH);
        return $this;
    }

    public function updateImg($image ,$old_image)
    {
        $this->image =$this->updateImage($image,AdvertisementEnum::ADVERTISEMENT_IMAGE_PATH,$old_image);
        return $this;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
        return $this;
    }

    public function setIsInBanner($is_in_banner)
    {
        $this->is_in_banner = $is_in_banner;
        return $this;
    }


}
