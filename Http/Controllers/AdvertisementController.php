<?php

namespace Modules\Advertisement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Advertisement\Services\AdvertisementService;

class AdvertisementController extends Controller
{
    public function __construct(){
        $this->middleware('permission:advertisement-create',   ['only' => ['create','store']]);
        $this->middleware('permission:advertisement-edit',     ['only' => ['edit','update']]);
        $this->middleware('permission:advertisement-list',     ['only' => ['show', 'index']]);
        $this->middleware('permission:advertisement-delete',   ['only' => ['destroy']]);
        $this->middleware('permission:advertisement-activate', ['only' => ['activate']]);
    }
    // /**
    //  * Display a listing of the resource.
    //  * @return Renderable
    //  */
    public function index()
    {
        $advertisements=Advertisement::get();
        return view('advertisement::dashboard.advertisements.index',compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('advertisement::dashboard.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'order'    => 'required|integer',
            'image'    => 'required',
            'start_date'    => 'required|date',
            'end_date'    => 'required|date'
        ]);
        $Advertisement  =new AdvertisementService();
        $Advertisement  ->setOrder($request->order)
                        ->setImage($request->image)
                        ->setStartDate($request->start_date)
                        ->setEndDate($request->end_date)
                        ->setIsInBanner($request->is_in_banner)
                        ->createAdvertisement();

        return redirect()->route("advertisements.index")->with('success', 'تم اضافة  بنجاح');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Advertisementmodule::dashboard.advertisements.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $advertisement=Advertisement::find($id);
        if (!$advertisement) {
            return redirect()->route('dashboard')->with('failed',"Advertisement Not Found");
        }
        return view('advertisement::dashboard.advertisements.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'order'        => 'required|integer',
            'image'        => 'nullable',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date',
        ]);

          $Advertisement = Advertisement::find($id);
          if(!$Advertisement){
              return redirect()->route('dashboard')->with('failed',"Advertisement Not Found");
          }

        $AdvertisementUpdate   = new AdvertisementService();
        $AdvertisementUpdate->setOrder($request->order)
                            ->setStartDate($request->start_date)
                            ->setEndDate($request->end_date)
                            ->setIsInBanner($request->is_in_banner);
                            if($request->has('image')){
                                $AdvertisementUpdate->updateImg($request->image,$Advertisement->image);
                            }
        $AdvertisementUpdate->updateAdvertisement($Advertisement);

        return redirect()->route("advertisements.index")->with('success', 'تم التعديل  بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $Advertisement=Advertisement::find($id);
        if (!$Advertisement) {
            return redirect()->route('dashboard')->with('failed',"Advertisement Not Found");
        }
        $Advertisement->delete();
        // return redirect()->back()->with('success',"Advertisement deleted");
    }

    public function activate($id)
    {
        $Advertisement=Advertisement::find($id);
        if (!$Advertisement) {
            return redirect()->route('dashboard')->with('failed',"Advertisement Not Found");
        }
        $Advertisement->is_active = !$Advertisement->is_active;
        $Advertisement->save();
    }
}
