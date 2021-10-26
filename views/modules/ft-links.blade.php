@if (count($all_main_links))
    <div class="ft-links">
        <div class="ft-links__row">
            @foreach ($all_main_links as $main_links)
                <div
                    class="ft-links__indiv overlay-{{ @$main_links->background_color }} <?= $is_bigger ? 'with-copy' : '' ?> light">
                    @php
                        $bg_image = @$main_links->background_photo;
                    @endphp
                    @if ($bg_image)          
                    <img src="{{ $bg_image->url }}" alt="{{ $bg_image->alt }}" />
                    @endif
                    <div class="wrapper">
                        @if ($main_links->title)
                            <h3 class="label-heading">{{ $main_links->title }}</h3>
                        @endif
                        @if ($main_links->text)
                            <p class="copy">{!! $main_links->text !!}</p>
                        @endif
                    </div>
                    @if ($main_links->cta)
                        @php
                            $link = $main_links->cta;
                        @endphp
                        <div class="button">
                            <div class="wrapper">
                                @php
                                    $link_url = $link->url;
                                    $link_title = $link->title;
                                    $link_target = $link->target ? $link->target : '_self';
                                @endphp
                                <a href="{{ $link_url }}" class="btn ghost {{$main_links->background_color=='white'?'on-white':''}}"
                                    target="{{ $link_target }}"><span>{{ $link_title }}</span></a>
                            </div>
                        </div>
                    @endif

                </div>
            @endforeach

        </div>
    </div>
@endif
