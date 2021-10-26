<div class="banner">
    <div class="banner__bg-img @if ($dark_overlay) dark-overlay @endif">
        <img src="{{$bg_img}}" alt="{{$bg_alt}}" />
    </div>
    <div class="banner__content">
        @if($btn_text)
        <div class="top-button">
            <div class="wrapper">
                <a href="{{$btn_link}}" class="btn ghost small arrow"><span>{{$btn_text}}</span></a>

            </div>
        </div>
        @endif

        <div class="wrapper">
            <h1 class="title light">{!! $title !!}</h1>

        </div>

    </div>
    @if(@$bottom_btn)
    <div class="bottom-button">
        <div class="wrapper">
            <a href="#" class="btn gold"><span>{{$bottom_btn}}</span></a>

        </div>
    </div>
    @endif
</div>