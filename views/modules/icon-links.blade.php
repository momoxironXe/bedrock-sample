<div class="icon-links__module">
    @if ($bg_img)
        <div class="icon-links__module__bg">
            <img src="{{ $bg_img }}" alt="{{ $bg_alt }}" />
        </div>
    @endif
    @if ($all_icon_links)
        <div class="icon-links__module__content">
            <div class="wrapper">
                <div class="icon-links__module__grid">
                    @foreach ($all_icon_links as $icon_link)
                        @include('modules/loop/icon-link',$icon_link)
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
