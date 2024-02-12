<x-layout>

    <div class="container">
        {{--        Kembali     --}}
{{--        <a class="btn btn-secondary " href="{{ route('buku.list') }}">Back</a>--}}

{{--        @if( auth()->user()->role==='petugas' )--}}
{{--            <a class="btn btn-danger" href="{{ route('sensor.index') }}">Back Petugas</a>--}}
{{--        @endif--}}
        {{--      end kembali              --}}

        <div class="row">

            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            {{--                                 Photos         --}}
                            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
{{--                                <img src="{{$data->img}}" alt="...">--}}
                            </div>
                            {{--                                Bio Data            --}}
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white p-2 capital">{{$data->judul}}</h3>
                                    {{--                                        <span class="text-primary">Coach</span>--}}
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">SIBN:</span>
                                        {{$data->isbn}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Pengarang:</span>
                                        {{$data->pengarang}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Penerbit:</span>
                                        {{$data->penerbit}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Tahun:</span>
                                        {{$data->tahun}}

                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Jumlah:</span>
                                        {{$data->jumlah}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Kategori:</span>
                                        {{$data->kategori}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Tipe:</span>
                                        {{$data->tipe}}
                                    </li>
                                    <li class="mb-2 mb-xl-3  display-28">
                                        {{--  edit                     edit --}}
{{--                                        @if( auth()->user()->role==='petugas' )--}}
                                            <a class="btn btn-danger" href="{{route('sensor.edit',$data->id)}}">Edit</a>
{{--                                        @endif--}}

                                        <a class="btn btn-primary">Download</a>
                                        <a class="btn btn-info">Pinjam</a>
                                        {{--                                        <a class="btn btn-success"></a>--}}

                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--                about----               --}}
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <span class="section-title text-primary mb-3 mb-sm-4">Deskripsi</span>
                    <p>{{$data->deskripsi}}</p>

                </div>
            </div>
            {{--                Skill                  --}}
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5">

                        {{--                             Education          --}}
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    Peminjam
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Anton Wibowo</h5>
                                    <p class="card-text">Bukube sitik Warnane</p>
                                    {{--                                    <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
