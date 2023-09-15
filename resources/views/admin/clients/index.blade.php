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
    <div class="container mt-3">

        <div class="container">
            <div class="d-flex flex-row">
                <button onclick="window.location='{{ route("clients.create") }}'"
                        class="btn btn-primary mb-3 col-3">Create
                </button>

                <div class="col-3"></div>
                <form class="col-6 d-flex flex-row" method="post" action="{{ route('import.clients') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="clients" class="form-control">
                    <button class="btn btn-warning">Upload</button>
                </form>
            </div>
            <div>
                <form method="post" action="{{ route('download.clients.form') }}">
                    @csrf
                    <button class="btn btn-info">Download Form</button>
                </form>
            </div>

        </div>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">Clients</span>
                </div>

                <div class="table-stats order-table ">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Actions</th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($clients as $client)
                            <form method="post" action="{{ route('clients.destroy',[$client->id]) }}">
                                @csrf
                                {{ method_field('delete') }}

                                <tbody>
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->first_name }}</td>
                                    <td>{{ $client->last_name }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td class="row pull-right mr-2">
                                        <button type="submit"
                                                class="btn btn-sm btn-danger delete mr-1">Delete
                                        </button>
                                        <a href="{{ route('clients.edit', [ $client->id]) }}"
                                           class="btn btn-sm btn-warning mr-1">Edit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')
@endsection
