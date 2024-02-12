<x-layout>
    <div class="container">


        <div>
            {{--            <a class="btn btn-primary mb-5" href="{{ route('buku.create') }}">Create buku</a>--}}
        </div>

        <div class="row gap-3">
            @foreach($data as $key=> $d)

                <div class="col-sm">
                    <div class="card">
                        <img src="{{$d->img}}" class="card-img-top" alt="image_book"/>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"><a>{{$d->judul}}</a></h5>
                            <p class="card-text d-flex row">
                                <span class="text-nowrap">Penerbit : {{$d->penerbit}}</span>
                                <span class="text-nowrap"> Kategori : {{$d->kategori}}</span>
                            </p>

                            <p class="card-text">
                                <small class="text-muted">Jumlah : {{$d->jumlah}}</small></p>
                            <a class="btn btn-info" href="{{route('buku.show',$d->id)}}">Detail</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>


        {{ $data->links() }}
    </div>

</x-layout>


{{--<div class="card">--}}
{{--    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">--}}
{{--        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Food/8-col/img (5).jpg" class="img-fluid" />--}}
{{--        <a href="#!">--}}
{{--            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="card-body">--}}
{{--        <h5 class="card-title font-weight-bold"><a>La Sirena restaurant</a></h5>--}}
{{--        <ul class="list-unstyled list-inline mb-0">--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <i class="fas fa-star text-warning fa-xs"> </i>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <i class="fas fa-star text-warning fa-xs"></i>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <i class="fas fa-star text-warning fa-xs"></i>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <i class="fas fa-star text-warning fa-xs"></i>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item">--}}
{{--                <i class="fas fa-star-half-alt text-warning fa-xs"></i>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item">--}}
{{--                <p class="text-muted">4.5 (413)</p>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <p class="mb-2">$ • American, Restaurant</p>--}}
{{--        <p class="card-text">--}}
{{--            Some quick example text to build on the card title and make up the bulk of the--}}
{{--            card's content.--}}
{{--        </p>--}}
{{--        <hr class="my-4" />--}}
{{--        <p class="lead"><strong>Tonight's availability</strong></p>--}}
{{--        <ul class="list-unstyled list-inline d-flex justify-content-between">--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <div class="chip me-0">5:30PM</div>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <div class="chip bg-secondary text-white me-0">7:30PM</div>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <div class="chip me-0">8:00PM</div>--}}
{{--            </li>--}}
{{--            <li class="list-inline-item me-0">--}}
{{--                <div class="chip me-0">9:00PM</div>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <a href="#!" class="btn btn-link link-secondary p-md-1 mb-0">Button</a>--}}
{{--    </div>--}}
{{--</div>--}}
{{----}}
