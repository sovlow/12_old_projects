<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Lap_pusdatin extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pusdatin');
    }

    


    public function index_get()
    {
			$response = array(
				'lap_pusdatin_berita_opec_harian'   => $this->M_pusdatin->select_pusdatin_berita_opec_harian(),
				'lap_pusdatin_harga_bbm' 	        => $this->M_pusdatin->select_pusdatin_harga_bbm(),
				'lap_pusdatin_harga_bb_acuan'       => $this->M_pusdatin->select_pusdatin_harga_bb_acuan(),
				'lap_pusdatin_harga_mineral_acuan' 	=> $this->M_pusdatin->select_pusdatin_harga_mineral_acuan(),
                'lap_pusdatin_icp'	                => $this->M_pusdatin->select_pusdatin_icp(),
                'lap_pusdatin_lift_tb' 	            => $this->M_pusdatin->select_pusdatin_lift_tb(),
				'lap_pusdatin_prod_ekui_migas' 	    => $this->M_pusdatin->select_pusdatin_prod_ekui_migas(),
				'lap_pusdatin_prod_gas' 	        => $this->M_pusdatin->select_pusdatin_prod_gas(),
				'lap_pusdatin_prod_minyak' 	        => $this->M_pusdatin->select_pusdatin_prod_minyak(),
                'lap_pusdatin_prog_peny_prem_jamali'=> $this->M_pusdatin->select_pusdatin_prog_peny_prem_jamali(),
                'lap_pusdatin_stts_tl'	=> $this->M_pusdatin->select_pusdatin_stts_tl()     
			);
	
				
			$this->output
			->set_status_header(200)
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
			exit;


		

    }

    
}

?>