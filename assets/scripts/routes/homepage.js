
export default {
  init() {
    $( window ).on( "resize", function() {
      setTimeout( () => {
        aTagAddRemove();
        tileDesktopHover();
      }, 200 );
    } );
    
    let videoPause = () => {
      // add data attribute to pause button
      let pauseButton = document.querySelector( ".video-banner__controls > .wrapper > button.pause" );
      pauseButton.addEventListener( "click", ()=> {
        if ( pauseButton.getAttribute( "data-paused" ) === "true" ) {
          pauseButton.setAttribute( "data-paused", "false" );
        }
        else if ( pauseButton.getAttribute( "data-paused" ) === "false" ) {
          pauseButton.setAttribute( "data-paused", "true" );
        }
      } );
    };
    videoPause();

    // wrap ft links in a tag on responsive
    // remove on desktop
    let aTagAddRemove = () => {
      let desktop = window.matchMedia( "(min-width: 1200px)" );
      $( ".ft-links-hover__indiv" ).each( ( index, link )=> {
        if ( desktop.matches ) { 
          $( link ).unwrap( "a" );
        }
        else if ( !desktop.matches ) {
          $( link ).wrap( "<a href='" + $( link ).attr( "data-link" ) + "' />" );
        }
      } );
    };
    aTagAddRemove();

    let tileDesktopHover = () => {
      // only run on desktop view
      let desktop = window.matchMedia( "(min-width: 1200px)" );
    
      let ftLinksOuter = document.querySelectorAll( ".ft-links-hover__indiv" );
      ftLinksOuter.forEach( link=> {
        link.addEventListener( "mouseenter", e=> {
          let nextLink = e.target.nextElementSibling;
          let prevLink = e.target.previousElementSibling;
    
          // if no prev link
          if ( nextLink ) {
            if ( desktop.matches ) { 
              // maroon hover add class
              if ( nextLink.classList.contains( "gold" ) ) {
                nextLink.classList.add( "maroon-hovered" );
              }
            }
          }
    
          // if both prev and next link
          if ( nextLink && prevLink ) {
            // gold hover add class
            if ( prevLink.classList.contains( "maroon" ) 
            && nextLink.classList.contains( "teal" ) ) {
              if ( desktop.matches ) { 
                prevLink.classList.add( "gold-hovered" );
                nextLink.classList.add( "gold-hovered" );
              }
            }
            // teal hover add class 
            else if ( prevLink.classList.contains( "gold" )
            && nextLink.classList.contains( "light-gray" ) ) {
              if ( desktop.matches ) { 
                prevLink.classList.add( "teal-hovered" );
                nextLink.classList.add( "teal-hovered" );
              }
            }
          }
    
          // if no next link
          if ( prevLink ) {
            // light gray hover add class 
            if ( prevLink.classList.contains( "teal" ) ) {
              if ( desktop.matches ) { 
                prevLink.classList.add( "light-gray-hovered" );
              }
            }
          }
        } );
      
        link.addEventListener( "mouseleave", e=> {
          let nextLink = e.target.nextElementSibling;
          let prevLink = e.target.previousElementSibling;
    
          // if no prev link
          if ( nextLink ) {
            // maroon hover add class
            if ( nextLink.classList.contains( "gold" ) ) {
              if ( desktop.matches ) { 
                nextLink.classList.remove( "maroon-hovered" );
              }
            }
          }
    
          // if both prev and next link
          if ( nextLink && prevLink ) {
            // gold hover add class
            if ( prevLink.classList.contains( "maroon" ) 
            && nextLink.classList.contains( "teal" ) ) {
              if ( desktop.matches ) { 
                prevLink.classList.remove( "gold-hovered" );
                nextLink.classList.remove( "gold-hovered" );
              }
            }
            // teal hover add class 
            else if ( prevLink.classList.contains( "gold" )
            && nextLink.classList.contains( "light-gray" ) ) {
              if ( desktop.matches ) { 
                prevLink.classList.remove( "teal-hovered" );
                nextLink.classList.remove( "teal-hovered" );
              }
            }
          }
    
          // if no next link
          if ( prevLink ) {
            // light gray hover add class 
            if ( prevLink.classList.contains( "teal" ) ) {
              if ( desktop.matches ) { 
                prevLink.classList.remove( "light-gray-hovered" );
              }
            }
          }
        } );
      } );
    };
    tileDesktopHover();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
  
