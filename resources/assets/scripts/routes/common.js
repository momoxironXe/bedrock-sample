import Swiper, { Navigation, Pagination } from "swiper";
import MicroModal from "micromodal";

export default {
  init() {
    MicroModal.init();
    // menu
    // check if desktop nav is hidden
    let desktopNavVisible = () => {
      if ( $( ".desktop-nav" ).is( ":visible" ) ) {
        // first clear out any mobile menu things
        let menuContainer = $( ".mobile-menu-container" );
       
        $( ".dropdown-link" ).removeClass( "toggled" );
        $( ".dropdown-link" ).removeClass( "focused" );
       
        menuContainer.removeClass( "is-open" );
        $( ".mobile-nav" ).removeClass( "menu-visible" );

        // Megamenu - show submenu on hover
        const menuItem = document.querySelectorAll( ".header__nav__mega" );

        const accessibleHover = e => {
          if ( e.keyCode === 13 ) {
            if ( e.target.classList.contains( "dropdown-link" ) ) {
              e.target.classList.add( "focused" );
            }
          }
          else if ( e.shiftKey && e.keyCode === 9 ) {
            if ( e.target.classList.contains( "dropdown-link" ) ) {
              e.target.classList.remove( "focused" );
            }
          }
        };

        const closeDropdown = e => {
          // close dropdown if tabbing to prev parent link, or next parent link
          // keep open if tabbing backwards within megamenu dropdown
          const linkType = document.getElementsByClassName( "submenu-link" );
          for ( let i = 0; i < linkType.length; ++i ) {
            linkType[i].addEventListener( "focusout", e => {
              if ( e.relatedTarget ) {
                if ( !e.relatedTarget.classList.contains( "submenu-link" ) &&
                ( !e.relatedTarget.classList.contains( "btn" ) ) ) {
                  const megaContent = e.target.closest( ".header__nav__mega-content" );
                  const parentLink = megaContent.previousElementSibling;
                  parentLink.classList.remove( "focused" );
                }
              }
            } );
          }
        };

        menuItem.forEach( item => {
          const link = item.children[0];
          const subMenuContent = item.children[1];

          link.addEventListener( "keydown", accessibleHover );

          const lastMenuCol = subMenuContent.children[0].lastElementChild;

          const lastMenuColLinks = lastMenuCol.getElementsByTagName( "a" );

          const lastLink = lastMenuColLinks[lastMenuColLinks.length - 1];

          lastLink.addEventListener( "blur", closeDropdown );

          // REMOVE DROPDOWN WHEN YOU TAB BACK AS WELL
        } );
      }
      
      else if ( $( ".mobile-nav" ).css( "display" ) === "block" ) {
        // close out any open submenu tabs
        const menuLinks = document.querySelectorAll( "li.header__nav__mega a.dropdown-link" );
        menuLinks.forEach( menuLink=> {
          menuLink.classList.remove( "focused" );
        } );

        let openMobileMenu = $( ".mobile-nav button.menu__toggle" );
        let closeMobileMenu = $( ".mobile-nav button.menu__toggle__close" );

        let menuContainer = $( ".mobile-menu-container" );
       
        openMobileMenu.on( "click", ()=> {
          menuContainer.css( { "maxHeight": $( window ).height() } ); 
          menuContainer.addClass( "is-open" );
          $( ".mobile-nav" ).addClass( "menu-visible" );
          $( "html" ).addClass( "no-scroll" );
        } );
         
        closeMobileMenu.on( "click", ()=> {
          menuContainer.removeClass( "is-open" );
          $( ".mobile-nav" ).removeClass( "menu-visible" );
          $( "html" ).removeClass( "no-scroll" );
        } );

        let closeMobileOnResize = () => {
          menuContainer.removeClass( "is-open" );
          $( ".mobile-nav" ).removeClass( "menu-visible" );
          $( "html" ).removeClass( "no-scroll" );
        };

        // resize if you change window size
        $( window ).on( "resize", function() {
          setTimeout( function() {
            menuContainer.css( { "maxHeight": $( window ).height() } ); 
          } );
        } );
       
        // mobile menu modal

        let button = $( ".header__nav__mega > button.dropdown-link" );
        // toggle submenu links
        button.on( "click", e => {
          e.stopImmediatePropagation();
          const eTarget = e.target;
          const togClass = "toggled";
        
          // close submenu if you open a new one
          if ( eTarget.closest( "button" ).classList.contains( togClass ) ) {
            eTarget.closest( "button" ).classList.remove( togClass );
          }
          else {
            button.each( function() {
              this.classList.remove( togClass );
            } );
            eTarget.closest( "button" ).classList.add( togClass );
          }
        } );

        const closeMobileDropdown = e => {
          // close dropdown if tabbing to prev parent link, or next parent link
          // keep open if tabbing backwards within megamenu dropdown
          const linkType = document.getElementsByClassName( "submenu-link" );
          for ( let i = 0; i < linkType.length; ++i ) {
            linkType[i].addEventListener( "focusout", e => {
              if ( e.relatedTarget ) {
                const megaContent = e.target.closest( ".header__nav__mega-content" );
                const parentLink = megaContent.previousElementSibling;
                parentLink.classList.remove( "focused" );
              }
            } );
          }
        };

        // close submenu when go out of it
        button.each( ( index, btn )=> {
          let submenuLinks = $( btn ).siblings().find( "ul > li > a.submenu-link, .buttons a.btn" );
          
          submenuLinks.on( "blur", e=> {
            if ( e.target == submenuLinks[submenuLinks.length - 1] ) {
              $( btn ).removeClass( "toggled" );
            }
          } );
         
          submenuLinks.each( ( index, link )=> {
            let toggledLink = $( link ).parent().parent().parent().parent().siblings() ;
            toggledLink.on( "keydown", e=> {
              if ( e.shiftKey && e.keyCode === 9 ) {
                $( toggledLink ).removeClass( "toggled" );
              }
            } );
          } );
        } );
      }
    };

    let backToTop = () => {
      let backToTopButton = document.querySelector( "button.back-to-top" );
      backToTopButton.addEventListener( "click", ()=> {
        $( "html, body" ).animate( { scrollTop: 0 }, "slow" );
      } );
      
      window.onscroll = () => {
        let scrollPosition = window.pageYOffset;
        if ( scrollPosition < 200 ) {
          backToTopButton.classList.add( "hidden" );
        }
        else {
          backToTopButton.classList.remove( "hidden" );
        }
      };
    };
    backToTop();

    $( window ).on( "load", function() {
      desktopNavVisible();
      tileLinksSwitch();
      photoTileLinksSwitch();
      tileLinksHoverReorderOverlay();
    } );

    $( window ).on( "resize", function() {
      setTimeout( function() {
        desktopNavVisible(); 
        tileLinksSwitch();
        photoTileLinksSwitch();
        tileLinksHoverReorderOverlay();
      }, 200 );
    } );
    
    /* SKIP LINKS */
    // skip link scroll to section
    const skipToAnchor = aid => {
      const aTag = $( aid );
      const focus = true;
      $( "html,body" ).animate( {
        scrollTop: aTag.offset().top
      }, "slow" );
      const first_child = $( aTag.children()[0] );
      const tag = first_child.prop( "tagName" ).toLowerCase();

      if ( tag !== "a" && tag !== "button" && tag !== "input" && tag !== "textarea" ) {
        if ( first_child.attr( "tabIndex" ) !== undefined ) {
          first_child.attr( "tabIndex", -1 ).focus();
          first_child.removeAttr( "tabIndex" );
        }
        else {
          first_child.focus();
        }
      }
      else {
        first_child.focus();
      }
    };

    // create skip links
    const skipLinks = () => {
      $( "section" ).each( function() {
        const id = $( this ).attr( "id" );
        if ( id !== undefined ) {
          // Use the section id to create a label for the items in the skip link list
          const sectionNameArray = id.split( "-" );
          let sectionName = "";
          for ( let i = 0; i < sectionNameArray.length; i++ ) {
            let str = sectionNameArray[i];
            str = str.toLowerCase().replace( /\b[a-z]/g, function( letter ) {
              return letter.toUpperCase();
            } );
            sectionName += str;
            if ( i < sectionNameArray.length - 1 ) {
              sectionName += " ";
            }
          }
          const skiplink = "<li><a href='#" + id + "' class='text-link'>Skip to " + sectionName + "</a></li>";
          $( ".skiplinks ul" ).append( skiplink );
        }
      } );

      const skipLinkContainer = $( ".skiplinks" );
      const skipLink = $( ".skiplinks a" );

      skipLink.on( "focus", function() {
        skipLinkContainer.addClass( "show" );
      } );

      skipLink.on( "blur", function() {
        skipLinkContainer.removeClass( "show" );
      } );

      skipLink.on( "click", function( e ) {
        e.preventDefault();
        skipToAnchor( $( this ).attr( "href" ) );
      } );
    };

    skipLinks();

    // slider module
    let testimonialsModule = ()=> {
      let allSliders = $( ".testimonials" );
      // if testimonial sliders exist
      if ( allSliders.length ) {
        // add multiple swipers
        allSliders.each( function() {
          let indivSliderId = ( $( this ) ).find( ".swiper-container" );
          const swiper = new Swiper( indivSliderId, {
            // Optional parameters
            direction: "horizontal",
            loop:      true,

            // If we need pagination
            pagination: {
              el: ".swiper-pagination"
            },

            // Navigation arrows
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
          } );
        } );
      }
    };

    testimonialsModule();

    // slider module
    // test
    let photoGalleryModule = ()=> {
      if ( $( ".photo-gallery" ).length ) {
        const imageSwiper = new Swiper( ".main-wrapper .swiper-container", {
          loop:                     false,
          slidesPerView:            1,
          centeredSlides:           false,
          touchStartPreventDefault: false,
          spaceBetween:             0,
          simulateTouch:            true,
          pagination:               {
            el:           ".swiper-pagination",
            type:         "custom",
            renderCustom: function( swiper, current, total ) {
              return `<span class="current">${current}</span>` + 
              "<span class=\"fraction\"></span>" + 
              `<span class="total">${total}</span>`; 
            }
          },
          navigation: {
            nextEl: ".image-swiper-button-next",
            prevEl: ".image-swiper-button-prev"
          } 
          
        } );

        // thumbnail slider functionality
        let thumbnailSlider = () => {
          let slideCurrent;

          let swiperButtons = document.querySelectorAll( ".swiper-controls button" );
          let allThumbnails = document.querySelectorAll( ".photo-gallery__thumb" );
          let allSlides = document.querySelectorAll( ".swiper-slide" );

          // add data index for easy matching
          allThumbnails.forEach( ( thumbnail, i )=> {
            thumbnail.setAttribute( "data-index", i );
          } );

          allSlides.forEach( ( slide, i )=> {
            slide.setAttribute( "data-index", i );
          } );
         
          let activeSlide = () => {
            let visibleSlide = document.querySelector( ".swiper-slide-active" );
            slideCurrent = visibleSlide;
          };
          activeSlide();

          let thumbnailPagination = () => {
            let pagination = document.querySelector( ".photo-gallery__thumb__pagination" );
            let bullets = pagination.querySelectorAll( ".bullet" );
            let pages = document.querySelectorAll( ".photo-gallery__thumb__page" );

            let slides = document.querySelectorAll( ".swiper-slide" );

            let clickedThumbIndex;

            // add data-page for easy matching
            pages.forEach( ( page, i )=> {
              page.setAttribute( "data-page", i );
            } );
            bullets.forEach( ( bullet, i )=> {
              bullet.setAttribute( "data-page", i );
            } );

            allThumbnails.forEach( thumbnail=> {
              thumbnail.addEventListener( "click", e=> {
                let clickedThumb = e.target.closest( ".photo-gallery__thumb" );
                clickedThumbIndex = clickedThumb.getAttribute( "data-index" );
                imageSwiper.slideTo( clickedThumbIndex );
                allThumbnails.forEach( thumbnail=> {
                  thumbnail.classList.remove( "active" );
                } );
                clickedThumb.classList.add( "active" );
              } );
            } );

            let pageNumber;
            let bulletNumber;
              
            bullets.forEach( bullet=> {
              bullet.addEventListener( "click", e=> {
                bullets.forEach( bullet=> {
                  bullet.classList.remove( "bullet-active" );
                } );
                e.target.classList.add( "bullet-active" );
                bulletNumber = e.target.getAttribute( "data-page" );
                pages.forEach( page=> {
                  page.classList.add( "hidden" );
                  pageNumber = page.getAttribute( "data-page" );
                  if ( pageNumber == bulletNumber ) {
                    page.classList.remove( "hidden" );
                  }
                } );

                let activeThumb = document.querySelector( ".photo-gallery__thumb__grid .active" );
              } );
              // handle touch / click events
              imageSwiper.on( "slideChangeTransitionStart", ()=> {
                activeSlide();
                allThumbnails.forEach( thumbnail=> {
                  thumbnail.classList.remove( "active" );
                  // eslint-disable-next-line max-len
                  if ( slideCurrent.getAttribute( "data-index" ) === thumbnail.getAttribute( "data-index" ) ) {
                    thumbnail.classList.add( "active" );
                  }
                  let activeThumb = thumbnail.classList.contains( "active" );
                 
                  if ( activeThumb ) {
                    // eslint-disable-next-line max-len
                    let activeThumbPage = thumbnail.closest( ".photo-gallery__thumb__page" ).getAttribute( "data-page" );
                    pages.forEach( page=> {
                      pageNumber = page.getAttribute( "data-page" );
                      page.classList.add( "hidden" );
                      if ( pageNumber == activeThumbPage ) {
                        page.classList.remove( "hidden" );
                      }
                    } );
                   
                    let activeBullet;
                    bullets.forEach( bullet=> {
                      bullet.classList.remove( "bullet-active" );
                      let bulletPage = bullet.getAttribute( "data-page" );

                      if ( bulletPage == activeThumbPage ) {
                        bullet.classList.add( "bullet-active" );
                      }
                    } );
                  }
                } );
              } );
            } );
          };
          thumbnailPagination();
        };
         
        thumbnailSlider();
      }
    };
    photoGalleryModule();

    // tile links switch order on tablet
    let tileLinksSwitch = () => {
      if ( $( ".tile-links__indiv" ).length ) {
        let tileLinkThree = $( ".tile-links__indiv.three" );
        let tileLinkFour = $( ".tile-links__indiv.four" );
        if ( window.matchMedia( "(min-width: 768px)" ).matches ) {
          tileLinkThree.insertBefore( tileLinkFour );
        }
        else {
          tileLinkFour.insertBefore( tileLinkThree );
        }
      }
    };
    // photo tile links switch order on tablet
    let photoTileLinksSwitch = () => {
      if ( $( ".photo-tile-links__indiv" ).length ) {
        let photoTile = $( ".photo-tile-links__indiv" );

        photoTile.each( ( index, tile ) => {
          let text = $( tile ).find( ".text" );
          let photo = $( tile ).find( ".photo" );
          if ( window.matchMedia( "(min-width: 768px)" ).matches ) {
            text.insertBefore( photo );
          }
          else {
            photo.insertBefore( text );
          }
        } );
      }
    };

    // switch photos out based on hover for Tile Links Hover module
    let tileLinksHoverBg = () => {
      if ( $( ".tile-links-hover" ).length ) {
        let tiles = $( ".tile-links-hover__links__indiv" );
        let currentTile;
        let bgImg;
        tiles.each( ( index, tile )=> {
          $( tile ).on( "mouseenter", e=> {
            let hoveredTile = e.currentTarget.classList[1];
            currentTile = hoveredTile;

            let bgImages = $( ".tile-links-hover img.bg-img" );

            bgImages.each( ( index, image )=> {
              $( image ).addClass( "hidden" );
              bgImg = image.classList[1];
              if ( bgImg == currentTile ) {
                $( image ).removeClass( "hidden" );
              }
            } );
          } );
          $( tile ).on( "mouseout", e=> {
            let bgImages = $( ".tile-links-hover img.bg-img" );
            bgImages.each( ( index, image )=> {
              $( image ).addClass( "hidden" );
              if ( $( image ).hasClass( "default" ) ) {
                $( image ).removeClass( "hidden" );
              }
            } );
          } );
        } );
      }
    };

    tileLinksHoverBg();

    //reorder the overlays to match mobile
    let tileLinksHoverReorderOverlay = () => {
      if ( window.matchMedia( "(min-width: 768px)" ).matches ) {
        $( ".tile-links-hover .tile-3" ).addClass( "dark-overlay" );
        $( ".tile-links-hover .tile-4" ).removeClass( "dark-overlay" );
      }
      else {
        $( ".tile-links-hover .tile-3" ).removeClass( "dark-overlay" );
        $( ".tile-links-hover .tile-4" ).addClass( "dark-overlay" );
      }
    };

    //featured video modal
    let ftVideoModal = () => {
      if ( $( ".ft-video" ).length ) {
        let ftVideo = $( ".ft-video__modal" );
        let ftVideoId = $( ".ft-video__modal" ).attr( "id" );

        let ftVideoPlayButtons = $( ".ft-video-play" );

        let ftVideoOverlay = $( ".ft-video__modal .overlay" );

        let ftVideoCloseBtn = $( ".ft-video .modal-close" );

        let currentlySelected;

        ftVideoPlayButtons.each( ( index, button )=> {
          $( button ).on( "click", e=> {
            let targetButton = e.target.closest( "button.ft-video-play" );
            currentlySelected = $( targetButton ).attr( "data-micromodal-trigger" );
    
            $( "html" ).addClass( "no-scroll" );
            // show the correct video
            ftVideo.each( ( index, video )=> {
              let videoId = $( video ).attr( "id" );
              if ( videoId == currentlySelected ) {
                MicroModal.show( videoId,
                  {
                    awaitOpenAnimation:  true,
                    awaitCloseAnimation: true,
                    closeTrigger:        "data-video-close",
                    onClose:             modal => {
                      modal.querySelectorAll( "iframe" ).forEach( iframe => {
                        iframe.setAttribute( "src", iframe.getAttribute( "src" ) );
                      } );
                    }
                  } );
              }
            } );
          } );
        } );
     
        // close on overlay click
        ftVideoOverlay.each( ( index, overlay )=> {
          $( overlay ).on( "click", ()=> {
            let videoId = $( overlay ).closest( ".ft-video__modal" ).attr( "id" );
            
            if ( videoId == currentlySelected ) {
              let ftVideoModal = $( overlay ).closest( ".ft-video__modal" );
              ftVideoModal.removeClass( "is-open" );
              $( "html" ).removeClass( "no-scroll" );
              MicroModal.close( videoId );
            }
          } );
        } );
       
        // close on close button click
        ftVideoCloseBtn.on( "click", ()=> {
          let ftVideoModal = $( ".ft-video__modal" );
          ftVideoModal.removeClass( "is-open" );
          $( "html" ).removeClass( "no-scroll" );
          MicroModal.close( ftVideoId );
        } );
        // close on escape
        $( document ).keydown( function( e ) {
          if ( e.key === "Escape" ) { // escape key maps to keycode `27`
            let ftVideoModal = $( ".ft-video__modal" );
            ftVideoModal.removeClass( "is-open" );
            $( "html" ).removeClass( "no-scroll" );
            MicroModal.close( ftVideoId );
          }
        } );
      }
      else if ( $( ".ft-video-tiles" ).length ) {
        let ftVideoTile = $( ".ft-video-tiles__modal" );
        let ftVideoTileId = $( ".ft-video-tiles__modal" ).attr( "id" );

        let ftVideoTilePlay = $( ".ft-video-tiles a.btn.play" );

        let ftVideoTileOverlay = $( ".ft-video-tiles__modal .overlay" );

        let ftVideoTileClose = $( ".ft-video-tiles__modal .modal-close" );

        let currentlySelected;

        ftVideoTilePlay.each( ( index, button )=> {
          $( button ).on( "click", e=> {
            e.preventDefault();
            let targetButton = e.target.closest( ".ft-video-tiles a.btn.play" );
            currentlySelected = $( targetButton ).attr( "data-micromodal-trigger" );
            console.log( currentlySelected );
    
            $( "html" ).addClass( "no-scroll" );
            // show the correct video
            ftVideoTile.each( ( index, videoTile )=> {
              let videoTileId = $( videoTile ).attr( "id" );
              if ( videoTileId == currentlySelected ) {
                MicroModal.show( videoTileId,
                  {
                    awaitOpenAnimation:  true,
                    awaitCloseAnimation: true,
                    closeTrigger:        "data-video-close",
                    onClose:             modal => {
                      modal.querySelectorAll( "iframe" ).forEach( iframe => {
                        iframe.setAttribute( "src", iframe.getAttribute( "src" ) );
                      } );
                    }
                  } );
              }
            } );
          } );
        } );
     
        // close on overlay click
        ftVideoTileOverlay.each( ( index, tileOverlay )=> {
          $( tileOverlay ).on( "click", ()=> {
            let videoTileId = $( tileOverlay ).closest( ".ft-video-tiles__modal" ).attr( "id" );
            
            if ( videoTileId == currentlySelected ) {
              let ftVideoTileModal = $( tileOverlay ).closest( ".ft-video-tiles__modal" );
              ftVideoTileModal.removeClass( "is-open" );
              $( "html" ).removeClass( "no-scroll" );
              MicroModal.close( currentlySelected );
            }
          } );
        } );
       
        // close on close button click
        ftVideoTileClose.on( "click", ()=> {
          let ftVideoTileModal = $( ".ft-video-tiles__modal" );
          ftVideoTileModal.removeClass( "is-open" );
          $( "html" ).removeClass( "no-scroll" );
          MicroModal.close( currentlySelected );
        } );
        // close on escape
        $( document ).keydown( function( e ) {
          if ( e.key === "Escape" ) { // escape key maps to keycode `27`
            let ftVideoTileModal = $( ".ft-video-tiles__modal" );
            ftVideoTileModal.removeClass( "is-open" );
            $( "html" ).removeClass( "no-scroll" );
            MicroModal.close( currentlySelected );
          }
        } );
      }
    };
    ftVideoModal();

    // sidenav
    let sidenav = () => {
      if ( $( ".sidenav" ).length ) {
        let sidenav = document.querySelector( ".sidenav .sidenav__modal" );
        let sidenavOverlay = document.querySelector( ".sidenav__modal-overlay" );
        let openSidenavButton = document.querySelector( ".sidenav .sidenav__open-trigger" );
        let closeSidenavButton = document.querySelector( ".sidenav button.sidenav__close" );
        let sidenavLinks = sidenav.querySelectorAll( "a, button" );
        let sidenavMenuParentLinks = sidenav.querySelectorAll( ".sidenav__submenu.level-one > li" );
        let lastSidenavMenuParentLink = sidenavMenuParentLinks[sidenavMenuParentLinks.length - 1];
        let lastSidenavLinkButton = lastSidenavMenuParentLink.querySelector( "button" );
  
        let hideSidenav = () => {
          sidenav.setAttribute( "aria-hidden", "true" );
          sidenavOverlay.setAttribute( "aria-hidden", "true" );
          openSidenavButton.classList.remove( "offscreen" );
          openSidenavButton.classList.add( "onscreen" );
          document.querySelector( "html" ).classList.remove( "no-scroll" );
        };
  
        let showSidenav = () => {
          sidenav.setAttribute( "aria-hidden", "false" );
          sidenavOverlay.setAttribute( "aria-hidden", "false" );
          openSidenavButton.classList.remove( "onscreen" );
          openSidenavButton.classList.add( "offscreen" );
          // if launching on mobile, no scrolling behind
          if ( window.matchMedia( "(max-width: 1199px)" ).matches ) {
            document.querySelector( "html" ).classList.add( "no-scroll" );
          }
        };
  
        // for each link... check where we are and loop
        for ( let i = 0; i < sidenavLinks.length; i++ ) {
          let firstSidenavLink = sidenavLinks[0];
          let lastSidenavLink = sidenavLinks[sidenavLinks.length - 1];
         
          // check which link we are on and listen for keydown
          sidenavLinks[i].addEventListener( "keydown", e=> {
            // if the last list is open, loop appropriately
            if ( lastSidenavLinkButton.classList.contains( "open" ) ) {
              if ( sidenavLinks[i] == lastSidenavLink ) {
                // don't do anything special if going back
                if ( e.shiftKey && e.keyCode === 9 ) {
                  return null;
                }
                // go to first link
                else if ( e.keyCode === 9 ) {
                  e.preventDefault();
                  sidenavLinks[i].blur();
                  firstSidenavLink.focus();
                }
              }
              else if ( sidenavLinks[i] == firstSidenavLink ) {
                // got to last link
                if ( e.shiftKey && e.keyCode === 9 ) {
                  e.preventDefault();
                  sidenavLinks[i].blur();
                  lastSidenavLink.focus();
                }
                // don't do anything special if going forward
                else if ( e.keyCode === 9 ) {
                  return null;
                }
              }
            }
            // if the last list is closed, loop appropriately
            else {
              if ( sidenavLinks[i] == lastSidenavLinkButton ) {
                // don't do anything special if going back
                if ( e.shiftKey && e.keyCode === 9 ) {
                  return null;
                }
                // go to first link
                else if ( e.keyCode === 9 ) {
                  e.preventDefault();
                  sidenavLinks[i].blur();
                  firstSidenavLink.focus();
                }
              }
              else if ( sidenavLinks[i] == firstSidenavLink ) {
                // got to last link
                if ( e.shiftKey && e.keyCode === 9 ) {
                  e.preventDefault();
                  sidenavLinks[i].blur();
                  lastSidenavLinkButton.focus();
                }
                // don't do anything special if going forward
                else if ( e.keyCode === 9 ) {
                  return null;
                }
              }
            }
          } );
        }
  
        // if sidenav open, use esc to exit
        let sidenavCloseEsc = () => {
          $( document ).keydown( function( e ) {
            // hide sidenav if its open and you hit esc
            if ( e.key === "Escape" ) { // escape key maps to keycode `27`
              if ( sidenav.getAttribute( "aria-hidden" ) == "false" ) {
                hideSidenav();
              }
              else if ( sidenav.getAttribute( "aria-hidden" ) == "true" ) {
              }
            }
          } );
        };
        sidenavCloseEsc();

        let sidenavOpenClose = () => {
          // open on button click
          openSidenavButton.addEventListener( "click", ()=> {
            showSidenav();
          } );
          // close on button click
          closeSidenavButton.addEventListener( "click", ()=> {
            hideSidenav();
          } );
          // close on overlay click
          sidenavOverlay.addEventListener( "click", ()=> {
            hideSidenav();
          } );
        };
        sidenavOpenClose();
  
        // sidenav submenu toggle
        let sidenavSubmenuToggle = () => {
          let sidenavParentItems = document.querySelectorAll( ".sidenav__submenu.level-one > li > button" );
          sidenavParentItems.forEach( parentItem=> {
            parentItem.addEventListener( "click", e=> {
              if ( e.target.classList.contains( "open" ) ) {
                e.target.classList.remove( "open" );
              }
              else {
                e.target.classList.add( "open" );
              }
            } );
          } );
        };
        sidenavSubmenuToggle();
       
        let sidenavSticky = ()=> {
          let toggle = $( ".sidenav__open-trigger" );
          let toggleOffset = toggle.offset().top - 50;
          let sidenavContainer = $( ".sidenav .sidenav__modal" );

          $( window ).on( "load scroll", function() {
            let scrollYPos = $( document ).scrollTop();
            if ( scrollYPos > toggleOffset ) {
              toggle.removeClass( "not-sticky" );
              toggle.addClass( "sticky" );
              sidenavContainer.removeClass( "not-sticky" );
              sidenavContainer.addClass( "sticky" );
            }
            else {
              toggle.removeClass( "sticky" );
              toggle.addClass( "not-sticky" );
              sidenavContainer.removeClass( "sticky" );
              sidenavContainer.addClass( "not-sticky" );
            }
          } );
        };
        sidenavSticky();

        let closeOnResize = () => {
          // if resizing from responsive to desktop, close it
          if ( window.matchMedia( "(min-width: 1200px)" ).matches ) {
            hideSidenav();
          }
        };
       
        $( window ).resize( function() {
          closeOnResize();
        } );
      }
    };
    sidenav();

    let newsEventsSlider = () => {
      // if testimonial sliders exist
      if ( $( ".news-events" ).length ) {
        // add multiple swipers
        $( ".news-events" ).each( ( index, slider )=> {
          let indivSliderId = ( $( slider ) ).find( ".swiper-container" );
          const swiper = new Swiper( indivSliderId, {
            // Optional parameters
            direction:  "horizontal",
            loop:       false,
            autoHeight: true,

            // If we need pagination
            pagination: {
              el: ".swiper-pagination"
            },

            // Navigation arrows
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
          } );
        } );
      }
    };
    newsEventsSlider();
    
    let ftContentSlider = () => {
      // if testimonial sliders exist
      if ( $( ".ft-content" ).length ) {
        // add multiple swipers
        $( ".ft-content" ).each( ( index, slider )=> {
          let indivSliderId = ( $( slider ) ).find( ".swiper-container" );
          const swiper = new Swiper( indivSliderId, {
            // Optional parameters
            direction:  "horizontal",
            loop:       false,
            autoHeight: true,

            // If we need pagination
            pagination: {
              el: ".swiper-pagination"
            },

            // Navigation arrows
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
          } );
        } );
      }
    };
    ftContentSlider();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  }
};
