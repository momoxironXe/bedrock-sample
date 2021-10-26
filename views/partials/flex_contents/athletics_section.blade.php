<section id="athletics">
    <div class="athletics__main">
        @if (get_sub_field('background_image'))
            <img class="bg-img" src="{{ get_sub_field('background_image') }}" alt="people at sports game">
        @endif
        <div class="wrapper">
            <div class="athletics__header light">
                @if (get_sub_field('heading'))
                    <h2 class="page-heading">{{ get_sub_field('heading') }}</h2>
                @endif
                @if (get_sub_field('sub_heading'))
                    <p class="copy-large">{{ get_sub_field('sub_heading') }} </p>
                @endif
                @if (have_rows('athletic_types'))
                    <div class="athletics__toggle">
                        @php
                            $count = 0;
                        @endphp
                        @while (have_rows('athletic_types')) @php the_row() @endphp
                            @php
                                $choose_category = get_sub_field('choose_category');
                            @endphp
                            <button
                                class="athletics__toggle__option {{ $choose_category->slug }} {{ $count == 0 ? 'active' : '' }}">{{ $choose_category->name }}</button>
                            @php
                                $count++;
                            @endphp
                        @endwhile
                    </div>
                @endif
            </div>
            @if (have_rows('athletic_types'))
                @php
                    $cnt = 0;
                @endphp
                @while (have_rows('athletic_types')) @php the_row() @endphp
                    @php
                        $choose_category = get_sub_field('choose_category');
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
                            <a class="btn gold"
                                href="{{ get_sub_field('explore_athletics_button') }}"><span>Explore
                                    Our Athletics</span></a>
                        </div>
                    @endif
                    @php
                        $cnt++;
                    @endphp
                @endwhile
            @endif
        </div>
    </div>
    <div class="athletics__side">
        @if (have_rows('athletic_types'))
            @php
                $cnt = 0;
            @endphp
            @while (have_rows('athletic_types')) @php the_row() @endphp
                @php
                    $choose_category = get_sub_field('choose_category');
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
                                <div class="{{ $game['slug'] }} {{ $count > 0 ? 'hidden' : '' }}">
                                    @foreach ($images as $image)
                                        <div class="img-container  {{ $count / 3 == 0 ? 'top' : '' }}">
                                            <img src="{{ esc_url($image['url']) }}" alt="{{ $image['alt'] }}">
                                        </div>
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
            @endwhile
        @endif
    </div>
</section>
