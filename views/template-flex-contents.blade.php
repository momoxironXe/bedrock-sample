{{--
    Template Name: Flex Contents Template 
--}}

@extends('layouts.app')

@section('content')
@while (have_posts())
@php the_post() @endphp

@if (have_rows('flex_contents'))
@while (have_rows('flex_contents'))
@php the_row() @endphp

@include('partials.flex_contents.'.get_row_layout())

@endwhile
@endif
</main>

@endwhile
@endsection