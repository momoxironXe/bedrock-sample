<main class="main find-major" id="main">
    <section id="intro">
        @include('modules.banner',
        ['bg_img' =>@$banner_image->url,
        'bg_alt' =>@$banner_image->title,
        'btn_link' => @$back_to_landing_cta->url,
        'btn_text' => @$back_to_landing_cta->title,
        'title' =>get_the_title(),
        'dark_overlay' => @$banner_is_dark_overlay
        ] )
    </section>
    <form class="filter-programs">
        <section id="type-of-program">
            @include('modules.filter-search')
        </section>
        </section>
        <section id="choose-letter">
            @include('modules.alphabet')
        </section>
    </form>
    <section id="programs">
        {{-- <pre> --}}
        @php
            $all_programs = TemplateFindYourMajor::getAllPrograms();
            $page_id = get_the_ID();
            $programs=[];
       
       
       $programs[array_key_first($all_programs)]=$all_programs[array_key_first($all_programs)];
// var_dump($all_programs);
        @endphp
{{-- </pre> --}}
        @include('modules.major-programs',[
        'all_programs'=>$programs,
        'page_id'=>$page_id,
        ]
        )

    </section>
</main>
