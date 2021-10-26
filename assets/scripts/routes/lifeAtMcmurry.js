import Swiper, { Navigation, Pagination } from "swiper";

export default {
  init() {
    // media queries
    let desktop = window.matchMedia( "(min-width: 1200px)" );
    let tablet = window.matchMedia( "(min-width: 768px)" );
    let mobile = window.matchMedia( "(max-width: 767px)" );

    $( window ).on( "load", function() {
      reorderStudentOrgs();
    } );

    $( window ).on( "resize", function() {
      setTimeout( function() {
        reorderStudentOrgs();
      }, 200 );
    } );

    const aboutMcm = new Swiper( ".about-campus-slider .swiper-container", {
      // Optional parameters
      direction: "horizontal",
      loop:      false,
    
      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
      
    } );
    const studentOrgs = new Swiper( ".student-org-slider .swiper-container", {
      // Optional parameters
      direction: "horizontal",
      loop:      false,
    
      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
      
    } );

    let athleticsToggleSports = () => {
      let athleticsToggle = $( ".athletics__toggle > button" );
      athleticsToggle.each( function() {
        $( this ).on( "click", function( e ) {
          athleticsToggle.removeClass( "active" );
          e.target.classList.add( "active" );
          
          let currentSelection = e.target.classList[1];

          if ( e.target.classList.contains( "mens" ) ) {
            $( ".athletics__side > .mens__photos" ).removeClass( "hidden" );
            $( ".athletics__content.womens" ).addClass( "hidden" );
            $( ".athletics__side > .womens__photos" ).addClass( "hidden" );
            let sportsListsMen = $( ".athletics__content.mens" );
            sportsListsMen.each( function( index, list ) {
              list.classList.add( "hidden" );
              let listClass = list.classList[1]; 
              if ( listClass == currentSelection ) {
                list.classList.remove( "hidden" );
              }
            } );
          }
          else if ( e.target.classList.contains( "womens" ) ) {
            $( ".athletics__side > .womens__photos" ).removeClass( "hidden" );
            $( ".athletics__content.mens" ).addClass( "hidden" );
            $( ".athletics__side > .mens__photos" ).addClass( "hidden" );
            let sportsListsWomen = $( ".athletics__content.womens" );
            sportsListsWomen.each( function( index, list ) {
              list.classList.add( "hidden" );
              let listClass = list.classList[1]; 
              if ( listClass == currentSelection ) {
                list.classList.remove( "hidden" );
              }
            } );
          }
        } );
      } );
    };
    athleticsToggleSports();

    let athleticsHovers = () => {
      let athleticsMensImgs = $( ".athletics__side > .mens__photos > div" );
      let sportHoverMen = $( ".athletics__content.mens > ul > li" );
      let hoveredMenSportClass;
      sportHoverMen.on( "mouseenter", function( e ) {
        // set the currently hovered sport to the hover
        sportHoverMen.removeClass( "active" );
        hoveredMenSportClass = e.target.closest( "li" ).classList[0];
        let hoveredSport = e.target.closest( "li" );
        hoveredSport.classList.add( "active" );
        
        athleticsMensImgs.each( function( index, group ) {
          group.classList.add( "hidden" );
          group.classList.remove( "active" );
          let sportPhotoGroup = group.classList[0];
          if ( hoveredMenSportClass == sportPhotoGroup ) {
            group.classList.remove( "hidden" );
          }
        } );
      } );

      let athleticsWomensImgs = $( ".athletics__side > .womens__photos > div" );
      let sportHoverWomen = $( ".athletics__content.womens > ul > li" );
      let hoveredWomenSportClass;
      sportHoverWomen.on( "mouseenter", function( e ) {
        // set the currently hovered sport to the hover
        sportHoverWomen.removeClass( "active" );
        hoveredWomenSportClass = e.target.closest( "li" ).classList[0];
        let hoveredSport = e.target.closest( "li" );
        hoveredSport.classList.add( "active" );
        
        athleticsWomensImgs.each( function( index, group ) {
          group.classList.add( "hidden" );
          group.classList.remove( "active" );
          let sportPhotoGroup = group.classList[0];
          if ( hoveredWomenSportClass == sportPhotoGroup ) {
            group.classList.remove( "hidden" );
          }
        } );
      } );
    };
   
    athleticsHovers();

    let reorderStudentOrgs = () => {
      let swiperSlides = document.querySelectorAll( ".student-org-slider .swiper-slide" );
      swiperSlides.forEach( slide=> {
        let studentOrgHeadline = slide.querySelector( ".content-left-middle" );
        let leftTop = slide.querySelector( ".content-left-top" );
        let leftBottom = slide.querySelector( ".content-left-bottom" );
        let rightTop = slide.querySelector( ".content-right-top" );
        let rightMiddle = slide.querySelector( ".content-right-middle" );
        let rightBottom = slide.querySelector( ".content-right-bottom" );
        if ( desktop.matches ) {
          studentOrgHeadline.parentNode.insertBefore( leftTop, studentOrgHeadline );
          rightBottom.parentNode.insertBefore( rightMiddle, rightBottom );
          rightMiddle.parentNode.insertBefore( rightTop, rightMiddle );
        }
        else {
          leftTop.parentNode.insertBefore( studentOrgHeadline, leftTop );
          leftBottom.parentNode.insertBefore( rightMiddle, leftBottom );
          rightMiddle.parentNode.insertBefore( rightTop, rightMiddle );
        }
      } );
    };
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
