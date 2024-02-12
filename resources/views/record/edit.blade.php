<x-layout>
    <div class="container">

        <a class="btn btn-secondary mb-5" href="{{ route('record.index',$data->id) }}">Back</a>

        <form action="{{route('record.update',$data->id)}}" method="POST">

            @method('PUT')
            @csrf()

            <div class="d-flex gap-3">
                <div class="w-50">

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Jam Masuk</label>
                        <input type="date" class="form-control" name="tanggal" value="{{old('tanggal',$data->tanggal)}}">
                        @error('tanggal')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">Jam Masuk</label>
                        <input type="time" class="form-control" name="jam_masuk" value="{{old('jam_masuk',$data->jam_masuk)}}">
                        @error('jam_masuk')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_pulang" class="form-label">Jam Pulang</label>
                        <input type="time" class="form-control" name="jam_pulang" value="{{old('jam_pulang',$data->jam_pulang)}}">
                        @error('jam_pulang')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                </div>

                <div class="w-50">
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="number" class="form-control" name="user_id" value="{{old('user_id',$data->user_id)}}">
                        @error('user_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</x-layout>
