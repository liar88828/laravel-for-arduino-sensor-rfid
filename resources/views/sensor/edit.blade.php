<x-layout>
    <div class="container">

        <a class="btn btn-secondary mb-5" href="{{ route('sensor.index',$data->id) }}">Back</a>

        <form action="{{route('sensor.update',$data->id)}}" method="POST">

            @method('PUT')
            @csrf()

            <div class="d-flex gap-3">
                <div class="w-50">

                    <div class="mb-3">
                        <label for="rfid" class="form-label">RFID</label>
                        <input type="number" class="form-control" name="rfid" value="{{old('rfid',$data->rfid)}}">
                        @error('rfid')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <input type="number" class="form-control" name="user_id" value="{{old('user_id',$data->user_id)}}">
                        @error('user_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                </div>

                <div class="w-50">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" value="{{old('status',$data->status)}}">
                            <option value="invalid">Invalid</option>
                            <option value="active">Active</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

</x-layout>
