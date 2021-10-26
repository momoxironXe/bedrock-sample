@isset($static_link['title'])
@if ($is_solid_button)
<a href="{{ @$static_link['url'] }}" class="btn gold"
    target="{{ @$static_link['target'] }}"><span>{{ @$static_link['title'] }}</span></a>
@else
<a href="{{ @$static_link['url'] }}" class="btn ghost on-white"
    target="{{ @$static_link['target'] }}"><span>{{ @$static_link['title'] }}</span></a>
@endif 
@endisset

