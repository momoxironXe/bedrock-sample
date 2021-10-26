<section id="tile-links">
    @php
    $bg_image=get_sub_field('background_image');
        $args = [
            'title' => get_sub_field('title'),
            'eagle' => get_sub_field('is_eagle'),
            'bg_img' => $bg_image['url'],
            'bg_alt' => @$bg_image['alt'],
            'all_tiles' => get_sub_field('all_tiles'),
        ];
    @endphp
    @include('modules.tile-links',$args)
</section>
