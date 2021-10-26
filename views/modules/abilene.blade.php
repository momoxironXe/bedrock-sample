<div class="abt-abilene-bg">
    @isset($bg_img)
        <img class="bg-img" src="{{ $bg_img }}" alt="{{ $bg_alt }}" />
    @endisset
    <div class="abt-abilene-bg__content">
        <div class="wrapper">
            @isset($title)
                <h2 class="page-heading light">{{ $title }}</h2>
            @endisset
            @isset($text)
                <p class="copy light">{!! $text !!}</p>
            @endisset

        </div>
    </div>

</div>
