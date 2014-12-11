<?php
	namespace classes;
	use \classes\page as page;

	class searchtext extends page{
		public function heading(){
			$this->content .= '
			<div class="container">
				<h2>Search text by String<h2>
			</div>';
		}
	}
?>
