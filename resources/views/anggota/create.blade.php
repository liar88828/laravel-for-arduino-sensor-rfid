<x-layout>
    <div class="container">
        <a class="btn btn-secondary mb-5" href="{{ route('anggota.index' )}}">Back</a>

        <form action="{{route('anggota.store')}}" method="POST">
            @csrf()

            <div class="d-flex gap-3">
                <div class="w-50">

                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">Jam Masuk</label>
                        <input type="time" class="form-control" name="jam_masuk" value="{{old('jam_masuk')}}">
                        @error('jam_masuk')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_pulang" class="form-label">Jam Pulang</label>
                        <input type="time" class="form-control" name="jam_pulang" value="{{old('jam_pulang')}}">
                        @error('jam_pulang')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_kerja" class="form-label">Jam Kerja</label>
                        <input type="number" class="form-control" name="jam_kerja" value="{{old('jam_kerja')}}">
                        @error('jam_kerja')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="number" class="form-control" name="user_id" value="{{old('user_id')}}">
                        @error('user_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                </div>

                <div class="w-50">
                    <div class="mb-3">
                        <label for="jam_masuk_telat" class="form-label">Jam Masuk Telat</label>
                        <input type="time" class="form-control" name="jam_masuk_telat" value="{{old('jam_masuk_telat')}}">
                        @error('jam_masuk_telat')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam_pulang_telat" class="form-label">Jam Pulang Telat</label>
                        <input type="time" class="form-control" name="jam_pulang_telat" value="{{old('jam_pulang_telat')}}">
                        @error('jam_pulang_telat')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>


                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-layout>
