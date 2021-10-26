{{-- Template Name: Flex Contents Template --}}

@extends('layouts.app')

@section('content')
    @while (have_posts()) @php the_post() @endphp
        {{-- <main class="main life-at-mcmurry" id="main">
            <section id="intro">
                @include('modules.banner',
                ['bg_img' =>get_the_post_thumbnail_url(),
                'bg_alt' => get_the_title(),
                'top_btn' => 'Back to Admissions Overview',
                'title' =>get_the_title(),
                'dark_overlay' => true
                ]
                )
            </section>
            @if (have_rows('flex_contents')) @php @endphp
                @while (have_rows('flex_contents')) @php the_row() @endphp
                    @include('partials.flex_contents.'.get_row_layout())
                @endwhile
            @endif
        </main> --}}
        @include('partials.content-life')

    @endwhile
@endsection
