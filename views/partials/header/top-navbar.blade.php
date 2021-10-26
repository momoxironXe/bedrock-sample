<div class="nav header__topnav">
    <div class="header__container">
        <nav>
            <div class="header__topnav__left">
                <span>For:</span>
                @isset($headerTop['header_top_left_menu'])
                    @php
                        $menu_id = $headerTop['header_top_left_menu'];
				                        wp_nav_menu([
                            'menu' => $menu_id,
                            'container' => '',
                            'add_li_class' => ' ',
                        ]);
                    @endphp
                @endisset
            </div>
            <div class="header__topnav__right">
                @isset($headerTop['header_top_right_menu'])
                    @php
                        $menu_id = $headerTop['header_top_right_menu'];
                        wp_nav_menu([
                            'menu' => $menu_id,
                            'container' => '',
                            'add_li_class' => ' ',
                        ]);
                    @endphp
                @endisset
                {{-- <ul>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">MyMCM Login</a></li>
                    <li><a href="#">Interactive Map</a></li>
                    <li><a href="#">Library</a></li>
                    <li><a href="#">Give</a></li>
                    <li>
                        <a href="#">
                            <div class="search-icon">
                                @include('modules.search-icon')
                            </div>
                        </a>
                    </li>
                </ul> --}}

            </div>
        </nav>
    </div>
</div>
