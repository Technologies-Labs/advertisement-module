@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>advertisements</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">advertisements</li>
<li class="breadcrumb-item active">All</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
                     <table class="display" id="basic-1">
                        <thead>
                            @if($message = Session::get('success'))
                            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                                <i data-feather="thumbs-up"></i>
                                <p>{{ $message }}</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                            @endif
                            @can('advertisement-create')
                                <div style="margin-bottom:5px ">
                                    <a class="btn btn-success" href="{{ route('advertisements.create') }}"> Create advertisement</a>
                                </div>
                            @endcan
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Order</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Shown In banner</th>
                                @can('advertisement-activate')
                                <th>Activation</th>
                                @endcan
                                <th>Action</th>
                            </tr>
                         </thead>
                            <tbody>
                            @foreach ($advertisements as $key => $advertisement)
                                <tr id="delete_advertisements_{{ $advertisement->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                       <a href="{{asset($advertisement->image)}}"> <img src="{{asset($advertisement->image)}}" width="50px" height="50px" alt=""></a>
                                    </td>
                                    <td>{{ $advertisement->order }}</td>
                                    <td>{{ $advertisement->start_date }}</td>
                                    <td>{{ $advertisement->end_date  }}</td>
                                    <td>
                                        @if ($advertisement->is_in_banner)
                                        <i data-feather="check"></i></td>
                                        @else
                                        <i data-feather="x"></i></td>
                                        @endif

                                    @can('advertisement-activate')
                                    <td>
                                        <div class="media-body text-center icon-state switch-outline">
                                            <label class="switch"  for="advertisement-activation-{{$advertisement->id}}">
                                            <input type="checkbox"  @if ($advertisement->is_active) checked @endif class="custom-control-input" id="advertisement-activation-{{$advertisement->id}}" onclick="activate_item('advertisements',{{$advertisement->id}})"><span class="switch-state bg-success"></span>
                                            </label>
                                        </div>
                                    </td>
                                    @endcan
                                    <td class="text-center">
                                        @can('advertisement-edit')
                                        <a class="btn btn-primary m-b-5"  href="{{ route('advertisements.edit',$advertisement->id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('advertisement-delete')
                                           <a href="javascript:void(0);" onclick="delete_item({{ $advertisement->id }},'advertisements')" class="btn btn-danger m-b-5"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
@endsection
