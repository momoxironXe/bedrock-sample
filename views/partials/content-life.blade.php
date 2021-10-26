@php
    global $post;
    $post_slug = $post->post_name;
@endphp
<main class="main life-at-mcmurry" id="main">
    <section id="intro">
        @include('modules.banner',
        ['bg_img' =>@$banner_image->url,
        'bg_alt' =>@$banner_image->title,
        'btn_link' => @$banner_back_button_link->url,
        'btn_text' => @$banner_back_button_link->title,
        'title' =>get_the_title(),
        'dark_overlay' => $banner_is_dark_overlay
        ]
        )
    </section>
    <section id="about-campus">
        @include('modules.about-campus',$about_campus_slider
        )
    </section>
    <section id="ft-video">
        @include('modules.ft-video',[
        'bg_img'=>@$background_image->url,
        'bg_alt'=>@$background_image->title,
        'title'=>$video_title,
        'text'=>$video_text,
        'modal_id'=>'ft-video-4',
        'yt_link'=>$video_link
        ]
        )

    </section>
    <section id="religious-spiritual">
        @include('modules.content-portrait-img',[
        'light-bg'=>$spiritual_light_bg,
        'bg_img'=>$spiritual_background_image->url,
        'bg_alt'=>$spiritual_background_image->title,
        'title'=>$spiritual_title,
        'text'=>$spiritual_text,
        'text_2'=>'',
        'buttons'=>false
        ]
        )
    </section>
    <section id="athletics">
        @include('modules.athletics',[
        'bg_img'=>$athletics_background_image->url,
        'bg_alt'=>$athletics_background_image->title,
        'title'=>$athletics_heading,
        'text'=>$athletics_sub_heading,
        'athletic_types'=>$athletic_types
        ]
        )
    </section>
    <section id="student-org">
        @include('modules.student-org',$all_student_activates
        )
    </section>
    <section id="about-abilene">
        @include('modules.abilene',[
        'bg_img'=>$abilene_background_image->url,
        'bg_alt'=>$abilene_background_image->title,
        'title'=>$abilene_heading,
        'text'=>$abilene_description,
        ]
        )
    </section>
</main>