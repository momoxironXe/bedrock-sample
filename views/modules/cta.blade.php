<div class="cta_module{{ @$btn_2 ? 'two-btn' : '' }}">
    <div class="wrapper">
        <div class="cta_module_title">
            <h2 class="page-heading maroon">{{ $title }}</h2>
        </div>
        <div class="cta_module_text">
            @if ($text)
                <p class="text">{!! $text !!}</p>
            @endif
            @if ($btn)
                @php
                    
                    $link_url = $btn['url'];
                    $link_title = $btn['title'];
                    $link_target = $btn['target'] ? $btn['target'] : '_self';
                @endphp
                <div class="cta_module_btn">
                    <a href="{{ $link_url }}" class="btn gold"
                        target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
                </div>
            @endif
            @isset($btn_2)
                @php
                    $link_url = $btn['url'];
                    $link_title = $btn['title'];
                    $link_target = $btn['target'] ? $btn['target'] : '_self';
                @endphp
                <div class="cta_module_btn">
                    <a href="{{ $link_url }}" class="btn ghost on-white"
                        target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
                </div>
            @endisset
        </div>
    </div>
</div>
