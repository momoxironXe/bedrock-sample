<div class="program-highlight ">
    @if ($bg_img)
        <div class="program-highlight__img-container">
            <img src="{{ $bg_img->url }}" alt="{{ $bg_img->alt }}" />
        </div>
    @endif
    <div class="program-highlight__content light">
        <div class="wrapper">
            @if ($title)
                <h2 class="page-heading">{!! $title !!}</h2>
            @endif
            <div class="main-content">
                <p class="copy">{!! $text !!}</p>
                @if ($program_bullet_lists)
                    <ul class="copy bold">
                        @foreach ($program_bullet_lists as $item)
                            @if ($item)
                                <li>{{ $item }}</li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @if ($link)
            @php
                $link_url = $link->url;
                $link_title = $link->title;
                $link_target = $link->target ? $link->target : '_self';
            @endphp
            <div class="button-block">
                <div class="wrapper">
                    <a href="{{ $link_url }}" class="btn maroon"
                        target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
                </div>
            </div>
        @endif

    </div>

</div>
