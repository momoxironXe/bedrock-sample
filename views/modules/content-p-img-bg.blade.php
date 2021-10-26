<div class="cntnt-p-img-bg">
    @if (@$bg_img->url)
        <img class="bg-img" src="{{ $bg_img->url }}" alt="{{ $bg_img->title }}" />
    @endif

    <div class="cntnt-p-img-bg__content">
        <div class="wrapper">
            @if ($title)
                <h2 class="page-heading maroon">{!! $title !!}</h2>
            @endif
            <div>
                @if ($text)
                    <p class="copy"> {!! $text !!}</p>
                @endif
            </div>
        </div>
        @isset($cta_btn)
            <div class="button-block">
                <div class="wrapper">
                    @php
                        $link_url = $cta_btn->url;
                        $link_title = $cta_btn->title;
                        $link_target = @$link->target ? $link->target : '_self';
                    @endphp
                    <a class="btn maroon" href="{{ esc_url($link_url) }}"
                        target="{{ esc_attr($link_target) }}"><span>{{ esc_html($link_title) }}</span></a>
                </div>
            </div>
        @endisset

    </div>
</div>
