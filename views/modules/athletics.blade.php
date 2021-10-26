<div class="athletics__main">
    @isset($bg_img)
        <img class="bg-img" src="{{ $bg_img }}" alt="{{ @$bg_img }}">
    @endisset
    <div class="wrapper">
        <div class="athletics__header light">
            @isset($athletics_heading)
                <h2 class="page-heading">{{ $athletics_heading }}</h2>
            @endisset
            @isset($sub_heading)
                <p class="copy-large">{{ $sub_heading }} </p>
            @endisset
            @isset($athletic_types)
                <div class="athletics__toggle">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($athletic_types as $athletic_type)
                        {{-- @dd($athletic_type->choose_category) --}}
                        @php
                            $choose_category = @$athletic_type->choose_category;
                        @endphp
                        <button
                            class="athletics__toggle__option {{ $choose_category->slug }} {{ $count == 0 ? 'active' : '' }}">{{ $choose_category->name }}</button>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </div>
            @endisset
        </div>
        @isset($athletic_types)
            @php
                $cnt = 0;
            @endphp
            @foreach ($athletic_types as $athletic_type)
                @php
                    $choose_category = @$athletic_type->choose_category;
                    $games = TemplateLife::getGamesByTerm($choose_category->term_id);
                @endphp
                @if ($games && count($games))
                    @php
                        $count = 0;
                    @endphp
                    <div class="athletics__content {{ $choose_category->slug }} {{ $cnt > 0 ? 'hidden' : '' }}">
                        <ul class=" sm-heading no-bullets">
                            @foreach ($games as $key => $game)
                                <li class="{{ $game['slug'] }} {{ $count == 0 ? 'active' : '' }}"><a
                                        href="#">{{ $game['name'] }}</a></li>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </ul>
                        @isset($athletic_type->explore_athletics_button)
                            <a class="btn gold" href="{{ $athletic_type->explore_athletics_button }}"><span>Explore
                                    Our Athletics</span></a>
                        @endisset
                    </div>
                @endif
                @php
                    $cnt++;
                @endphp
            @endforeach
        @endisset
    </div>
</div>
<div class="athletics__side">
    @isset($athletic_types)
        @php
            $cnt = 0;
        @endphp
        @foreach ($athletic_types as $athletic_type)
            @php
                $choose_category = @$athletic_type->choose_category;
                $games = TemplateLife::getGamesByTerm($choose_category->term_id);
            @endphp
            @if ($games && count($games))
                @php
                    $count = 0;
                @endphp
                <div class="{{ $choose_category->slug }}__photos {{ $cnt > 0 ? 'hidden' : '' }}">
                    @foreach ($games as $key => $game)
                        @php
                            $images = get_field('image_gallery', $key);
                        @endphp
                        @if ($images)
                            @php
                                $img_cnt = 0;
                            @endphp
                            <div class="{{ $game['slug'] }} {{ $count > 0 ? 'hidden' : '' }}">
                                @foreach ($images as $image)
                                    @if ($img_cnt < 3)
                                        <div class="img-container  {{ $count / 3 == 0 ? 'top' : '' }}">
                                            <img src="{{ esc_url($image['url']) }}" alt="{{ $image['alt'] }}">
                                        </div>
                                    @endif
                                    @php
                                        $img_cnt++;
                                    @endphp
                                @endforeach
                            </div>
                        @endif
                        @php
                            $count++;
                        @endphp
                    @endforeach
                </div>
            @endif
            @php
                $cnt++;
            @endphp
        @endforeach
    @endisset
</div>
