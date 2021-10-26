    <div class="testimonials " data-module="testimonials-slider">
        @if (get_sub_field('background_image'))
            <img class="bg-img" src="{{ get_sub_field('background_image') }}" alt="">
        @endif
        <div class="testimonials-wrapper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @php
                        $choose_testimonials = get_sub_field('choose_testimonials');
                    @endphp
                    @foreach ($choose_testimonials as $key => $testimonial_id)
                        @php
                            $testimonial = FrontPage::getTestimonialDetails($testimonial_id);
                        @endphp
                        @if ($testimonial)
                            @include('modules.testimonials',$testimonial)
                        @endif
                    @endforeach
                </div>
                <div class="swiper-controls">
                    <div class="swiper-button-prev">
                        @include('modules.arrow-icon')
                    </div>

                    <div class="swiper-button-next">
                        @include('modules.arrow-icon')
                    </div>
                </div>


                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
