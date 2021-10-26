<div class="cntnt-p-img {{ isset($light_bg)?'light-bg':''}} {{isset($gold_bg)?'gold-bg':""}} {{isset($buttons)?'with-buttons':''}} {{ isset($flipped)?'alt':''}}">
    <img class="bg-img" src="{{$bg_img}}" alt="{{$bg_alt}}" />
    <div class="cntnt-p-img__content light">
        <div class="wrapper">
            <h2 class="page-heading">{{$title}}</h2>
            @if(@$text_2)
                <div>
                    @endif
                    @if($text)
                        <span class="copy">{!! $text !!}</span>
                    @endif

                    @if(@$text_2)
                        <span class="copy">{!! $text_2 !!}</span>
                    @endif

                    @if(@$text_2)
                </div>
            @endif
            @if(isset($bullet_1_text))
                <div class="list">
                    <ul class="no-bullets arrow-bullets copy bold{{$bullet_11_text?'six-rows':''}} ">
                        <li><a href="{{$bullet_1_link}}">{{$bullet_1_text}}</a></li>
                    </ul>
                </div>
            @endif
        </div>
        @if($buttons)
            <div class="button-block">
                <div class="wrapper">
                    @isset($btn_1_text)
                        <a href="{{$btn_1_link}}"
                           class="btn {{$gold_bg?'maroon':'gold'}}"><span>{{$btn_1_text}}</span></a>
                    @endisset
                    @isset($btn_2_text)
                    <a href="{{$btn_2_link}}" class="btn ghost"><span>{{$btn_2_text}}</span></a>                        
                    @endisset
       
                </div>
            </div>
        @endif
    </div>

</div>