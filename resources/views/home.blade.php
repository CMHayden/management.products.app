@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <api-key></api-key>
                <br>
                <passport-clients></passport-clients>
                <br>
                <passport-personal-access-tokens></passport-personal-access-tokens>
                <br>
            </div>
    </div>
</div>
@endsection
