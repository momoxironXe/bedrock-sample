{{--
  Template Name: Contact template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-contact-us')
  @endwhile
@endsection
