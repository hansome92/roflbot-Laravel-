<?php
/**
 * This file contains the Dashboard Class file.
 *
 * @author Laurence
 * @version
 */
class Dashboard extends AdminController {
    
    public function __construct() {
        $common = new gCMSCommon();
        parent::__construct();                
    }
    
    public function index($msg = '') {
		$this->data['title'] = 'Dashboard';
		$this->data['msg'] = $msg;
        $this->template->build('dashboard', $this->data);
    }

	public function upload() {        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$common = new gCMSCommon();
            $config = array();
			$config['upload_path'] = $common->getLabel('LBL_USER_UPLOAD', "en");
			$config['allowed_types'] = $common->getLabel('LBL_USER_UPLOADTYPE', "en");
			$config['max_size']    = $common->getLabel('LBL_USER_UPLOAD_MS', "en");
			$config['max_width']  = $common->getLabel('LBL_USER_UPLOAD_MW', "en");
			$config['max_height']  = $common->getLabel('LBL_USER_UPLOAD_MH', "en");
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload("img")) {
				$error = array('error' => $this->upload->display_errors());
			}else {
				$D = @getimagesize($this->upload->file_temp);				
				$this->data['filename'] = $this->upload->file_name;				
				$this->data['img_width'] = $D['0'];				
				$this->data['img_height'] = $D['1'];				
				$this->index();
			}
		}
	}

	public function ajaxsave() {
		$common = new gCMSCommon();
		$savepath = $common->getLabel('LBL_USER_DOWNLOAD', "en");
		$this->load->helper('file');
		$filename = $_POST['filename'];
		$img = $_POST['imagedata'];		
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$filename = date('y-m-d H-i-s', time()).$filename;
		if (!write_file($savepath.$filename, $data)) {
			 echo 'failure';
		}else {
			 echo $filename;
		}	
	}

	public function download() {
		$common = new gCMSCommon();
		$downloadpath = $common->getLabel('LBL_USER_DOWNLOAD', "en");
		$this->load->helper('download');
		$filename = $this->input->post('savedfilename');		
		if(file_exists($downloadpath.$filename)) {
			$data = file_get_contents($downloadpath.$filename);		
			force_download($filename, $data);
		}
	}

	public function help() {
        $this->data['msg'] = "Richard's Roflbot";
        $this->template->set_layout('');
        $this->template->build('help', $this->data);
    }
}
?>
