<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
	public function template($template_name, $vars = array(), $return = FALSE)
	{
		if ($return) :
			$content   = $this->view('template/header', $vars, $return);
			$content  .= $this->view('template/sidebar', $vars, $return);
			$content  .= $this->view($template_name, $vars, $return);
			$content  .= $this->view('template/footer', $vars, $return);

			return $content;
		else :
			$this->view('template/header', $vars);
			$this->view('template/sidebar', $vars);
			$this->view($template_name, $vars);
			$this->view('template/footer', $vars);
		endif;
	}
}
