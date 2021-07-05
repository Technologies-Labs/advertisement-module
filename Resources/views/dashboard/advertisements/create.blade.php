@extends('layouts.simple.master')
@section('title', 'Basic DataTables')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Advertisements</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Advertisements</li>
<li class="breadcrumb-item active">create</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
            <div class="card">
					<div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                       @endif
                       {!! Form::open(array('route' => 'advertisements.store','method'=>'POST','files'=>'true')) !!}
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="image"><strong>Image</strong></label><br>
									{!! Form::file('image',array('class' => 'form-control','required')) !!}
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="order"><strong>order</strong> </label>
									{!! Form::number('order', null, array('placeholder' => ' order','class' => 'form-control','required')) !!}

								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col">
								<div class="mb-3">
									<label for="is_in_banner">
									{!! Form::checkbox('is_in_banner',1,0, array('class' => 'checkbox_animated','form-check-input')) !!}
                                     in banner </label>
                                </div>
							</div>
						</div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="start_date"><strong>start Date</strong> </label>
                                    {!! Form::date('start_date', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label><strong>End Date</strong> </label>
                                    {!! Form::date('end_date', null, array('class' => 'form-control','required')) !!}
                                </div>
                            </div>
                        </div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
                {!! Form::close() !!}
			</div>
            </div>
		</div>
	</div>
</div>
@endsection
@section('script')
@endsection






