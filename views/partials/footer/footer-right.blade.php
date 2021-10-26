<div class="wrapper">
    <div class="footer__links">
        @isset($menu_sections)
            @foreach ($menu_sections as $menu_section)
                <div class="footer__links__resources">
                    @isset($menu_section['section_title'])
                        <p class="label-heading maroon">{{ $menu_section['section_title'] }}</p>
                    @endisset
                    @isset($menu_section['choose_menu'])
                        @php
                            $menu_id = $menu_section['choose_menu'];
                            wp_nav_menu([
                                'menu' => $menu_id,
                                'container' => '',
                                'add_li_class'  => 'footer-link'
                            ]);
                        @endphp
                    @endisset
                </div>
            @endforeach
        @endisset
        <div class="footer__last-row">
            <div class="footer__links__social">
                @isset($connect_section_title)
                <p class="label-heading maroon">{{$connect_section_title}}</p>                    
                @endisset
                @if($social_links)
                <ul>
                    @foreach ($social_links as $social_link)
                    @isset($social_link['link'])
                    <li><a href="{{$social_link['link']}}"><i class="fa fa-{{$social_link['choose_platform']}}"></i></a></li>           
                    @endisset                     
                    @endforeach
                </ul>
                @endif
              </div>
            <div class="footer__links__misc">
                <ul>
                    @if ($privacy_policy)
                    <li class="footer-link"><a href="{{$privacy_policy}}">Privacy Policy</a></li>                        
                    @endif
                    @if ($site_map)
                    <li class="footer-link"><a href="{{$site_map}}">Privacy Policy</a></li>                        
                    @endif                    
                </ul>
            </div>
        </div>
    </div>
</div>
