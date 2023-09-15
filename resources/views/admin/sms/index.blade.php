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
        <form method="post" action="{{ route('sms.update', $sms) }}">
            @csrf @method('PUT')
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">SMS Settings</span>
                </div>
                <div class="table-stats order-table ">

                    <div class="col-5 my-4">
                        <label class="form-control-label">Subject</label>
                        <input class="form-control" name="subject" id="subject" value="{{ $sms->subject }}">
                    </div>
                    <div class="col-5 my-4">
                        <label class="form-control-label">Body</label>
                        <textarea class="form-control" name="body" id="body">{{ $sms->body }}</textarea>
                    </div>
                    <div class="col-5 my-4">
                        <button class="btn btn-success">Save Settings</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    @include('admin.layouts.footer')
@endsection
