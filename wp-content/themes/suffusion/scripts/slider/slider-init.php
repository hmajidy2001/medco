<?php
Header("content-type: application/x-javascript");
$fx = $_REQUEST['fx'];
$timeout = $_REQUEST['timeout'];
$speed = $_REQUEST['speed'];
$pause = $_REQUEST['pause'];
$resume = $_REQUEST['resume'];
?>
$j = jQuery.noConflict();
$j(document).ready(function() { 
	$j('#sliderContent').cycle({ 
		fx: '<?php echo $fx; ?>',
		timeout: <?php echo $timeout; ?>,
//		delay: -<?php echo $timeout; ?>,
		speed: <?php echo $speed; ?>,
		pause: 1,
		sync: 0,
		pager: '#sliderPager',
		prev: 'a.sliderPrev',
		next: 'a.sliderNext'
	}); 

	$j('a.sliderPause').click(
		function() {
			if ($j(this).text() == '<?php echo $pause;?>') {
				$j('#sliderContent').cycle('pause');
				$j('a.sliderPause').addClass('activeSlide');
				$j(this).text('<?php echo $resume;?>');
			}
			else {
				$j('#sliderContent').cycle('resume');
				$j('a.sliderPause').removeClass('activeSlide');
				$j(this).text('<?php echo $pause;?>');
			}
			return false;
		}
	);
});


