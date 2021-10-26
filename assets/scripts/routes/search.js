import Combobo from "combobo";

export default {
  init() {
    const comboboSearchFilter = new Combobo( {
      input:          "#search-filter",
      list:           ".listbox.search",
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

    let clearAll = ()=> {
      let clearAllButton = document.querySelector( "button#clear-all" );
      clearAllButton.addEventListener( "click", ()=> {
        comboboSearchFilter.reset();
        let searchField = document.querySelector( "input#search-field" );
        searchField.value = "";
      } );
    };
    clearAll();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  }
};
