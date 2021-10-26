<main class="main contact-page" id="main">
    <section id="intro">
        @include('modules.banner',
        ['bg_img' =>@$banner_image->url,
        'bg_alt' =>@$banner_image->title,
        'btn_link' => @$back_to_landing_cta->url,
        'btn_text' => @$back_to_landing_cta->title,
        'title' =>@$banner_title?$banner_title : get_the_title(),
        'dark_overlay' => @$banner_is_dark_overlay
        ] )
    </section>
    @isset($enable_form_section)

        <section id="contact-form">
            @include('modules.contact-form',[
            'title' => @$form_title,
            'text' => @$form_description,
            'form_id' => $select_form,
            'navigation_items'=>@$navigation_items,
            'bg_img' => @$form_background_image,
            ])
        </section>
    @endisset
</main>
