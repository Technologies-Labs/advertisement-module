<div class="">
    @foreach ($advertisements as $advertisement)
    <div class="advertisment-box">
        <h4 class=""><i class="icofont-info-circle"></i> advertisment</h4>
        <figure>
            <a href="#" title="Advertisment"><img
                    src="{{ asset('storage') }}/{{$advertisement->image}}" alt=""></a>
        </figure>
    </div>
    @endforeach

</div>

