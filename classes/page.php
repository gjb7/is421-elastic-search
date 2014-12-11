<?php
	namespace classes;
	
	abstract class page{
		public $content;

		public function __construct(){
			
		}
		public function __destruct(){
			$this->heading();
			echo $this->content;
		}
		public function get(){

		}
	}
?>