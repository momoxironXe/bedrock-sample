<section id="student-org">
    <div class="student-org-slider">
        @if (have_rows('all_student_activates'))
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @while (have_rows('all_student_activates'))@php the_row() @endphp
                        <div class="swiper-slide cls-here">
                            <div class="slide-inner-wrapper">
                                <div class="slider-main">
                                    <div class="content">
                                        @if (have_rows('student_activates_left'))
                                            <div class="content-left">
                                                @while (have_rows('student_activates_left')) @php the_row() @endphp

                                                    @php
                                                        $vertical_position = get_sub_field('content_vertical_position');
                                                    @endphp
                                                    @if (have_rows('choose_activities'))
                                                        <div class="content-left-{{ $vertical_position }} cls-here">
                                                            @while (have_rows('choose_activities'))
                                                                @php the_row() @endphp
                                                                @php
                                                                    $item = get_sub_field('choose_activity');
                                                                    $excerpt = get_the_excerpt($item);
                                                                    $excerpt = substr($excerpt, 0, 160);
                                                                    $featured_img_url = get_the_post_thumbnail_url($item, 'full');
                                                                @endphp
                                                                @if ($vertical_position == 'middle')
                                                                    <div class="org-headline">
                                                                        @if ($featured_img_url)
                                                                            <img class="org-headline-bg"
                                                                                src="{{ $featured_img_url }}"
                                                                                alt="{{ get_the_title($item) }}">
                                                                        @endif

                                                                        <div class="wrapper">
                                                                            <h2 class="page-heading maroon">
                                                                                {{ get_the_title($item) }}</h2>
                                                                        </div>
                                                                        <div class="swiper-controls">
                                                                            <div class="swiper-button-prev">
                                                                                @include('modules.arrow-icon')
                                                                            </div>
                                                                            <div class="swiper-button-next">
                                                                                @include('modules.arrow-icon')
                                                                            </div>
                                                                        </div>
                                                                    </div>
<<<<<<< HEAD
=======

>>>>>>> 8764d603dd591971245ba0e3cadf261e15780a07
                                                                @else
                                                                    <a href=" {{ the_permalink($item) }}">
                                                                        @if (get_sub_field('container_class'))
                                                                            <div
                                                                                class="org-solid {{ the_sub_field('container_class') }}">
                                                                                <h3 class="sm-heading maroon">
                                                                                    {{ get_the_title($item) }}</h3>
                                                                                    <p
                                                                                    class="copy">{{ $excerpt }}</p>
                                                                            </div>
                                                                        @else
                                                                            <div class="org-photo {{ $item }}">
                                                                                <div class="org-photo-container">
                                                                                    @if ($featured_img_url)
                                                                                    <img class="org-headline-bg"
                                                                                        src="{{ $featured_img_url }}"
                                                                                        alt="{{ get_the_title($item) }}">
                                                                                @endif
                                                                                </div>
                                                                                <div class="org-photo-caption">
                                                                                    <h3 class="sm-heading">
                                                                                        {{ get_the_title($item) }}</h3>
                                                                                        <p
                                                                                        class="copy">{{ $excerpt }}</p>
                                                                                </div>
                                                                            </div>
                                                                        @endif

                                                                    </a>

                                                                @endif


                                                            @endwhile
                                                        </div>
                                                    @endif
                                                @endwhile
                                            </div>
                                        @endif
                                        @if (have_rows('student_activates_right'))
                                            <div class="content-right">
                                                @while (have_rows('student_activates_right'))
                                                    @php the_row() @endphp
                                                    @php
                                                        $vertical_position = get_sub_field('content_vertical_position');
                                                    @endphp
                                                    @if (have_rows('choose_activities'))
                                                        <div class="content-right-{{ $vertical_position }}">
                                                            @while (have_rows('choose_activities'))
                                                                @php the_row() @endphp
                                                                @php
                                                                    $item = get_sub_field('choose_activity');
                                                                    $excerpt = get_the_excerpt($item);
                                                                    $excerpt = substr($excerpt, 0, 160);
                                                                @endphp
                                                                <a href="{{ the_permalink($item) }}">
                                                                    <div class="org-photo">
                                                                        <div class="org-photo-container">
                                                                            @if ($featured_img_url)
                                                                            <img class="org-headline-bg"
                                                                                src="{{ $featured_img_url }}"
                                                                                alt="{{ get_the_title($item) }}">
                                                                        @endif
                                                                        </div>
                                                                        <div class="org-photo-caption">
                                                                            <h3 class="sm-heading">
                                                                                {{ get_the_title($item) }}</h3>
                                                                            <p
                                                                                class="copy">{{ $excerpt }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endwhile
                                                        </div>
                                                    @endif
                                                @endwhile
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endwhile
                </div>
                <div class="swiper-controls-tablet">
                    <div class="swiper-button-prev">
                        @include('modules.arrow-icon')
                    </div>
                    <div class="swiper-button-next">
                        @include('modules.arrow-icon')
                    </div>
                </div>

            </div>
        @endif
    </div>

    </div>
</section>
