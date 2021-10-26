<section id="student-org">
    <div class="student-org-slider">
        @isset($all_student_activates)
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($all_student_activates as $all_student_activate)
                        <div class="swiper-slide cls-here">
                            <div class="slide-inner-wrapper">
                                <div class="slider-main">
                                    <div class="content">
                                        @isset($all_student_activate->student_activates_left)

                                            <div class="content-left">
                                                @foreach ($all_student_activate->student_activates_left as $student_activity)

                                                    @php
                                                        $vertical_position = $student_activity->content_vertical_position;
                                                    @endphp
                                                    @isset($student_activity->choose_activities)
                                                        <div class="content-left-{{ $vertical_position }} cls-here">
                                                            @foreach ($student_activity->choose_activities as $choose_activity)
                                                                @php
                                                                    $item = $choose_activity->choose_activity;
                                                                    $container_class = $choose_activity->container_class;
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

                                                                @else
                                                                    <a href=" {{ the_permalink($item) }}">
                                                                        @if ($container_class)
                                                                            <div class="org-solid {{ $container_class }}">
                                                                                <h3 class="sm-heading maroon">
                                                                                    {{ get_the_title($item) }}</h3>
                                                                                <p class="copy">
                                                                                    {!! $excerpt !!}</p>
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
                                                                                    <p class="copy">
                                                                                        {!! $excerpt !!}</p>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endisset
                                                @endforeach
                                            </div>
                                        @endisset
                                        @isset($all_student_activate->student_activates_right)
                                            <div class="content-right">
                                                @foreach ($all_student_activate->student_activates_right as $student_activity)
                                                    @php
                                                        $vertical_position = $student_activity->content_vertical_position;
                                                    @endphp
                                                    @isset($student_activity->choose_activities)
                                                        <div class="content-right-{{ $vertical_position }}">
                                                            @foreach ($student_activity->choose_activities as $choose_activities)
                                                                @php
                                                                    $item = $choose_activity->choose_activity;
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
                                                                            <p class="copy">{{ $excerpt }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    @endisset
                                                @endforeach
                                            </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
        @endisset
    </div>

    </div>
</section>
