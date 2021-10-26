<div class="photo-gallery {{ $id }}" data-module="photo-gallery-slider">

    <div class="carousel-wrapper">
        <div class="thumbs-outer wrapper">
            <div class="thumbs-wrapper">
                @if ($title)
                    <div class="header">
                        <h2 class="page-heading light">{{ $title }}</h2>
                    </div>
                @endif
                @if ($add_gallery && count($add_gallery))
                    <div class="photo-gallery__thumb__grid">
                        @php
                            $gallery_images = array_chunk($add_gallery, 9);
                            $count = 0;
                        @endphp
                        @foreach ($gallery_images as $gallery_ids)
                            @if (count($gallery_ids))
                                <div class="photo-gallery__thumb__page {{ $count > 0 ? 'hidden' : '' }}">
                                    @foreach ($gallery_ids as $gallery_id)
                                        @php
                                            $img_url = get_the_post_thumbnail_url($gallery_id, 'full');
                                        @endphp
                                        @if ($img_url)
                                            <button class="photo-gallery__thumb {{ $count == 0 ? 'active' : '' }} ">
                                                <div class="photo">
                                                    <img src="{{ $img_url }}"
                                                        alt="{{ get_the_title($gallery_id) }}" />
                                                </div>
                                            </button>
                                        @endif
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                </div>
                            @endif

                        @endforeach
                        @php
                            $count = 0;
                        @endphp
                        <div class="photo-gallery__thumb__pagination">
                            @foreach ($gallery_images as $gallery_ids)
                                <span
                                    class="bullet page-{{ $count }} {{ $count == 0 ? 'bullet-active' : '' }}"></span>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if ($add_gallery && count($add_gallery))
            <div class="main-wrapper">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($add_gallery as $gallery_id)
                            <div class="swiper-slide">
                                @php
                                    $img_url = get_the_post_thumbnail_url($gallery_id, 'full');
                                    $content = apply_filters('the_content', get_post_field('post_content', $gallery_id));
                                @endphp
                                @if ($img_url)
                                    <div class="photo">
                                        <img src="{{ $img_url }}" alt="{{ get_the_title($gallery_id) }}" />
                                        <img src="{{ $img_url }}" alt="{{ get_the_title($gallery_id) }}"
                                            class="bg-img" />
                                    </div>
                                @endif
                                @if ($content)
                                    <div class="caption-container">
                                        <span class="copy">{!! $content !!}</span>

                                    </div>
                                @endif

                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-controls">
                        <button class="image-swiper-button-prev swiper-button-prev mobile">
                            @include('modules.arrow-icon') </button>
                        <div class="tablet-desktop">
                            <button class="image-swiper-button-prev swiper-button-prev"> @include('modules.arrow-icon')
                            </button>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-pagination mobile"></div>
                        <button class="image-swiper-button-next swiper-button-next">
                            @include('modules.arrow-icon')</button>

                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
