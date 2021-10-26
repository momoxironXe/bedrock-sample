<section id="about-abilene">
    <div class="abt-abilene-bg">
        @if (get_sub_field('background_image'))
        @php
            $image=get_sub_field('background_image');
        @endphp
        <img class="bg-img" src="{{esc_url(@$image['url'])}}" alt="{{@$image['alt']}}" />
        @endif
        <div class="abt-abilene-bg__content">
            <div class="wrapper">
                @if (get_sub_field('headline'))
                    <h2 class="page-heading light"> {{the_sub_field('headline')}}</h2>
                @endif
                @if (get_sub_field('description'))
                    <span class="copy light">
                        {{the_sub_field('description')}}
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>
