<section id="ft-video">
    @php
        $bg_img=get_sub_field('background_image');
        $rand=str_random(12);
    @endphp
    @include('modules.ft-video',[
        'bg_img'=>@$bg_img['url'],
        'bg_alt'=>@$bg_img['title'],
        'title'=>get_sub_field('title'),
        'text'=>get_sub_field('text'),
        'modal_id'=>'ft-video-'.$rand,
        'yt_link'=>get_sub_field('video_link')
        ])
</section>