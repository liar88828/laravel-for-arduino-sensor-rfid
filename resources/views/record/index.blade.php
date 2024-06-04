<x-layout>
    {{--    @dd($data)--}}
    <div class="container">
        {{--        @if(session()->has('message'))--}}
        {{--            <div class="alert alert-success mt-2">{{ session('message')}}</div>--}}
{{--        @endif--}}
{{--{{dd($data)}}--}}
        <div>
            <a class="btn btn-primary mb-5" href="{{ route('record.create') }}">Create Record</a>

            {{--            <a class="btn btn-info" href="{{ route('buku.edit') }}">Edit Buku</a>--}}
        </div>

        <div>
{{--            @isset($data)--}}
                <table class="table table-striped table-hover border ">
                    {{--                <caption>New York City Marathon Results 2013</caption>--}}
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Sensor</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Masuk</th>
                        {{--                    <th scope="col">Jam Pulang</th>--}}
                        {{--                    <th scope="col">User</th>--}}
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key=> $d)

                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$d->name}}</td>
                            <td>{{$d->rfid}}</td>
                            <td>Semarang</td>
                            <td>{{$d->tanggal}}</td>
                            <td>{{$d->waktu_masuk}}</td>
                            {{--                        <td>--}}
                            {{--                            @if (!is_null($d->jam_pulang))--}}
                            {{--                            @formatTime($d->jam_pulang)--}}
                            {{--                            @endif--}}
                            {{--                        </td>--}}
                            {{--                        <td>{{$d->user_id}}</td>--}}

                            <td>
                                <div class="d-flex gap-3">
                                    <form action="{{route('record.destroy',$d->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf()
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                    {{--                                <a class="btn btn-info" href="{{route('record.show',$d->id)}}">Profile</a>--}}
                                    <a class="btn btn-primary" href="{{route('record.edit',$d->id)}}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--            @endisset--}}
        </div>
        {{ $data->links() }}
    </div>

</x-layout>
{{--<script> new DataTable('#example');--}}
{{--</script>--}}
