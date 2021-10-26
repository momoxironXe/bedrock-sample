<main class="main homepage" id="main">

    @if (have_rows('flex_contents')) @php @endphp
        @while (have_rows('flex_contents')) @php the_row() @endphp
            @include('partials.flex_contents.'.get_row_layout())
        @endwhile
    @endif
</main>
