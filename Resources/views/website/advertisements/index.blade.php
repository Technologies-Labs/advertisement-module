@extends('layouts.simple.master')
@section('content')
<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <livewire:advertisement::all-advertisements :position="Modules\Advertisement\Enum\AdvertisementPositionEnum::PAGE" />

                </div>
            </div>
        </div>
    </div>
</section>


@endsection




