<section id="cta">
    @php
        $args = [
            'title' => get_sub_field('title'),
            'text' => get_sub_field('text'),
            'btn' => get_sub_field('cta'),
        ];
    @endphp
    @if (get_sub_field('button_style') == 'eangle')
        @include('modules.cta-eagle',$args)
    @elseif (get_sub_field('button_style')=='normal')
        @include('modules.alt',$args)
    @else
        @include('modules.cta',$args)
    @endif

</section>
