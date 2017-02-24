<?php 
		/*
		-------------------header-------------------
		$data[header_data][title] = value
		
		*/
		$this->load->view('theme/header', $header_data, FALSE);
		$this->load->view('theme/menu', $menu_data, FALSE);
		$this->load->view($content_view, $content_data, FALSE);	
		$this->load->view('theme/footer', $footer_data, FALSE);
?>