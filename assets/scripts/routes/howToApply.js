import Combobo from "combobo";

export default {
  init() {
    const comboboSelectRole = new Combobo( {
      input:          "#select-role-apply",
      list:           ".listbox.select-role",
      options:        ".option", // qualified within `list`
      openClass:      "open",
      activeClass:    "active",
      selectedClass:  "selected",
      useLiveRegion:  false,
      multiselect:    false,
      noResultsText:  null,
      selectionValue: selecteds => selecteds.map( s => s.innerText.trim() ).join( " - " ),
      // eslint-disable-next-line max-len
      optionValue:    "underline", // wrap the matched portion of the option (if applicable) in a span with class "underline"
      filter:         "contains" // 'starts-with', 'equals', or funk
		  } );

    $( window ).on( "load", function() {
      comboboSelectRole.goTo( comboboSelectRole.getOptIndex() + 0 ).select();
    } );

    $( window ).on( "resize", function() {
      // select correct button on window resize
      let currentlySelected = comboboSelectRole.currentOption.classList[1];
      
      if ( $( ".selection__buttons" ).is( ":visible" ) ) {
        let roleButtons = document.querySelectorAll( ".selection__buttons > button" );
        roleButtons.forEach( roleButton=> {
          roleButton.classList.remove( "active" );
          let roleMatching = roleButton.classList[1];
          if ( roleMatching == currentlySelected ) {
            roleButton.classList.add( "active" );
          }
        } );
      }
    } );

    // make it work on desktop by linking buttons to dropdown choices
    if ( $( ".selection__buttons" ).is( ":visible" ) ) {
      let roleButtons = document.querySelectorAll( ".selection__buttons > button" );
      roleButtons.forEach( ( roleButton, index )=> {
        roleButton.addEventListener( "click", e => {
          roleButtons.forEach( roleBtn=> {
            roleBtn.classList.remove( "active" );
          } );
          comboboSelectRole.reset();
          comboboSelectRole.goTo( comboboSelectRole.getOptIndex() + index ).select();
          e.target.classList.add( "active" );
        } );
      } );
    }

    let showSelectedRole = () => {
      let currentRoleSelection;

      comboboSelectRole.addEventListener( "selection", e=> {
        // update the current selection variable
        currentRoleSelection = e.option.classList[1];
        
        let roleContentContainer = document.querySelectorAll( ".select-role__content__indiv" );
        roleContentContainer.forEach( roleContainer=> {
          // hide everything at first
          roleContainer.classList.add( "hidden" );
          // if current role selection matches role container id unhide
          if ( currentRoleSelection == roleContainer.id ) {
            roleContainer.classList.remove( "hidden" );
          }
        } );
      } );
    };
    showSelectedRole();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
