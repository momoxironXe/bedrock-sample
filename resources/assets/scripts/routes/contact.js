export default {
  init() {
    let contactSubmenuToggle = () => {
      let contactSubmenuParents = document.querySelectorAll( ".contact__submenu.level-one > li > button" );
      contactSubmenuParents.forEach( parentItem=> {
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
    contactSubmenuToggle();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
