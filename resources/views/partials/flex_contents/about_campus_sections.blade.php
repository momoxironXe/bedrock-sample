<section id="about-campus">
    <div class="about-campus-slider">
        @if (have_rows('about_campus_slider')) 
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @while (have_rows('about_campus_slider')) @php the_row() @endphp
                        <div class="swiper-slide">
                            <div class="slide-inner-wrapper">
                                @if (get_sub_field('main_image'))
                                <img class="main-img" src="{{get_sub_field('main_image')}}" alt="">
                                    @endif
                                <div class="slider-main">
                                    <div class="content">
                                        @if (get_sub_field('slider_main_bg_image'))
                                        <img class="bg-img" src="{{get_sub_field('slider_main_bg_image')}}" alt="">
                                        @endif
                                        <div class="wrapper">
                                            @if (get_sub_field('headline'))
                                                <h2 class="page-heading maroon">
                                                {{the_sub_field('headline')}}
                                                </h2>
                                            @endif
                                         
                                            @if (get_sub_field('description'))
                                            <span class="copy">
                                              {{the_sub_field('description')}}
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="bottom-imgs">
                                        <div class="img-container left">
                                            @if (get_sub_field('bottom_left_image'))
                                            <img src="{{get_sub_field('bottom_left_image')}}"
                                                alt="">
                                                @endif
                                        </div>
                                        <div class="img-container right">
                                            @if (get_sub_field('bottom_right_image'))
                                            <img src="{{get_sub_field('bottom_right_image')}}"
                                                alt="">
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endwhile
                </div>
                <div class="swiper-controls">
                    <div class="swiper-button-prev">
                        @include('modules.arrow-icon')
                    </div>
                    <div class="swiper-button-next">
                        @include('modules.arrow-icon')
                    </div>
                </div>
        @endif
    </div>
    </div>
</section>
