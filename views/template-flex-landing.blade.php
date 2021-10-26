{{--
  Template Name: Flex Landing Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-flex-landing')
  @endwhile
@endsection
