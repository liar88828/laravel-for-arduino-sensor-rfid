<x-layout>
    {{--    @dd($user)--}}
    <div class="container">
        {{--        <a class="btn btn-secondary mb-5" href="{{ route('list.user' )}}">Back</a>--}}

        <div class="row">

            <div class="col-lg-12  ">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">

                        <div class="d-flex flex-lg-row flex-md-column">

                            {{--                                 Photos         --}}
                            <div class=" d-flex justify-content-center">
                                <img class="rounded"
                                     width="400"
                                     height="400"
                                     src="https://static.thenounproject.com/png/4974686-200.png" alt="...">
                            </div>

                            {{--                                Bio Data            --}}
                            <div class=" mt-lg-5">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white p-2 capital">{{$user->name}}</h3>
                                </div>

                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span class="display-26 text-secondary me-2 font-weight-600">Alamat:</span>
                                        {{$user->alamat}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">Jenis Kelamin:</span>
                                        {{$user->jenis_kelamin}}
                                    </li>

                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">No Telephone:</span>
                                        @formatPhoneNumber($user->no_tlp)
                                    </li>

                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">Email:</span>
                                        {{$user->email}}
                                    </li>

                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">Lahir:</span>
                                        {{$user->lahir}}
                                    </li>
                                    <li class="mb-2 mb-xl-3 display-28">
                                        <span
                                            class="display-26 text-secondary me-2 font-weight-600">Divisi:</span>
                                        {{$user->divisi}}
                                    </li>


                                    {{--                                    @isset($user->denda)--}}
                                    {{--                                        <li class="mb-2 mb-xl-3 display-28">--}}
                                    {{--                                            <span class="display-26 text-secondary me-2 font-weight-600">Denda:</span>--}}
                                    {{--                                            @convertToRupiah($user->denda)--}}
                                    {{--                                        </li>--}}
                                    {{--                                    @endisset--}}

                                    <li class="mb-2 mb-xl-3  display-28">
                                        {{--  edit   edit  edit                     edit --}}
                                        <a class="btn btn-primary" href="{{route('anggota.edit',$user->id)}}">Edit</a>
                                        <a class="btn btn-info">Cetak Kartu</a>
                                        {{--                                        <a class="btn btn-success"></a>--}}

                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-4 mb-sm-5 ">
                        {{--Anggota--}}
                        <div class="mt-2">
                            <div class="card">
                                <div class="card-header">
                                    Anggota
                                </div>
                                <div class="card-body">
                                    @isset($anggota)
                                        <table class="table  table-striped  table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Anggota</th>
                                                <th scope="col">Jam Kerja</th>

                                                <th scope="col">Jam Masuk</th>
                                                <th scope="col">Jam Masuk Telat</th>
                                                <th scope="col">Jam Pulang</th>
                                                <th scope="col">Jam Pulang Telat</th>
                                                <th scope="col"></th>

                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$anggota->nama_anggota}}</td>
                                                <td>{{$anggota->jam_kerja}}</td>

                                                <td>{{$anggota->jam_masuk}}</td>
                                                <td>{{$anggota->jam_masuk_telat}}</td>
                                                <td>{{$anggota->jam_pulang}}</td>
                                                <td>{{$anggota->jam_pulang_telat}}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    @else
                                        Data Kosong  <a class="btn btn-primary"
                                                        href="{{route('anggota.pilih',$user->id)}}">Pilih Anggota</a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        {{--Sensor--}}

                        <div class="mt-2">
                            <div class="card">
                                <div class="card-header">
                                    Sensor
                                </div>
                                <div class="card-body">
                                    @isset($sensor)
                                        <table class="table  table-striped  table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">RFID</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$sensor->rfid}}</td>
                                                <td>{{$sensor->status}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @else
                                        Data Kosong  <a class="btn btn-primary"
                                                        href="{{route('sensor.index')}}">Create Sensor</a>
                                    @endisset
                                </div>
                            </div>
                        </div>

                        {{--record--}}
                        <div class="mt-2">
                            <div class="card">
                                <div class="card-header">
                                    Record
                                </div>
                                <div class="card-body">
                                    @isset($record)
                                        <table class="table  table-striped  table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">RFID</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($record as  $key=> $r)
                                                {{--                                                @foreach($data as $key=> $d)--}}
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>{{$r->tanggal}}</td>
                                                    <td>{{$r->waktu_masuk}}</td>
                                                    <td>{{$r->waktu_pulang}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    @else
                                        Data Kosong  <a class="btn btn-primary"
                                                        href="{{route('record.index.index')}}">Create Record</a>
                                    @endisset
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
