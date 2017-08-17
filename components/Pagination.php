<?php

	/**
	* Pagination
	*/
	class Pagination
	{
		const MAXLINK = 10;		

		private $currentPage;
		private $index = 'page';
		private $total;
		private $limit;

		function __construct($currentPage, $index, $total, $limit)
		{
			$this->total = $total;
			$this->limit = $limit;
			$this->index = $index;
			$this->amountPage = $this->amountPage();
			$this->setCurrentPage($currentPage);
		}
		public function get()
		{
			$links = null;
			$limits = $this->limits();

			$view = '<ul class="pagination">';

			for ($page = $limits[0]; $page  < $limits[1]; $page++) { 
				if($page == $this->currentPage){
					$links .= '<li class="active">' . $page . '</li>';
				}else{
					$links .= $this->getLinks($page);				 	
				}
			}
			if(!is_null($links)){
				if($this->currentPage > 1){
					$links = $this->getLinks(1, '&lt;') . $links;
				}
				if($this->currentPage < $this->amountPage){
					$links .= $this->getLinks($this->amountPage, '&gt;');
				}
			}
			$view .= $links . '</ul>';
			
			return $view;
		}
		private function getLinks($page, $text = null)
		{
			if(is_null($text)){
				$text = $page;
			}
			$currentUri = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
			$currentUri = preg_replace('~/page-[0-9]+~', '', $currentUri);

			$view = '<li><a href="' . $currentUri . $this->index . $page . '">' . $text . '</a></li>';
			return $view;
		}
		private function limits()
		{
			$left = $this->currentPage - round(self::MAXLINK / 2);

			$start = $left > 0 ? $left : 1;

			if($start + self::MAXLINK <= $this->amountPage){
				$end = $star > 1 ? $start +self::MAXLINK : self::MAXLINK;
			}else{
				$end = $this->amountPage;
				$start = $this->amountPage - self::MAXLINK > 0 ? $this->amountPage - self::MAXLINK : 1;
			}
			return [$start, $end];
		}
		private function setCurrentPage($currentPage)
		{
			$this->currentPage = $currentPage;

			if($this->currentPage > 0){
				if($this->currentPage > $this->amountPage){
					$this->currentPage = $this->amountPage;
				}
			}else{
				$this->currentPage = 1;
			}
		}
		private function amountPage()
		{
			return ceil($this->total / $this->limit);
		}
	}
?>