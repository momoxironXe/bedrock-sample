<section id="photo-gallery">
    @php
        $rand=str_random(12);
    @endphp
    @include('modules/photo-gallery',[
        'title'=>get_sub_field('title'),
        'add_gallery'=>get_sub_field('add_gallery'),
        'id'=>$rand
    ])
</section>