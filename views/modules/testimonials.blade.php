<div class="swiper-slide">
    <div class="testimonials__content">
        @if ($title)
            <h2 class="page-heading light">{{ $title }}</h2>
        @endif
        @if ($description)
            <span class="quote">{!! $description !!}</span>
        @endif

    </div>

    <div class="testimonials__author">
        @if ($author_image)
            <div class="testimonials__author__img">
                <img src="{{ $author_image }}" alt="" />
            </div>
        @endif

        <div class="testimonials__author__info copy bold">
            @if ($full_name)
                <span>{{ $full_name }}</span>
            @endif
            @if ($author_title)
                <span>{{ $author_title }}</span>
            @endif

            @if ($description)
                <span>{{ $other_information }}</span>
            @endif

        </div>
    </div>
</div>