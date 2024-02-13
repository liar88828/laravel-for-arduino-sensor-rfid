<x-layout>
    {{--    @dd($data)--}}
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success mt-2">{{ session('message')}}</div>
        @endif

        <div>
            <a class="btn btn-primary mb-5" href="{{ route('register') }}">Create User</a>

            {{--            <a class="btn btn-info" href="{{ route('buku.edit') }}">Edit Buku</a>--}}
        </div>

        <div>
            <table class="table table-striped table-hover border ">
                {{--                <caption>New York City Marathon Results 2013</caption>--}}
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Divisi</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telp</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Lahir</th>
                    <th scope="col">RFID</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($data as $key=> $d)

                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$d->name}}</td>
                        <td>{{$d->divisi}}</td>
                        <td>{{$d->email}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->no_tlp}}</td>
                        <td>{{$d->jenis_kelamin}}</td>
                        <td>{{$d->lahir}}</td>
                        <td>{{$d->rfid}}</td>

                        <td>
                            <div class="d-flex gap-3">
                                <form action="{{route('destroy.user',$d->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf()
                                    <button class="btn btn-danger">Delete</button>
                                </form>

                                {{--                                <a class="btn btn-info" href="{{route('register',$d->id)}}">Detail</a>--}}
                                <a class="btn btn-primary" href="{{route('edit.user',$d->id)}}">Edit</a>
                                <a class="btn btn-info" href="{{route('profile.check',$d->id)}}">Profile</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
        {{ $data->links() }}
    </div>

</x-layout>
{{--<script> new DataTable('#example');--}}
{{--</script>--}}
