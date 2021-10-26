{{--
  Template used for homepage if defined in General > Reading
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-front-page')
  @endwhile
@endsection
