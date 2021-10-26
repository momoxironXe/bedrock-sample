<section id="headshots">
    @include('modules/headshots',[
    'title'=>get_sub_field('title'),
    'center'=>get_sub_field('set_tile_center'),
    'text'=>get_sub_field('text'),
    'staff_members'=>get_sub_field('all_staff_members'),
    ])
</section>
