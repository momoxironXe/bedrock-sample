@if ($link)
    <a href="{{ $link['link'] }}" target="{{ $link['target'] }}">
        <div class="icon-indiv">
            @if ($icon)
                <div class="icon-indiv-img">
                    <img src="{{ $icon['url'] }}" alt="{{ $icon['alt'] }}" />
                </div>
            @endif

            <span class="icon-title">{{ $link['title'] }}</span>
        </div>
    </a>
@endif
