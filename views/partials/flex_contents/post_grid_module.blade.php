<div class="grid">
    <div class="wrapper">
        <h2 class="page-heading light">{{ get_sub_field('title') }}</h2>
    </div>
    @php
        $items = get_sub_field('items');
    @endphp

    @isset($items)
        <div class="grid__content light">
            <div class="wrapper">

                @foreach ($items as $key => $item)
                    @php
                        $post_id = $item->ID;
                        $img_url = get_the_post_thumbnail_url($post_id, 'full');
                        $the_content = apply_filters('the_content', $item->post_content);
                    @endphp
                    @include('modules.grid',[
                    'title'=>get_the_title($post_id),
                    'text'=> wp_trim_words($the_content, 20),
                    'link'=> get_the_permalink($post_id),
                    'img_url'=>$img_url,
                    'img_alt'=>get_the_title($post_id),
                    ])
                @endforeach
            </div>
        </div>
    @endisset
</div>
