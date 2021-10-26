{{--
  Template Name: Flex Information Template (this template may be covered by Flex Landing)
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-flex-information')
  @endwhile
@endsection
