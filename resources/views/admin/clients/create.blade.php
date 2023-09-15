@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.header')

    @if($errors->all())
        <div class="notification error closeable">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <a class="close"></a>
        </div>
    @endif

    <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container mt-5">

            <label for="first_name" class="mt-4">First Name</label>
            <input id="first_name" name="first_name" class="form-control mt-2" placeholder="" >

            <label for="last_name" class="mt-4">Last Name</label>
            <input id="last_name" name="last_name" class="form-control mt-2" placeholder="" >

            <label for="personal_id" class="mt-3">Personal ID</label>
            <input id="personal_id" name="personal_id" class="form-control mt-2" placeholder="ID">

            <label for="phone" class="mt-3">Phone</label>
            <input id="phone" name="phone" class="form-control mt-2" placeholder="Tel:" required>

            <button type="submit" class="btn btn-primary mt-5">Create</button>
        </div>
    </form>
    @include('admin.layouts.footer')
@endsection
