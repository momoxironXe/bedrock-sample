
(function(factory) {
	'use strict';

	if( document.querySelector('input[type="file"]') ) {
		factory(window.Clique);
	}
})(function(_c) {
	'use strict';

	// vars
	var inputs = document.querySelectorAll('input[type="file"]');
	var $inputs = _c.$(inputs);

	// functions
	function multipleFiles($button, filelist) {
		$button.text( filelist.length + ' Files Selected' );
	}

	function singleFile($button, file) {
		$button.text( file.name );
	}

	function createFalseInput(i, input) {
		var $input = _c.$(input);
		var $button = _c.$('<button class="button file-upload">Select File</button>');
		$input.before( $button );
		$input.on('change', function() {
			if( this.files.length > 1 ) {
				multipleFiles($button, this.files);
			} else {
				singleFile($button, this.files[0]);
			}
		});
	}

	function onRender() {
		$inputs.each(createFalseInput);
	}

	// execute
	_c.$doc.one('ready.file_upload', onRender);
	_c.$doc.on('gform_post_render', onRender);

});
