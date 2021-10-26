<section id="form">
    @include('modules.form',
    [
    'title'=>get_sub_field('title'),
    'text'=>get_sub_field('text'),
    'bg_img'=>get_sub_field('form_background_image'),
    'form_id'=>get_sub_field('select_form')
    ]
    )
</section>
