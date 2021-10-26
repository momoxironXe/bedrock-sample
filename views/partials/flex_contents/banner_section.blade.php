@php
$dark_overlay = get_sub_field('enable_dark_overlay');
$image = get_sub_field('photo');
$top_btn = get_sub_field('back_to_landing_cta');

@endphp
<section id="intro">
    <div class="banner">
        <div class="banner__bg-img @if ($dark_overlay) dark-overlay @endif">
            @if ($image)
                <img src="{{ esc_url($image)}}" alt="" />
            @endif
        </div>
        <div class="banner__content">
            @if ($top_btn)
                @php
                    $link_url = $top_btn['url'];
                    $link_title = $top_btn['title'];
                    $link_target = $top_btn['target'] ? $top_btn['target'] : '_self';
                @endphp
                <div class="top-button">
                    <div class="wrapper">
                        <a class="btn ghost small arrow" href="{{ esc_url($link_url) }}"
                            target="{{ esc_attr($link_target) }}"><span>{{ esc_html($link_title) }}</span></a>
                    </div>
                </div>
            @endif

            <div class="wrapper">
                <h1 class="title light">{{ get_the_title() }}</h1>
            </div>

        </div>
        @if (get_sub_field('bottom_button'))
            @php
                
                $bottom_button = get_sub_field('bottom_button');
            @endphp
            @php
                $blink_url = $bottom_button['url'];
                $blink_title = $bottom_button['title'];
                $blink_target = $bottom_button['target'] ? $bottom_button['target'] : '_self';
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
