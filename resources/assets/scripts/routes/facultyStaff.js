import Combobo from "combobo";
import SimpleBar from "simplebar";
import MicroModal from "micromodal";

export default {
  init() {
    MicroModal.init();
    
    // media queries
    let desktopSm = window.matchMedia( "(min-width: 992px)" );
    let tablet = window.matchMedia( "(min-width: 768px)" );
    let mobile = window.matchMedia( "(max-width: 767px)" );

    $( window ).on( "load", function() {
      reorderEntryPreview();
    } );

    $( window ).on( "resize", function() {
      setTimeout( function() {
        reorderEntryPreview();
      }, 200 );
    } );
     
    // comboboxes
    const comboboCategories = new Combobo( {
      input:          "#directory-categories",
      list:           ".listbox",
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

    let alternatingRows = ()=> {
      let directoryVisible = $( ".directory__grid__indiv:visible" );
      let directoryHidden = $( ".directory__grid__indiv:hidden" );
      directoryHidden.removeClass( "gray-bg" );
      directoryVisible.even().addClass( "gray-bg" );
    };
    alternatingRows();

    // clear all selections
    let clearAll = ()=> {
      let clearAllButton = document.querySelector( "button#clear-all" );
      clearAllButton.addEventListener( "click", ()=> {
        // pass in all directory & show all
        let directory = document.querySelectorAll( ".directory__grid__indiv" );
        directory.forEach( entry=> {
          entry.classList.remove( "hidden" );
          entry.classList.remove( "open" );
          let clearDirectory = $( ".directory__grid__indiv" );
          clearDirectory.removeClass( "gray-bg" );
          clearDirectory.even().addClass( "gray-bg" );
        } );
        // add open class back to first program
        let firstEntry = directory[0];
        firstEntry.classList.add( "open" );
        // pass in search field & remove input
        let searchField = document.querySelector( "input#directory-search" );
        searchField.value = "";
        comboboCategories.reset();
      } );
    };
    clearAll();

    // search majors
    let searchFunction = () => {
      // pass in all directory
      let directory = document.querySelectorAll( ".directory__grid__indiv" );
      directory.forEach( entry=> {
        let entryDept = entry.querySelector( ".department" ).innerText.toLowerCase();

        let entryEmail = entry.querySelector( ".contact-info > .email > .copy" ).innerText.toLowerCase();
        let entryPhone = entry.querySelector( ".contact-info > .phone > .copy" ).innerText.toLowerCase();
        let entryAddress = entry.querySelector( ".contact-info > .address > .copy" ).innerText.toLowerCase();
        let entryPoBox = entry.querySelector( ".contact-info > .po-box > .copy" ).innerText.toLowerCase();
        let entryHours = entry.querySelector( ".contact-info > .hours > .copy" ).innerText.toLowerCase();
       
        // define search field
        let searchField = document.querySelector( "input#directory-search" );
        // capture user input
        searchField.addEventListener( "input", ()=> {
          comboboCategories.reset();
          let rawUserInput = searchField.value;
          let userInput = rawUserInput.toLowerCase();
          entry.classList.add( "hidden" );
          entry.classList.remove( "open" );
          entry.classList.remove( "gray-bg" );
          // eslint-disable-next-line max-len
          if ( entryDept.includes( userInput ) || entryEmail.includes( userInput ) || entryPhone.includes( userInput ) || entryAddress.includes( userInput ) || entryPoBox.includes( userInput ) || entryHours.includes( userInput ) ) {
            entry.classList.remove( "hidden" );
            alternatingRows();
          }
        } );
      } );
    };
    searchFunction();

    let filterByType = () => {
      let currentSelection;

      let categoryActive = document.querySelector( "input#directory-categories" );

      // make it work on tablet by linking buttons to dropdown choices
      if ( $( ".selections__buttons" ).is( ":visible" ) ) {
        // eslint-disable-next-line max-len
        let categoryButtons = document.querySelectorAll( ".selections__buttons > .directory-categories > button" );
        
        categoryButtons.forEach( ( categoryButton, index )=> {
          categoryButton.addEventListener( "click", e=> {
            categoryButton.classList.remove( "active" );
            // pass in search field & remove input
            let searchField = document.querySelector( "input#directory-search" );
            searchField.value = "";
            categoryButtons.forEach( catBtn=> {
              catBtn.classList.remove( "active" );
            } );
            comboboCategories.reset();
            currentSelection = e.target.closest( "button" ).classList[2].toLowerCase();
            comboboCategories.goTo( comboboCategories.getOptIndex() + index ).select();
            e.target.closest( "button" ).classList.add( "active" );
          } );
        } );

        // remove active class if using  search
        let searchField = document.querySelector( "input#directory-search" );

        searchField.addEventListener( "input", ()=> {
          categoryButtons.forEach( dirBtn=> {
            dirBtn.classList.remove( "active" );
          } );
        } );

        //remove active class if using clear all
        let clearAllButton = document.querySelector( "button#clear-all" );
        clearAllButton.addEventListener( "click", ()=> {
          categoryButtons.forEach( dirBtn=> {
            dirBtn.classList.remove( "active" );
          } );
        } );
      }

      // pass in all directory entries
      let dirEntries = document.querySelectorAll( ".directory__grid__indiv" );
     
      dirEntries.forEach( entry=> {
        // listen for selection
        comboboCategories.addEventListener( "selection", e=> {
          // empty search field
          let searchField = document.querySelector( "input#directory-search" );
          searchField.value = "";
          // replace education with new selection
          entry.classList.add( "hidden" );
          entry.classList.remove( "open" );
          entry.classList.remove( "gray-bg" );
          currentSelection = e.option.classList[1];
          // select button on desktop when you select on mobile=
          // eslint-disable-next-line max-len
          let categoryButtons = document.querySelectorAll( ".selections__buttons > .directory-categories > button" );
          categoryButtons.forEach( categBtn=> {
            let btnClass = categBtn.classList[2];
            categBtn.classList.remove( "active" );
            if ( btnClass == currentSelection ) {
              categBtn.classList.add( "active" );
            }
          } );
             
          // eslint-disable-next-line max-len
          if ( categoryActive.hasAttribute( "data-active-option" ) ) {
            // eslint-disable-next-line max-len
            if ( entry.classList.contains( currentSelection ) ) {
              entry.classList.remove( "hidden" );
              alternatingRows();
            }
          }
        } );
      } );
    };
    filterByType();

    let stickyLetters = () => {
      $( window ).on( "load scroll", function() {
        let scrollYPos = $( document ).scrollTop();
        let lettersOffset = $( "#choose-letter" ).offset().top;
        if ( scrollYPos > lettersOffset ) {
          $( ".alphabet" ).removeClass( "fixed" );
          $( ".alphabet" ).addClass( "sticky" );
        }
        else {
          $( ".alphabet" ).removeClass( "sticky" );
          $( ".alphabet" ).addClass( "fixed" );
        }
      } );
      
      // smooth scroll anchor links & account for sticky header
      $( "a[href*=\\#]" ).on( "click", function( event ) {     
        event.preventDefault();
        if ( $( ".alphabet" ).hasClass( "fixed" ) ) {
          $( "html,body" ).animate( { scrollTop: $( this.hash ).offset().top - 180 }, 500 );
        }
        else if ( $( ".alphabet" ).hasClass( "sticky" ) ) {
          $( "html,body" ).animate( { scrollTop: $( this.hash ).offset().top - 70 }, 500 );
        }
      } );
    
      // $( ".js-scroll" ).click( function() {
      //   var headerHeight = 60;
    
      //   $( "html, body" ).animate( {
      //     scrollTop: $( $.attr( this, "href" ) ).offset().top - headerHeight
      //   }, 500 );
      //   return false;
      // } );
    };
    stickyLetters();

    // reorder content on mobile / desktop for a11y
    let reorderEntryPreview = () => {
      // faculty / staff
      let entryPreviews = document.querySelectorAll( ".directory__grid__indiv.profile" );
      entryPreviews.forEach( entryPreview=> {
        let leftInfo = entryPreview.querySelector( ".left-info" );
        let entryMainInfo = entryPreview.querySelector( ".main-info" );
        let entryCta = entryPreview.querySelector( ".modal-trigger" );
        let entryPhoto = entryPreview.querySelector( ".photo" );
        let entryContact = entryPreview.querySelector( ".contact-info" );

        if ( tablet.matches ) {
          leftInfo.parentNode.insertBefore( entryContact, leftInfo.nextSibling );
          entryContact.parentNode.insertBefore( entryPhoto, entryContact.nextSibling );
          entryCta.parentNode.insertBefore( entryMainInfo, entryCta );
        }
        else {
          leftInfo.parentNode.insertBefore( entryPhoto, leftInfo );
          entryCta.parentNode.insertBefore( entryContact, entryCta );
        }
      } );

      // departments
      let deptPreviews = document.querySelectorAll( ".directory__grid__indiv.department-listing" );
      deptPreviews.forEach( deptPreview=> {
        let deptLeftInfo = deptPreview.querySelector( ".left-info" );
        let deptMainInfo = deptPreview.querySelector( ".main-info" );
        let deptCta = deptPreview.querySelector( ".cta" );
        let deptPhoto = deptPreview.querySelector( ".photo" );
        let deptContact = deptPreview.querySelector( ".contact-info" );

        if ( tablet.matches ) {
          deptLeftInfo.parentNode.insertBefore( deptContact, deptLeftInfo.nextSibling );
          deptContact.parentNode.insertBefore( deptPhoto, deptContact.nextSibling );
          deptCta.parentNode.insertBefore( deptMainInfo, deptCta );
        }
        else {
          deptLeftInfo.parentNode.insertBefore( deptPhoto, deptLeftInfo );
          deptCta.parentNode.insertBefore( deptContact, deptCta );
        }
      } );
    };

    // let modalScroll = () => {
    //   // // only scroll bio scroll on bigger screens
    //   // let bioScroll = document.querySelector( ".entry-modal .bio .bio-scroll" );
    //   // let bioCustomScroll = new SimpleBar( bioScroll, { autoHide: false } );

    //   // // scroll whole modal on smaller screens
    //   // let modalScroll = document.querySelector( ".entry-modal .content .wrapper" );
    //   // let modalCustoMScroll = new SimpleBar( modalScroll, { autoHide: false } );

    //   let wrappers = document.querySelectorAll( ".entry-modal .content .wrapper" );

    //   wrappers.forEach( wrapper=> {
    //     if ( desktopSm.matches ) {
    //       console.log( "desktop-sm" );
  
    //       if ( wrapper.getAttribute( "data-simplebar" ) ) {
    //         // only scroll bio scroll on bigger screens
    //         wrapper.removeAttribute( "data-simplebar" )
    //         let bioScroll = document.querySelector( ".entry-modal .bio .bio-scroll" );
    //         let bioCustomScroll = new SimpleBar( bioScroll, { autoHide: false } );
    //         modalCustomScroll.unMount();
    //       }
    //       else {
    //         // only scroll bio scroll on bigger screens
    //         let bioScroll = document.querySelector( ".entry-modal .bio .bio-scroll" );
    //         let bioCustomScroll = new SimpleBar( bioScroll, { autoHide: false } );
    //       }
    //     }
    //     else {
    //       console.log( "nice" );

    //       let isBioScroll = wrapper.querySelector( ".bio-scroll" );

    //       if ( isBioScroll.getAttribute( "data-simplebar" ) ) {
    //         // scroll whole modal on smaller screens
    //         isBioScroll.removeAttribute( "data-simplebar" )
    //         let modalScroll = document.querySelector( ".entry-modal .content .wrapper" );
    //         let modalCustomScroll = new SimpleBar( modalScroll, { autoHide: false } );
    //         bioCustomScroll.unMount();
    //       }
    //       else {
    //         let modalScroll = document.querySelector( ".entry-modal .content .wrapper" );
    //         let modalCustomScroll = new SimpleBar( modalScroll, { autoHide: false } );
    //       }
    //     }
    //   } );
    // };

    let showModal = () => {
      let modalTriggers = document.querySelectorAll( ".modal-trigger" );
      modalTriggers.forEach( modalTrigger=> {
        let modalBtn = modalTrigger.querySelector( ".btn" );
        modalBtn.addEventListener( "click", ()=> {
          MicroModal.show( "entry-modal" ); 
          $( "html" ).addClass( "no-scroll" );
        } );
      } );

      // let deptModalTriggers = document.querySelectorAll( ".department-listing .contact-info button" );
      // deptModalTriggers.forEach((deptModalTrigger)=> {
      //   deptModalTrigger
      // })

      let dialogOverlays = document.querySelectorAll( ".modal .dialog" );
      dialogOverlays.forEach( overlay=> {
        console.log( overlay );
        overlay.addEventListener( "click", ()=> {
          if ( $( ".entry-modal" ).hasClass( "is-open" ) ) {
            MicroModal.close( "entry-modal" );
          }
          else if ( $( ".dept-modal" ).hasClass( "is-open" ) ) {
            MicroModal.close( "dept-modal" );
          }
         
          $( "html" ).removeClass( "no-scroll" );
        } );

        // prevent clicking on actual modal to exit
        let actualContent = overlay.querySelector( ".dialog .content .content-bg" );
        actualContent.addEventListener( "click", e=> {
          e.stopPropagation();
        } );

        let contentWrapper = overlay.querySelector( ".dialog .content" );
        contentWrapper.addEventListener( "click", e=> {
          e.stopPropagation();
        } );
      } );

      // close with x button
      let modalCloseBtns = document.querySelectorAll( ".directory__grid__indiv .modal-close" );
      modalCloseBtns.forEach( btn=> {
        btn.addEventListener( "click", ()=> {
          console.log( e.currentTarget );
          if ( $( "entry-modal" ).hasClass( "is-open" ) ) {
            MicroModal.close( "entry-modal" );
          }
          else if ( $( ".dept-modal" ).hasClass( "is-open" ) ) {
            MicroModal.close( "dept-modal" );
          }
        } );
      } );

      // close on actual overlay click 
      let overlays = document.querySelectorAll( ".modal .overlay" );
      overlays.forEach( overlay=> {
        console.log( overlay );
        overlay.addEventListener( "click", ()=> {
          if ( $( ".entry-modal" ).hasClass( "is-open" ) ) {
            MicroModal.close( "entry-modal" );
          }
          else if ( $( ".dept-modal" ).hasClass( "is-open" ) ) {
            MicroModal.close( "dept-modal" );
          }
         
          $( "html" ).removeClass( "no-scroll" );
        } );
      } );
    
      // close on escape
      $( document ).keydown( function( e ) {
        if ( e.key === "Escape" ) { // escape key maps to keycode `27`
          $( "html" ).removeClass( "no-scroll" );
        }
      } );
    };
    showModal();

    // alternate row colors dynamically
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
