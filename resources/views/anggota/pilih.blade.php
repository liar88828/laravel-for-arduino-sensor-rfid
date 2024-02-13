<x-layout>
    <div class="container">
        <a class="btn btn-secondary mb-5" href="{{ route('profile.check',$user->id )}}">Back</a>

        <div>
            <table class="table table-striped table-hover border ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Pulang</th>
                    <th scope="col">Jam Masuk Telat</th>
                    <th scope="col">Jam Pulang Telat</th>
                    <th scope="col">Jam Kerja</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($anggota as $key=> $d)

                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$d->nama_anggota}}</td>
                        <td>{{$d->jam_masuk}}</td>
                        <td>{{$d->jam_pulang}}</td>
                        <td>{{$d->jam_masuk_telat}}</td>
                        <td>{{$d->jam_pulang_telat}}</td>
                        <td>{{$d->jam_kerja}}</td>

                        @if($d->id!==$user->anggota_id)
                            <td>
                                <div class="d-flex gap-3">
                                    <form action="{{route('anggota.konfirmasi',$user->id)}}" method="post">
                                        @method('PUT')
                                        @csrf()
                                        <input type="hidden" name="anggota_id" value="{{$d->id}}">
                                        <button class="btn btn-primary">Konfirmasi</button>
                                    </form>
                                </div>
                            </td>
                        @endif

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $anggota->links() }}
    </div>

</x-layout>
