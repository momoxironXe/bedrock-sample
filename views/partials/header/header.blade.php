<header class="header">

    <div class="mobile-nav">
        <div class="nav header__nav">
            <div class="header__container">
                <div class="logo header__nav__logo">
                    <a href="/">
                        @include('modules.logo')
                    </a>
                </div>

                <button class="menu__toggle">
                    <span class="hamburger" aria-label="Menu" data-micromodal-trigger="mobile-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <div class="mobile-menu-container" id="mobile-menu" aria-hidden="true">

                <div tabindex="-1" class="mobile-menu-inner-container">

                    <div role="dialog" aria-modal="true">

                        <header>
                            <div class="logo header__nav__logo">
                                <a href="/">
                                    @include('modules.logo')
                                </a>
                            </div>

                            <button class="menu__toggle__close">
                                <span class="hamburger" aria-label="Menu" data-micromodal-trigger="mobile-menu">
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>
                        </header>

                        <div class="menu__content phone">
                            @include('partials.header.mobile-primary-nav')                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        @include('partials.header.desktop-primary-nav')
    </div>

</header>
