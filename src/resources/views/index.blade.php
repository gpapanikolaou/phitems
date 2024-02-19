@extends('layout.layout')

@section('content')
<div class="container">
    <h1><a href="/">Pornhub Pornstars</a></h1>
    @include('shared.search-bar')
    <div class="row">
        @if (isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif
            @foreach ($paginatedItems as $pornstar)
            <div class="col-lg-4 mb-4">
                <div class="card">
                    @include('shared.pornstar-card')
                </div>
            </div>
            @endforeach
    </div>
    @include('shared.paginate-links')
</div>
    
@endsection
