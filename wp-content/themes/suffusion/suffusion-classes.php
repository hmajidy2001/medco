<?php
class Suf_Navigation_Structure {
	var $ID;
	var $title;
	var $link;
	var $depth;
	var $type;
	var $children;

	function Suf_Navigation_Structure($ID, $title, $link, $depth, $type = 'page') {
		$this->ID = $ID;
		$this->title = $title;
		$this->link = $link;
		$this->depth = $depth;
		$this->type = $type;
	}
}
?>
