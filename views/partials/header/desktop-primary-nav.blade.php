@php
$headerTop = App::headerTop();
@endphp
@include('partials.header.top-navbar',$headerTop)

<div class="nav header__nav">
<div class="header__container">
    <div class="logo header__nav__logo">
        <a href="#">
            @include('modules.logo')
        </a>
    </div>
  @php
      $mega_menus=App::getMegaMenu('mega_menus')
  @endphp
    @if (isset($mega_menus['mega_menus'])&&count($mega_menus['mega_menus']) > 0)
    @php
        $all_memu_items=$mega_menus['mega_menus'];
    @endphp
        <nav>
            <ul>
                @foreach ($all_memu_items as $post_id)
                  @php
                        $menu_items = App::getMegaItem($post_id);
                    @endphp
                    @isset($menu_items['parent_link'])
                        @php
                            $parent_link = $menu_items['parent_link'];
                            $all_columns = $menu_items['all_columns'];
                        @endphp
                        <li class="{{ $all_columns ? 'header__nav__mega' : '' }}">
                            <a href="{{ $parent_link['url'] }}" target="{{ $parent_link['target'] }}"
                                class="dropdown-link">{!! $parent_link['title'] !!}</a>
                            @if ($all_columns)
                                <div class="header__nav__mega-content">
                                    <div class="mega-content-container">
                                        @foreach ($all_columns as $key => $column)
                                            @if ($column['mega_menu_columns'])
                                                <div class="mega-menu-col">
                                                    <ul>
                                                        @foreach ($column['mega_menu_columns'] as $k => $mega_menu_columns)
                                                            @php
                                                                $block_type = $mega_menu_columns['block_type'];
                                                            @endphp
                                                            @include('partials.header.'.$block_type,$mega_menu_columns)

                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </li>
                    @endisset
                @endforeach
            </ul>
        </nav>
    @endif
</div>
</div>