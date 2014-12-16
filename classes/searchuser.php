<?php
	namespace classes;
	use \classes\page as page;

	class searchuser extends page{
		public function heading(){
			$this->content .= '
			<div class="container">
				<h2>Search text by String and User<h2>
			</div>
			<div class="container">
				Search text: <input type="text" name="search" id="search">
				Search user: <input type="text" name="user" id="user">
				<input type="submit" name="submit" id="submit">
			</div>';
		}
	}
?>
