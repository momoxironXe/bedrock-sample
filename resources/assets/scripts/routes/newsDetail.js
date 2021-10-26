import Swiper, { Navigation, Pagination } from "swiper";

export default {
  init() {
    let relatedStories = ()=> {
      let relatedStories = $( ".news-related" );
      // if testimonial sliders exist
      if ( relatedStories.length ) {
        // add multiple swipers
        relatedStories.each( function() {
          let indivSliderId = ( $( this ) ).find( ".swiper-container" );
          const swiper = new Swiper( indivSliderId, {
            // Optional parameters
            autoHeight: true,
            direction:  "horizontal",
            loop:       false,

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
    relatedStories();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
