<section id="about-campus">
    <div class="about-campus-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @if (count($about_campus_slider)):
                    @foreach ($about_campus_slider as $slider)
                        <div class="swiper-slide">
                            <div class="slide-inner-wrapper">
                                @if ($slider->main_image)
                                    <img class="main-img" src="{{ $slider->main_image->url }}"
                                        alt="{{ $slider->main_image->title }}">
                                @endif

                                <div class="slider-main">
                                    <div class="content">
               
                                        {{-- @dd($slider->slider_main_bg_image); --}}
                                        @if ($slider->slider_main_bg_image)
                                            <img class="bg-img" src="{{ $slider->slider_main_bg_image->url }}"
                                                alt="{{ $slider->slider_main_bg_image->url }}">
                                        @endif

                                        <div class="wrapper">
                                            @if ($slider->headline)
                                                <h2 class="page-heading maroon">{{ $slider->headline }}</h2>
                                            @endif
                                            @if ($slider->description)
                                                <span class="copy">
                                                    {!! $slider->description !!}
                                                </span>
                                            @endif

                                        </div>

                                    </div>
                                    <div class="bottom-imgs">
                                        @if ($slider->bottom_left_image)
                                        <div class="img-container left">
                                            <img src=" {{ $slider->bottom_left_image->url }}"
                                                alt=" {{ $slider->bottom_left_image->title }}">
                                        </div>
                                        @endif

                                        @if ($slider->bottom_right_image)
                                        <div class="img-container right">
                                            <img src=" {{ $slider->bottom_right_image->url }}"
                                                alt=" {{ $slider->bottom_right_image->title }}">
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
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
    </div>
</section>
