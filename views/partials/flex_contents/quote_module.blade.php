<section id="quote">
    @php
        $author_img = get_sub_field('individual_photo');
        $main_photo = get_sub_field('main_photo');
        $set_bg = get_sub_field('set_main_image_background');
        $args = [
            'bg_img' => $main_photo['url'],
            'bg_alt' => $main_photo['alt'],
            'quote' => get_sub_field('quote'),
            'author_img' => $author_img['url'],
            'author_alt' => $author_img['alt'],
            'author_name' => get_sub_field('name'),
            'author_title' => get_sub_field('info'),
            'author_other' => get_sub_field('other_info'),
        ];
    @endphp
    @if ($set_bg)
        @include('modules/quote', $args)

    @else
    @include('modules/quote-img', $args)

    @endif
</section>
