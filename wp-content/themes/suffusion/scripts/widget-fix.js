$j = jQuery.noConflict();

$j(document).ready(function() {
	$j('.dbx-handle').each(function() {
		$j(this).prependTo(this.parentNode.parentNode);
	});
});
