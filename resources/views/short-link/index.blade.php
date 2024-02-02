@extends('layouts.layout')
@section('content')
<section class="content-header pl-0">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 pl-0"></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('short-link.index') }}">@lang('Short Link')</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>@lang('Short Link')</h3>
            </div>
            <div class="card-header">
                <form method="POST" action="{{ route('short-link.store') }}">
                    @csrf
                    <div class="input-group mb-3">
                      <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Generate Shorten Link</button>
                      </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Short Link</th>
                            <th>Link</th>
                            <th>Hits</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                                <td>{{ $row->link }}</td>
                                <td>{{ $row->hits }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function reloadPage() {
        location.reload(true); // true forces a reload from the server, not from the browser cache
    }
</script>
@include('layouts.delete_modal')
@include('script.link.index.js')
@endsection