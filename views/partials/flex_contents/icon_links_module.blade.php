<section id="icon-links">
    @php
        $background_image=get_sub_field('background_photo');
    @endphp
    @include('modules/icon-links',[
    'bg_img'=>$background_image['url'],
    'bg_alt'=>$background_image['alt'],
    'all_icon_links'=>get_sub_field('all_icon_links'),
    ])

</section>
