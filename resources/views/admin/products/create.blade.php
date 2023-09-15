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

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container mt-5">

            <label for="productName" class="mt-4">Product Name</label>
            <input id="productName" name="productnameen" class="form-control mt-2" placeholder="English" required>

            <label for="productDescription" class="mt-4">Product Description</label>
            <textarea id="productDescription" name="productdescriptionen" class="form-control mt-2"
                      placeholder="English" required></textarea>

            <label for="productPrice" class="mt-3">Price</label>
            <input id="productPrice" name="price" class="form-control mt-2" placeholder="$" required>

            <div class="mt-3">
                <label
                    class=" mt-4">Image</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input name="images[]" type="file" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01" required multiple>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5">Create</button>
        </div>
    </form>
    @include('admin.layouts.footer')
@endsection
