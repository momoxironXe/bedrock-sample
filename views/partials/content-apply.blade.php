<main class="main how-to-apply" id="main">
    <section id="intro">
        @include('modules.banner',
        ['bg_img' =>@$banner_image->url,
        'bg_alt' =>@$banner_image->title,
        'btn_link' => @$banner_back_button_link->url,
        'btn_text' => @$banner_back_button_link->title,
        'title' =>get_the_title(),
        'dark_overlay' => $banner_is_dark_overlay
        ] )
    </section>
    @if ($enable_main_link)
        <section id="intro">
            @include('modules.ft-links',[
            'all_main_links'=>$all_main_links,
            'is_bigger'=>$is_bigger_block
            ])
        </section>
    @endif
    @if ($enable_how_to_apply)
        <section id="select-role">
            @include('modules.how-to-apply')
        </section>
    @endif
    @if ($enable_evaluation)
        <section id="evaluations">
            @include('modules/content-bg-img',[
            'title'=>$evaluation_title,
            'evaluation_text'=>$evaluation_text,
            'asterisk'=>$evaluation_asterisk
            ])
        </section>
    @endif
    @if ($enable_program)
        <section id="honors-program">
            @include('modules/program-highlight',[
            'title'=>$program_text,
            'text'=>$evaluation_text,
            'link'=>$program_cta,
            'program_bullet_lists'=>$program_bullet_lists,
            'bg_img'=>$program_background_photo
            ]);
        </section>
    @endif
    @if ($enable_apply_cta)
        <section id="apply-today">
            @include('modules/cta-eagle',[
            'title'=>$apply_title,
            'text'=>$apply_text,
            'btn'=>$apply_cta_button,
            ])
        </section>
    @endif
    @if ($enable_form_section)
        <section id="form">
            @include('modules.form',
            [
            'title'=>$form_title,
            'text'=>$form_text,
            'form'=>$form,
            'bg_img'=>$form_background_image
            ])
        </section>
    @endif
</main>
