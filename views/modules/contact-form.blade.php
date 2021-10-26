    <div class="contact-form__module">
        <div class="contact-form__module-info light">
            <div class="wrapper">
                <div class="title-subtitle">
                    @if ($title)
                        <h2 class="page-heading">{{ $title }}</h2>
                    @endif
                    @if ($text)
                        <span class="label-heading">{!! $text !!}</span>
                    @endif
                </div>
                
                @if (count(@$navigation_items))
                    <ul class="contact__submenu level-one menu-listing">
                        @foreach ($navigation_items as $navigation_item)
                            <li>
                                @isset($navigation_item->navigation_title)
                                    <button>{!! $navigation_item->navigation_title !!}</button>
                                @endisset
                                @if ($navigation_item->navigation_sub_items)
                                    <ul class="contact__submenu level-two copy">
                                        @foreach ($navigation_item->navigation_sub_items as $sub_item)
                                            @if (@$sub_item->sub_item)
                                                @php
                                                $link=$sub_item->sub_item;
                                                    $link_url = $link->url;
                                                    $link_title = $link->title;
                                                    $link_target = $link->target ? $link->target : '_self';
                                                @endphp
                                                <li><a href="{{ $link_url }}"
                                                        target="{!! $link_target !!}">{!! $link_title !!}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        @isset($form_id)
        <div class="contact-form__module-form light">
            <div class="wrapper">
                <div class="gform_wrapper">
                    <a class="gform_anchor"></a>
                    @php
                        echo do_shortcode('[gravityform id="'.$form_id.'" title="false" description="false" ajax="true"]');
                    @endphp
                </div>
            </div>
        </div>
        @endisset        
    </div>
