<x-layout>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
        <p class="mb-4 text-capitalize">Masuk untuk melanjutkan</p>
    </header>

    <div class="container">
        <form action="{{ route('authenticate') }}" method="post">
            @csrf()

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

</x-layout>
