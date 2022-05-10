<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_klik extends AUTH_SUPER_ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_role');
		$this->load->model('M_klik');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "klik";
		$data['judul'] 		= "Entry Laporan Klik";
		$data['deskripsi'] 	= "Entry Laporan Klik";
		$data['jenis_laporan'] = $this->M_klik->select_all_jenis_laporan();
		$data['modal_add_gunung'] = show_my_modal('Admin/klik/modal_view_all', 'tambah-gunung', $data);
		$this->template->views('Admin/klik/home', $data);
	}

	public function tampil() {
		$data['dataAdmin'] = $this->M_admin->select_all();
		$this->load->view('Admin/Admin/list_data', $data);
	}
	
	public function show_form($ID_JENIS_LAPORAN="") {
		$data['jenis_berita'] = $this->M_klik->select_all_jenis_berita();
		$this->load->view('Admin/klik/modal_' . $ID_JENIS_LAPORAN, $data);
	}
	
	public function show_form_draft($ID_JENIS_LAPORAN="") {
		if($ID_JENIS_LAPORAN == 1){
			$table = "r_lap_klik_migas";
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_klik_minerba";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_klik_gatrik";
		}else if($ID_JENIS_LAPORAN == 4){
			$table = "r_lap_klik_ebtke";
		}else if($ID_JENIS_LAPORAN == 5){
			$table = "r_lap_klik_geologi";
		}
		
		$data['dataSet'] = $this->M_klik->select_by_jenis_draft($table);
		$id_user = $this->session->userdata('userdata')->ID_USER;
		$data['IS_POST'] = $this->M_admin->select_user_is_post($id_user)->IS_POST;
		$this->load->view('Admin/klik/lap' . $ID_JENIS_LAPORAN, $data);
	}
	
	public function show_form_history($ID_JENIS_LAPORAN="",$TANGGAL_AWAL="",$TANGGAL_AKHIR="") {
		if($ID_JENIS_LAPORAN == 1){
			$table = "r_lap_klik_migas";
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_klik_minerba";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_klik_gatrik";
		}else if($ID_JENIS_LAPORAN == 4){
			$table = "r_lap_klik_ebtke";
		}else if($ID_JENIS_LAPORAN == 5){
			$table = "r_lap_klik_geologi";
		}
		
		$data['dataSet'] = $this->M_klik->select_by_jenis_history($table,$TANGGAL_AWAL,$TANGGAL_AKHIR);
		$id_user = $this->session->userdata('userdata')->ID_USER;
		$data['IS_POST'] = $this->M_admin->select_user_is_post($id_user)->IS_POST;
		$this->load->view('Admin/klik/his' . $ID_JENIS_LAPORAN, $data);
	}

	public function prosesTambah() {
		//$this->form_validation->set_rules('ID_JENIS_LAPORAN', 'ID_JENIS_LAPORAN', 'trim|required');

		$data = $this->input->post();
	
		if($data['ID_JENIS_LAPORAN'] == 1){
			$table = "r_lap_klik_migas";
		}else if($data['ID_JENIS_LAPORAN'] == 2){
			$table = "r_lap_klik_minerba";
		}else if($data['ID_JENIS_LAPORAN'] == 3){
			$table = "r_lap_klik_gatrik";
		}else if($data['ID_JENIS_LAPORAN'] == 4){
			$table = "r_lap_klik_ebtke";
		}else if($data['ID_JENIS_LAPORAN'] == 5){
			$table = "r_lap_klik_geologi";
		}
		
		unset($data["ID_JENIS_LAPORAN"]);
		$stat = array(
			'USER_ENTRY' => $this->session->userdata('userdata')->ID_USER,
			'TANGGAL_ENTRY' => date("Y-m-d H:m:s"),
			'FLATFORM_ENTRY' => "WEB"
		);
		$data = array_merge($data,$stat);
		$data["TANGGAL_LAPORAN"] = date("Y-m-d",strtotime($data["TANGGAL_LAPORAN"]));
		
		$result = $this->M_klik->insert($data,$table);

		if ($result > 0) {
			$out['status'] = '';
			$out['msg'] = show_succ_msg('Data Draft Laporan Berhasil ditambahkan', '20px');
		} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Data Draft Laporan Gagal ditambahkan', '20px');
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataRole'] = $this->M_role->select_all();
		$data['admin']	= $this->M_admin->select_by_id($id);

		echo show_my_modal('Admin/Admin/modal_update_admin', 'update-admin', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('USERNAME', 'Username', 'trim|required');
		$this->form_validation->set_rules('EMAIL', 'E-Mail', 'trim|required');
		$this->form_validation->set_rules('ID_ROLE', 'Role', 'trim|required');
		$this->form_validation->set_rules('NAMA', 'Nama', 'trim|required');
		$this->form_validation->set_rules('JABATAN_STRUKTURAL', 'Jabatan Struktural', 'trim|required');
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('IS_ADMIN', 'Admin', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_admin->update($data);

			if ($result === TRUE) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data User Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data User Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function post() {
		$id = $_POST['id'];
		$ID_JENIS_LAPORAN = $_POST['ID_JENIS_LAPORAN'];
		$id_user = $this->session->userdata('userdata')->ID_USER;
		
		if($ID_JENIS_LAPORAN == 1){
			$table = "r_lap_klik_migas";
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_klik_minerba";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_klik_gatrik";
		}else if($ID_JENIS_LAPORAN == 4){
			$table = "r_lap_klik_ebtke";
		}else if($ID_JENIS_LAPORAN == 5){
			$table = "r_lap_klik_geologi";
		}
		$result = $this->M_klik->post($table, $id, $id_user);

		if ($result > 0) {
			echo show_succ_msg('Data Laporan Berhasil diPosting', '20px');
		} else {
			echo show_err_msg('Data Laporan Gagal diPosting', '20px');
		}
	}
}