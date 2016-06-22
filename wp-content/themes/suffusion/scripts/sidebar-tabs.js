$j = jQuery.noConflict();

$j(document).ready(function() {
	// setting the tabs in the sidebar hide and show, setting the current tab
	$j('div.tab-box div.sidebar-tab-content').hide();
	$j('div.sbtab-content-first').show();
	$j('div.tab-box ul.sidebar-tabs li.sbtab-first a').addClass('tab-current');

	// SIDEBAR TABS
	$j('div.tab-box ul.sidebar-tabs li a').click(function(){
		var thisClass = this.className.substring(6, this.className.indexOf(" "));
		$j('div.tab-box div').hide();
		$j('div.sbtab-content-' + thisClass).show();
		$j('div.tab-box ul.sidebar-tabs li a').removeClass('tab-current');
		$j(this).addClass('tab-current');
	});
});

