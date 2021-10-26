<div class="cta_module alt">
    <div class="wrapper">
        <div class="left">
            @isset($title)
                <h2 class="page-heading maroon">{{ $title }}</h2>
            @endisset
        </div>
        <div class="right">
            @if ($text)
                <p class="text">{!! $text !!}</p>
            @endif
            @if ($btn)
                @php                    
                    $link_url = $btn['url'];
                    $link_title = $btn['title'];
                    $link_target = $btn['target'] ? $btn['target'] : '_self';
                @endphp
                <a href="{{ $link_url }}" class="btn gold"
                    target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
            @endif
        </div>
    </div>

</div>
</div>
