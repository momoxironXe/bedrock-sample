<div class="cta_module eagle">
    <div class="eagle-overlay">
        @include('modules.eagle')
    </div>
    <div class="wrapper">
        <div class="cta_module_text">
            @isset($title)
                <h2 class="page-heading maroon">{{ $title }}</h2>
            @endisset
            @if ($text)
                <p class="copy">{!! $text !!}</p>
            @endif
        </div>
        @if ($btn)
            @php 
            $btn = (array) $btn;               
                $link_url = $btn['url'];
                $link_title = $btn['title'];
                $link_target = $btn['target'] ? $btn['target'] : '_self';
            @endphp
            <div class="cta_module_btn">
                <a href="{{ $link_url }}" class="btn gold"
                    target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
            </div>
        @endif
    </div>
</div>
