import Combobo from "combobo";

export default {
  init() {
    const comboboDate = new Combobo( {
      input:          "#filter-by-date",
      list:           ".listbox.date",
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
    const comboboSubject = new Combobo( {
      input:          "#filter-by-subject",
      list:           ".listbox.subject",
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

    // clear all selections
    let clearAll = ()=> {
      let clearAllButton = document.querySelector( "button#clear-all" );
      clearAllButton.addEventListener( "click", ()=> {
        // pass in search field & remove input
        let searchField = document.querySelector( "input#filter-search" );
        searchField.value = "";
        comboboDate.reset();
        comboboSubject.reset();
      } );
    };
    clearAll();

    // select publication accordion
    // program + major accordion for mobile
    let publicationAccordion = () => {
      let pubToggles = document.querySelectorAll( "button.pub-toggle" );
      pubToggles.forEach( toggle=> {
        toggle.addEventListener( "click", e=> {
          let allItems = document.querySelectorAll( ".select-pub__grid__indiv" );
          allItems.forEach( item=> {
            item.classList.remove( "open" );
          } );
          let accordionItem = e.target.closest( ".select-pub__grid__indiv" );
          accordionItem.classList.add( "open" );
        } );
      } );
    };
    publicationAccordion ();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
