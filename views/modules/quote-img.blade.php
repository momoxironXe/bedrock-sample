<div class="quote-img-block">
    @if ($bg_img)
    <div class="quote-img-block__img">
        <img src="{{$bg_img}}" alt="{{$bg_alt}}" />
    </div>        
    @endif
    <div class="wrapper">
        @if ($quote)
        <div class="quote-img-block__content">
            <p class="quote">“{{$quote}}”</p>
        </div>            
        @endif
        <div class="quote-img-block__author">
            @if ($author_img)
            <div class="quote-img-block__author__img">
                <img src="{{$author_img}}" alt="{{ $author_alt }}" />
            </div>
            @endif
            @if ($author_name)
            <div class="quote-block__author__info copy bold">
                <span>{{ $author_name }}</span>
                @if ($author_title)
                    <span>{{ $author_title }}</span>
                @endif
                @if ($author_other)
                    <span>{{ $author_other }}</span>
                @endif
            </div>
        @endif
        </div>
    </div>
</div>