{{--
  Template Name: Majors Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-majors')
  @endwhile
@endsection
