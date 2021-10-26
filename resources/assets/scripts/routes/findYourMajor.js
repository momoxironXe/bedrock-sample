import Combobo from "combobo";

export default {
  init() {
    // comboboxes
    const comboboEducation = new Combobo( {
      input:          "#education-level",
      list:           ".listbox.education",
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
    const comboboProgram = new Combobo( {
      input:          "#program",
      list:           ".listbox.program",
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
      let programsVisible = $( ".programs__grid__indiv:visible" );
      let programsHidden = $( ".programs__grid__indiv:hidden" );
      programsHidden.removeClass( "gray-bg" );
      programsVisible.odd().addClass( "gray-bg" );
    };
    alternatingRows();

    // clear all selections
    let clearAll = ()=> {
      let clearAllButton = document.querySelector( "button#clear-all" );
      clearAllButton.addEventListener( "click", ()=> {
        // pass in all programs & show all
        let programs = document.querySelectorAll( ".programs__grid__indiv" );
        programs.forEach( program=> {
          program.classList.remove( "hidden" );
          program.classList.remove( "open" );
          let clearPrograms = $( ".programs__grid__indiv" );
          clearPrograms.removeClass( "gray-bg" );
          clearPrograms.odd().addClass( "gray-bg" );
        } );
        // add open class back to first program
        let firstProgram = programs[0];
        firstProgram.classList.add( "open" );
        // pass in search field & remove input
        let searchField = document.querySelector( "input#program-search" );
        searchField.value = "";
        comboboEducation.reset();
        comboboProgram.reset();
      } );
    };
    clearAll();

    // search majors
    let searchFunction = () => {
      // pass in all programs
      let programs = document.querySelectorAll( ".programs__grid__indiv" );
      programs.forEach( program=> {
        let programTitle = program.querySelector( "h3.label-heading" ).innerText.toLowerCase();
        let programType = program.querySelector( "span.type" ).innerText.toLowerCase();
        let programDept = program.querySelector( "span.department" ).innerText.toLowerCase();
        let programDesc = program.querySelector( "p.desc" ).innerText.toLowerCase();
       
        // define search field
        let searchField = document.querySelector( "input#program-search" );
        // capture user input
        searchField.addEventListener( "input", ()=> {
          comboboEducation.reset();
          comboboProgram.reset();
          let rawUserInput = searchField.value;
          let userInput = rawUserInput.toLowerCase();
          program.classList.add( "hidden" );
          program.classList.remove( "open" );
          program.classList.remove( "gray-bg" );
          // eslint-disable-next-line max-len
          if ( programTitle.includes( userInput ) || programType.includes( userInput ) || programDept.includes( userInput ) || programDesc.includes( userInput ) ) {
            program.classList.remove( "hidden" );
            alternatingRows();
          }
        } );
      } );
    };
    searchFunction();

    let filterByType = () => {
      // default array of choices - will be replaced when selections are made
      let currentSelectionArray = [ "education selection", "program selection" ];
      let currentSelectionEducation;
      let currentSelectionProgram;

      let educationActive = document.querySelector( "input#education-level" );
     
      let programActive = document.querySelector( "input#program" );

      // make it work on tablet by linking buttons to dropdown choices
      if ( $( ".selections__buttons" ).is( ":visible" ) ) {
        // eslint-disable-next-line max-len
        let educationButtons = document.querySelectorAll( ".selections__buttons > .education-level > button" );
        let currentEducationLevel;
        educationButtons.forEach( ( educationButton, index )=> {
          educationButton.addEventListener( "click", e=> {
            educationButton.classList.remove( "active" );
            // pass in search field & remove input
            let searchField = document.querySelector( "input#program-search" );
            searchField.value = "";
            educationButtons.forEach( eduBtn=> {
              eduBtn.classList.remove( "active" );
            } );
            comboboEducation.reset();
            currentEducationLevel = e.target.closest( "button" ).classList[2].toLowerCase();
            comboboEducation.goTo( comboboEducation.getOptIndex() + index ).select();
            e.target.closest( "button" ).classList.add( "active" );
          } );
        } );
        let programButtons = document.querySelectorAll( ".selections__buttons > .program-type > button" );
        let currentProgramType;
        programButtons.forEach( ( programButton, index )=> {
          programButton.addEventListener( "click", e=> {
            programButton.classList.remove( "active" );
            // pass in search field & remove input
            let searchField = document.querySelector( "input#program-search" );
            searchField.value = "";
            programButtons.forEach( prgrmBtn=> {
              prgrmBtn.classList.remove( "active" );
            } );
            comboboProgram.reset();
            currentProgramType = e.target.closest( "button" ).classList[2].toLowerCase();
            comboboProgram.goTo( comboboProgram.getOptIndex() + index ).select();
            e.target.closest( "button" ).classList.add( "active" );
          } );
        } );
       
        // remove active class if using  search
        let searchField = document.querySelector( "input#program-search" );
        // capture user input
        searchField.addEventListener( "input", ()=> {
          educationButtons.forEach( eduBtn=> {
            eduBtn.classList.remove( "active" );
          } );
          programButtons.forEach( prgrmBtn=> {
            prgrmBtn.classList.remove( "active" );
          } );
        } );
        //remove active class if using clear all
        let clearAllButton = document.querySelector( "button#clear-all" );
        clearAllButton.addEventListener( "click", ()=> {
          educationButtons.forEach( eduBtn=> {
            eduBtn.classList.remove( "active" );
          } );
          programButtons.forEach( prgrmBtn=> {
            prgrmBtn.classList.remove( "active" );
          } );
        } );
      }

      // pass in all programs
      let programs = document.querySelectorAll( ".programs__grid__indiv" );
      programs.forEach( program=> {
        // listen for selection
        comboboEducation.addEventListener( "selection", e=> {
          // empty search field
          let searchField = document.querySelector( "input#program-search" );
          searchField.value = "";
          // replace education with new selection
          program.classList.add( "hidden" );
          program.classList.remove( "open" );
          program.classList.remove( "gray-bg" );
          currentSelectionArray.shift();
          let educationCurrentSelection = e.option.classList[1];
          currentSelectionArray.unshift( educationCurrentSelection );
          currentSelectionEducation = currentSelectionArray[0];

          // select button on desktop when you select on mobile=
          let educationBtns = document.querySelectorAll( ".education-level > button" );
          educationBtns.forEach( btn=> {
            let btnClass = btn.classList[2];
            btn.classList.remove( "active" );
            if ( btnClass == currentSelectionEducation ) {
              btn.classList.add( "active" );
            }
          } );
        
          // eslint-disable-next-line max-len
          if ( educationActive.hasAttribute( "data-active-option" ) && programActive.hasAttribute( "data-active-option" ) ) {
            // eslint-disable-next-line max-len
            if ( program.classList.contains( currentSelectionEducation ) && program.classList.contains( currentSelectionProgram ) ) {
              program.classList.remove( "hidden" );
              alternatingRows();
            }
          }
          // eslint-disable-next-line max-len
          else if ( educationActive.hasAttribute( "data-active-option" ) && !programActive.hasAttribute( "data-active-option" ) ) {
            if ( program.classList.contains( currentSelectionEducation ) ) {
              program.classList.remove( "hidden" );
              alternatingRows();
            }
          }
        } );
        comboboProgram.addEventListener( "selection", e=> {
          // empty search field
          let searchField = document.querySelector( "input#program-search" );
          searchField.value = "";
          // replace program with new selection
          program.classList.add( "hidden" );
          program.classList.remove( "open" );
          program.classList.remove( "gray-bg" );
          currentSelectionArray.pop();
          let programCurrentSelection = e.option.classList[1];
          currentSelectionArray.push( programCurrentSelection );
          currentSelectionProgram = currentSelectionArray[1] ;

          // select button on desktop when you select on mobile=
          let programBtns = document.querySelectorAll( ".program-type > button" );
          programBtns.forEach( btn=> {
            let btnClass = btn.classList[2];
            btn.classList.remove( "active" );
            
            if ( btnClass == currentSelectionProgram ) {
              btn.classList.add( "active" );
            }
          } );

          // eslint-disable-next-line max-len
          if ( educationActive.hasAttribute( "data-active-option" ) && programActive.hasAttribute( "data-active-option" ) ) {
            // eslint-disable-next-line max-len
            if ( program.classList.contains( currentSelectionEducation ) && program.classList.contains( currentSelectionProgram ) ) {
              program.classList.remove( "hidden" );
              alternatingRows();
            }
          }
          // eslint-disable-next-line max-len
          else if ( programActive.hasAttribute( "data-active-option" ) && !educationActive.hasAttribute( "data-active-option" ) ) {
            if ( program.classList.contains( currentSelectionProgram ) ) {
              program.classList.remove( "hidden" );
              alternatingRows();
            }
          }
        } );
      } );
    };
    filterByType();
   
    // program + major accordion for mobile
    let programAccordion = () => {
      let programToggles = document.querySelectorAll( "button.program-toggle" );
      programToggles.forEach( toggle=> {
        toggle.addEventListener( "click", e=> {
          let accordionItem = e.target.closest( ".programs__grid__indiv" );
          accordionItem.classList.toggle( "open" );
        } );
      } );
    };
    programAccordion ();

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

    // alternate row colors dynamically
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
