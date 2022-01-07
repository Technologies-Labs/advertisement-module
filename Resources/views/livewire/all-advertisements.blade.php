<div id="page-contents" class="row merged20">
    <div class="col-lg-12">
        <div class="main-wraper">
            <h4 class="main-title">اعلانات</h4>

            <div class="row col-xs-6" id="advertisement">
                @foreach ($advertisements as $advertisement)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="rec-group uk-card-hover">
                        {{-- <span>Free</span> --}}
                        <div class="rec-groupbox">
                            <figure><img src="{{ asset('storage/'.$advertisement->image) }}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
                @endforeach
                <div x-data="{
                    observe() {
                        let observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting)
                            {
                                @this.call('loadMore')
                            }
                           })
                        },{
                           root: null
                        })
                            observer.observe(this.$el)
                    }
                }" x-init="observe">

                </div>

            </div>
        </div>
        <div class="load mb-5 mt-1">
            @if($advertisements->hasMorePages())
            @include('components.loading')
            @endif
        </div>

        {{-- <div class="load mb-5 mt-1">
            <ul class="pagination">
                <li><a title="" href="#"><i class="icofont-arrow-left"></i></a></li>
                <li><a title="" href="#" class="active">1</a></li>
                <li><a title="" href="#">2</a></li>
                <li><a title="" href="#">3</a></li>
                <li><a title="" href="#">4</a></li>
                <li><a title="" href="#">5</a></li>
                <li>....</li>
                <li><a title="" href="#">10</a></li>
                <li><a title="" href="#"><i class="icofont-arrow-right"></i></a></li>
            </ul>
        </div> --}}

    </div>

</div>
