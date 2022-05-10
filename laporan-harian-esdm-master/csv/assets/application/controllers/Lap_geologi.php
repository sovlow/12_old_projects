<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_geologi extends AUTH_SUPER_ADMIN_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_role');
		$this->load->model('M_geologi');
	}
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->M_geologi->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$csvreader = PHPExcel_IOFactory::createReader('CSV');
				$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
				$sheet = $loadcsv->getActiveSheet()->getRowIterator();
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$this->load->view('Admin/geologi/form', $data);
		
		//$this->template->views('Admin/geologi/home', $data);
	}
	
	/*public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$csvreader = PHPExcel_IOFactory::createReader('CSV');
		$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
		$sheet = $loadcsv->getActiveSheet()->getRowIterator();
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// START -->
				// Skrip untuk mengambil value nya
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
				
				$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
				foreach ($cellIterator as $cell) {
					array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
				}
				// <-- END
				
				// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
				$nis = $get[0]; // Ambil data NIS dari kolom A di csv
				$nama = $get[1]; // Ambil data nama dari kolom B di csv
				$jenis_kelamin = $get[2]; // Ambil data jenis kelamin dari kolom C di csv
				$alamat = $get[3]; // Ambil data alamat dari kolom D di csv
				
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'nis'=>$nis, // Insert data nis
					'nama'=>$nama, // Insert data nama
					'jenis_kelamin'=>$jenis_kelamin, // Insert data jenis kelamin
					'alamat'=>$alamat, // Insert data alamat
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->SiswaModel->insert_multiple($data);
		
		redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}*/

	

	public function index() {
		$data['userdata'] 	= $this->userdata;

		$data['page'] 		= "geologi";
		$data['judul'] 		= "Entry Laporan Geologi";
		$data['deskripsi'] 	= "Entry Laporan Geologi";
		$data['jenis_laporan'] = $this->M_geologi->select_all_jenis_laporan();
		
		$data['modal_add_gunung'] = show_my_modal('Admin/geologi/modal_view_all', 'tambah-gunung', $data);

		$this->template->views('Admin/geologi/home', $data);
	}

	public function show_form($ID_JENIS_LAPORAN="") {
		$data['gunungSet'] = $this->M_geologi->select_all_gunung();
		$data['aktivitasSet'] = $this->M_geologi->select_all_aktivitas();
		$this->load->view('Admin/geologi/modal_' . $ID_JENIS_LAPORAN,$data);
	}
	
	public function tampil() {
		$data['dataGunung'] = $this->M_gunung->select_all();
		$this->load->view('Admin/Lap_geologi/home', $data);
	}
	
	public function show_form_draft($ID_JENIS_LAPORAN="") {
		$select = "";
		$join ="";
		if($ID_JENIS_LAPORAN == 1){
			$join = array();
			$table = "r_lap_geologi_gunung_api a";
			$select  = "b.NAMA_GUNUNG, c.LEVEL";
			$stat = array(
				'tabel' => "t_gunung b",
				'idon' => "a.ID_GUNUNG = b.ID_GUNUNG",
			);
			array_push($join, $stat);
			$stat = array(
				'tabel' => "t_aktivitas c",
				'idon' => "a.ID_AKTIVITAS = c.ID_AKTIVITAS",
			);
			array_push($join, $stat);
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_geologi_gerakan_tanah a";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_geologi_gempa_bumi a";
		}
		
		$data['dataSet'] = $this->M_geologi->select_by_jenis_draft($table,$select,$join);
		$id_user = $this->session->userdata('userdata')->ID_USER;
		$data['IS_POST'] = $this->M_admin->select_user_is_post($id_user)->IS_POST;
		$this->load->view('Admin/geologi/lap' . $ID_JENIS_LAPORAN, $data);
	}


	public function show_form_draft_json($ID_JENIS_LAPORAN="") {
		$select = "";
		$join ="";
		if($ID_JENIS_LAPORAN == 1){
			$join = array();
			$table = "r_lap_geologi_gunung_api a";
			$select  = "b.NAMA_GUNUNG, c.LEVEL";
			$stat = array(
				'tabel' => "t_gunung b",
				'idon' => "a.ID_GUNUNG = b.ID_GUNUNG",
			);
			array_push($join, $stat);
			$stat = array(
				'tabel' => "t_aktivitas c",
				'idon' => "a.ID_AKTIVITAS = c.ID_AKTIVITAS",
			);
			array_push($join, $stat);
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_geologi_gerakan_tanah a";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_geologi_gempa_bumi a";
		}
		
		$data['dataSet'] = $this->M_geologi->select_by_jenis_draft_json($table,$select,$join);
		$id_user = $this->session->userdata('userdata')->ID_USER;
		$data['IS_POST'] = $this->M_admin->select_user_is_post_json($id_user)->IS_POST;
		$this->load->view('Admin/geologi/lap' . $ID_JENIS_LAPORAN, $data);
	}
	
	public function show_form_history($ID_JENIS_LAPORAN="",$TANGGAL_AWAL="",$TANGGAL_AKHIR="") {
		$select = "";
		$join ="";
		if($ID_JENIS_LAPORAN == 1){
			$join = array();
			$table = "r_lap_geologi_gunung_api a";
			$select  = "b.NAMA_GUNUNG, c.LEVEL";
			$stat = array(
				'tabel' => "t_gunung b",
				'idon' => "a.ID_GUNUNG = b.ID_GUNUNG",
			);
			array_push($join, $stat);
			$stat = array(
				'tabel' => "t_aktivitas c",
				'idon' => "a.ID_AKTIVITAS = c.ID_AKTIVITAS",
			);
			array_push($join, $stat);
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_geologi_gerakan_tanah a";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_geologi_gempa_bumi a";
		}
		
		$data['dataSet'] = $this->M_geologi->select_by_jenis_history($table,$select,$join,$TANGGAL_AWAL,$TANGGAL_AKHIR);
		$id_user = $this->session->userdata('userdata')->ID_USER;
		$data['IS_POST'] = $this->M_admin->select_user_is_post($id_user)->IS_POST;
		$this->load->view('Admin/geologi/his' . $ID_JENIS_LAPORAN, $data);
	}

	public function prosesTambah() {
		//$this->form_validation->set_rules('ID_JENIS_LAPORAN', 'ID_JENIS_LAPORAN', 'trim|required');

		$data = $this->input->post();
		
		if($data['ID_JENIS_LAPORAN'] == 1){
			$table = "r_lap_geologi_gunung_api";
		}else if($data['ID_JENIS_LAPORAN'] == 2){
			$table = "r_lap_geologi_gerakan_tanah";
		}else if($data['ID_JENIS_LAPORAN'] == 3){
			$table = "r_lap_geologi_gempa_bumi";
		}
		
		unset($data["ID_JENIS_LAPORAN"]);
		$stat = array(
			'USER_ENTRY' => $this->session->userdata('userdata')->ID_USER,
			'TANGGAL_ENTRY' => date("Y-m-d H:m:s"),
			'FLATFORM_ENTRY' => "WEB"
		);
		$data = array_merge($data,$stat);
		$data["TANGGAL_LAPORAN"] = date("Y-m-d",strtotime($data["TANGGAL_LAPORAN"]));
		
		$result = $this->M_geologi->insert($data,$table);

		if ($result > 0) {
			$out['status'] = '';
			$out['msg'] = show_succ_msg('Data Draft Laporan Berhasil ditambahkan', '20px');
		} else {
			$out['status'] = '';
			$out['msg'] = show_err_msg('Data Draft Laporan Gagal ditambahkan', '20px');
		}

		echo json_encode($out);
	}


	
	
	/*public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataRole'] = $this->M_role->select_all();
		$data['admin']	= $this->M_admin->select_by_id($id);

		echo show_my_modal('Admin/Admin/modal_update_admin', 'update-admin', $data);
	}*/

	

	public function post() {
		$id = $_POST['id'];
		$ID_JENIS_LAPORAN = $_POST['ID_JENIS_LAPORAN'];
		$id_user = $this->session->userdata('userdata')->ID_USER;
		
		if($ID_JENIS_LAPORAN == 1){
			$table = "r_lap_geologi_gunung_api a";
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_geologi_gerakan_tanah a";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_geologi_gempa_bumi a";
		}

		$result = $this->M_geologi->post($table, $id, $id_user);

		if ($result > 0) {
			echo show_succ_msg('Data Laporan Berhasil diPosting', '20px');
		} else {
			echo show_err_msg('Data Laporan Gagal diPosting', '20px');
		}
	}
	
	
	
	public function update() {
		$data['userdata'] 	= $this->userdata;
		$id = $_POST['id'];
		$ID_JENIS_LAPORAN = $_POST['ID_JENIS_LAPORAN'];
		//$id_user = $this->session->userdata('userdata')->ID_USER;
		
		$data['dataRole'] = $this->M_role->select_all();
//		$data['admin']	= $this->M_admin->select_by_id($id);
		
		
		
		
		if($ID_JENIS_LAPORAN == 1){
			$table = "r_lap_geologi_gunung_api a";
		}else if($ID_JENIS_LAPORAN == 2){
			$table = "r_lap_geologi_gerakan_tanah a";
		}else if($ID_JENIS_LAPORAN == 3){
			$table = "r_lap_geologi_gempa_bumi a";
		}

		
		

		echo show_my_modal('Admin/geologi/modal_update_geologi_gunung', 'update-geologi-gunung', $data);
		//echo show_my_modal('Admin/geologi/modal_update', 'update-gunung', $data);
		
		//echo json_encode($out);
		
		
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

	public function showBeforeDateGerakanTanah()
	{
		$date = $this->input->get('tanggal');
		$kemarin = date("Y-m-d", strtotime($date));


		$yesterday = date('Y-m-d',strtotime("-2 days"));

		$query = $this->db->select('KETERANGAN, DETAIL')
						  ->where('TANGGAL_LAPORAN = ', $yesterday)
						  ->limit(1)
						  ->get('r_lap_geologi_gerakan_tanah')
						  ->row_array();
		// $data = array();
		echo json_encode(array(
			'keterangan' => $query['KETERANGAN'],
			'detail' => $query['DETAIL'],
		));
	}


	public function showBeforeDateGempaBumi()
	{
		$date = $this->input->get('tanggal');
		$kemarin = date("Y-m-d", strtotime($date));


		$yesterday = date('Y-m-d',strtotime("-2 days"));

		$query = $this->db->select('*')
						  ->where('TANGGAL_LAPORAN = ', $yesterday)
						  ->limit(1)
						  ->get('r_lap_geologi_gempa_bumi')
						  ->row_array();
		// $data = array();
		echo json_encode(array(
			'lokasi' => $query['LOKASI'],
			'informasi' => $query['INFORMASI'],
			'kondisi_dt' => $query['KONDISI_GEOLOGI_DT'],
			'penyebab_gempa' => $query['PENYEBAB_GEMPA'],
			'dampak_gempa' => $query['DAMPAK_GEMPA'],
			'rekomendasi' => $query['REKOMENDASI']
		));
	}



	public function showBeforeDateGunungApi()
	{
		$date = $this->input->get('tanggal');
		$kemarin = date("Y-m-d", strtotime($date));


		$yesterday = date('Y-m-d',strtotime("-2 days"));

		$query = $this->db->select('KETERANGAN, DETAIL')
						  ->where('TANGGAL_LAPORAN = ', $yesterday)
						  ->limit(1)
						  ->get('r_lap_geologi_gempa_bumi')
						  ->row_array();
		// $data = array();
		echo json_encode(array(
			'lokasi' => $query['LOKASI'],
			'informasi' => $query['INFORMASI'],
			'kondisi_dt' => $query['KONDISI_GEOLOGI_DT'],
			'penyebab_gempa' => $query['PENYEBAB_GEMPA'],
			'dampak_gempa' => $query['DAMPAK_GEMPA'],
			'rekomendasi' => $query['REKOMENDASI']
		));
	}
}