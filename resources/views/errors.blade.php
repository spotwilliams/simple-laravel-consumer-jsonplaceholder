@extends('layouts.app')

@section('content')
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Something happen!</h4>
        <p>There was an error while processing the request.</p>
        <hr>
        <p class="mb-0">Please, try again. If happens again contact support.</p>
        @isset($exception)
            {{$exception->getMessage()}}
        @endisset
    </div>
@endsection
