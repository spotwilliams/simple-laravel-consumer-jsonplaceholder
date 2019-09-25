@extends('layouts.app')

@section('container')
<section class="latest-posts">
    <div class="container">
{{--        <header>--}}
{{--            <h2>Blog content</h2>--}}
{{--            <p class="text-big">The images are selected randomly to add content to the preview</p>--}}
{{--        </header>--}}

        @yield('content')

    </div>
</section>
@endsection
