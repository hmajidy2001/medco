$j = jQuery.noConflict();

$j(document).ready(function() {
	// setting the tabs in the sidebar hide and show, setting the current tab
	$j('div.suf-mag-headlines div.suf-mag-headline-photo').hide();
	$j('div.suf-mag-headline-photo-first').show();
	$j('div.suf-mag-headline-block ul.mag-headlines li.suf-mag-headline-first a').addClass('tab-current');

	// SIDEBAR TABS
	$j('div.suf-mag-headline-block ul.mag-headlines li a').mouseover(function(){
		var thisClass = this.className.substring(17, this.className.indexOf(" "));
		$j('div.suf-mag-headlines div.suf-mag-headline-photo').hide();
		//$j('div.suf-mag-headline-photo-' + thisClass).fadeIn(300);
		$j('div.suf-mag-headline-photo-' + thisClass).show();
		$j('div.suf-mag-headline-block ul.mag-headlines li a').removeClass('tab-current');
		$j(this).addClass('tab-current');
	});
});

