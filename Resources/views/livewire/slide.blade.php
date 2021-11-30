<div class="col-12">
    <div class="rec-grp-caro">
        @foreach ($advertisements['advertisements'] as $advertisement)
        <div class="row remove-ext-30">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="rec-group">
                    <div class="rec-groupbox">
                        <figure><img src="{{ asset('storage/'.$advertisement->image) }}" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="rec-group">
                    <div class="rec-groupbox" id="{{$advertisement->id+1}}">
                        <figure><img src="{{ asset('storage/'.$advertisement->image) }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
