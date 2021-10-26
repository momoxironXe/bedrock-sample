<section id="intro">
    <div class="banner">
        <div class="banner__bg-img @if (isset($flex_content->dark_overlay)) dark-overlay @endif">
            @if ($flex_content->banner_image)
                <img src="{{ esc_url($flex_content->banner_image) }}" alt="{{ get_the_title() }}" />
            @endif
        </div>
        <div class="banner__content">
            @if (isset($flex_content->top_button))
                @php
                    $top_btn = $flex_content->top_button;
                    $link_url = $top_btn->url;
                    $link_title = $top_btn->title;
                    $link_target = $top_btn->target ? $top_btn->target : '_self';
                @endphp
                <div class="top-button">
                    <div class="wrapper">
                        <a class="btn ghost small arrow" href="{{ esc_url($link_url) }}"
                            target="{{ esc_attr($link_target) }}"><span>{{ esc_html($link_title) }}</span></a>
                    </div>
                </div>
            @endif
            @if (!is_front_page()):
                <div class="wrapper">
                    <h1 class="title light">{{ get_the_title() }}</h1>
                </div>
            @endif;
        </div>
        @if (isset($flex_content->bottom_button))
            @php
                $bottom_button = $flex_content->bottom_button;
                $blink_url = $bottom_button->url;
                $blink_title = $bottom_button->title;
                $blink_target = $bottom_button->target ? $bottom_button->target : '_self';
            @endphp
            <div class="bottom-button">
                <div class="wrapper">
                    <a class="btn gold" href="{{ esc_url($blink_url) }}"
                        target="{{ esc_attr($blink_target) }}"><span>{{ esc_html($blink_title) }}</span></a>
                </div>
            </div>
        @endif
    </div>
</section>
