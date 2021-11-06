@extends('layouts.simple.master')
@section('content')
<livewire:advertisementmodule::all-advertisements :position="Modules\AdvertisementModule\Enum\AdvertisementPositionEnum::PAGE" />
@endsection




