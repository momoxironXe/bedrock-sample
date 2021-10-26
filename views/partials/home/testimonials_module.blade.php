@if (isset($flex_content->choose_testimonials))
    <div class="testimonials " data-module="testimonials-slider">
        @if (isset($flex_content->background_image))
            <img class="bg-img" src="{{ $flex_content->background_image }}" alt="">
        @endif
        <div class="testimonials-wrapper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @php
                        $choose_testimonials = $flex_content->choose_testimonials;                        
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
            </div>
        </div>
    </div>
@endif
