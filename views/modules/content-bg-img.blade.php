<div class="cntnt-bg-img">

    <div class="cntnt-bg-img__content light">
        @if (@$bg_img['url'])
            <img class="bg-img" src="{{ $bg_img }}" alt="{{ $bg_alt }}" />
        @endif
        <div class="wrapper">
            @if ($title)
                <h2 class="page-heading">{{ $title }}</h2>
            @endif
            @if ($text)
                <span class="copy-large">{!! $text !!}</span>
            @endif
        </div>
        @if ($asterisk)
            <span class="asterisk copy">{{ $asterisk }}
            </span>
        @endif

    </div>

</div>
