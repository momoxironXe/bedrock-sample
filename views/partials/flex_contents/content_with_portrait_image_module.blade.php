@php
$bg_type = get_sub_field('background_type');
$cls = '';
$bg_cls = '';
@endphp

@if (get_sub_field('main_cta') || get_sub_field('secondary_cta'))
    @php
        $cls = 'with-buttons';
    @endphp
@endif
@if ($bg_type == 'Light')
    @php
        $cls .= ' light-bg';
    @endphp
@elseif ($bg_type=='Solid')
    @php
        $cls = '';
    @endphp
@elseif ($bg_type=='Image')
    @php
        $bg_cls = '-bg';
    @endphp
@else

@endif
@php
$bg_img = get_sub_field('photo');
$title = get_sub_field('title');
$text = get_sub_field('text');
@endphp
@if ($bg_type == 'Full photo')
    @include('modules.content-bg-img',[
    'bg_img'=>$bg_img,
    'bg_alt'=>$title,
    'title'=>$title,
    'text'=>$text,
    'yt_link'=>get_sub_field('video_link'),
    'asterisk'=>get_sub_field('asterisk')
    ])
@else
<div class="cntnt-p-img{{ $bg_cls }} {{ $cls }}">
    @if ( @$bg_img['url'])
        <img class="bg-img" src="{{ $bg_img }}" alt="{{ @$bg_alt }}" />
    @endif

    <div class="cntnt-p-img{{ $bg_cls }}__content {{ $bg_type != 'Image' ? 'light' : '' }}">
        <div class="wrapper">
            @if ($title)
                <h2 class="page-heading {{ $bg_cls ? 'maroon' : '' }}">{!! $title !!}</h2>
            @endif
            <div>
                @if ($text)
                    <p class="copy"> {!! $text !!}</p>
                @endif
            </div>
        </div>

        <div class="button-block">
            <div class="wrapper">
                @if (get_sub_field('main_cta'))
                    @php
                        $link = get_sub_field('main_cta');
                    @endphp
                    @php
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = @$link['target '] ? $link['target'] : '_self';
                    @endphp
                    <a class="btn {{ $bg_cls ? 'maroon' : 'gold' }}" href="{{ esc_url($link_url) }}"
                        target="{{ esc_attr($link_target) }}"><span>{{ esc_html($link_title) }}</span></a>
                @endif
                @if (get_sub_field('secondary_cta'))
                    @php
                        $link = get_sub_field('secondary_cta');
                    @endphp
                    @php
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = @$link['target'] ? $link['target'] : '_self';
                    @endphp
                    <a class="btn {{ $bg_cls ? 'maroon' : 'gold' }}" href="{{ esc_url($link_url) }}"
                        target="{{ esc_attr($link_target) }}"><span>{{ esc_html($link_title) }}</span></a>
                @endif
            </div>
        </div>
    </div>
</div>

@endif
