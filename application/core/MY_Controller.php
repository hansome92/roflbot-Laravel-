<?php
/**
 * This file contains the Base Controller Class file.
 *
 * @author Laurence
 * @version
 */
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
	parent::__construct();
    }
}

class AdminController extends MY_Controller
{
    public $data = array();

    public function __construct() {
	    parent::__construct();
        
	    $this->template->set_layout('main_template');
        $this->data['mode'] = $this->session->userdata('mode');
        $this->data['site_logo']= 'logo.jpg'; 
        $this->data['site_name']= 'Roflbot';        
		if($this->router->class !='dashboard') redirect('dashboard');        
    }
}

class FrontControler extends MY_Controller{
    
    public $data = array();      
    public function __construct()
    {                                                      
		parent::__construct();
		$this->data['site_logo']= 'logo.jpg'; 
		$this->data['site_name']= 'Roflbot';       
		
		$this->data['mode'] = $this->session->userdata('mode');
		$this->template->set_layout('main_template');
    }
}

?>
