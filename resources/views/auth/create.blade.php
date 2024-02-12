<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
        <p class="mb-4 text-capitalize">Masuk untuk melanjutkan</p>
    </header>

    <div class="container-sm">
        <form action="{{ route('create') }} " method="post">
            @csrf()

            <div class="d-flex gap-3">
                <div class="w-50">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @error('name')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" maxlength="100">{{old('alamat')}}</textarea>
                        @error('alamat')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_tlp" class="form-label">No Telephone</label>
                        <input type="tel" class="form-control" name="no_tlp" value="{{old('no_tlp')}}"/>
                        @error('no_tlp')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="lahir" class="form-label">Lahir</label>
                        <input type="date" class="form-control" name="lahir" value="{{old('lahir')}}"/>
                        @error('lahir')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" class="form-control" name="divisi" value="{{old('divisi')}}"/>
                        @error('divisi')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                </div>

                <div class="w-50">



                    <div class="mb-3">
                        <label for="rfid" class="form-label">RFID</label>
                        <input type="text" class="form-control" name="rfid" value="{{old('rfid')}}"/>
                        @error('rfid')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">
                            <option value="Laki-Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>




                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                        @error('email')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>


                    <div class="mb-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}"/>
                        @error('password')<p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label for="password2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               value="{{old('password_confirmation')}}"/>
                        @error('password_confirmation')<p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-layout>
