<x-layout>
    <div class="container">
        <a class="btn btn-secondary mb-5" href="{{ route('sensor.index' )}}">Back</a>

        <form action="{{route('sensor.store')}}" method="POST">
            @csrf()

            <div class="d-flex gap-3">
                <div class="w-50">

                    <div class="mb-3">
                        <label for="rfid" class="form-label">RFID</label>
                        <input type="number" class="form-control" name="rfid" value="{{old('rfid')}}">
                        @error('rfid')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label for="user_id" class="form-label">User</label>--}}
{{--                        <input type="number" class="form-control" name="user_id" value="{{old('user_id')}}">--}}
{{--                        @error('user_id')--}}
{{--                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror--}}
{{--                    </div>--}}
{{--                    {{dd($users)}}--}}
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select class="form-control" name="user_id" value="{{old('user_id')}}">
                            @foreach($users as $key=> $d)
                            <option value={{$d->id}}>{{$d->name}}</option>
                            @endforeach

                        </select>
                        @error('user_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>

                </div>

                <div class="w-50">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" name="status" value="{{old('status')}}">
                            <option value="Invalid">Invalid</option>
                            <option value="Active">Active</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</x-layout>
