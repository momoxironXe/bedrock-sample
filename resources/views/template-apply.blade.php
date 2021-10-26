{{--
  Template Name: Apply Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-apply')
  @endwhile
@endsection
