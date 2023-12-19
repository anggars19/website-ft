<?php

class Admin extends CI_Controller
{
//dashboard
    function main() {
        $data['berita'] = $this->m_admin->total_data('id_berita','berita','');
        $data['pengumuman'] = $this->m_admin->total_data('id_pengumuman','pengumuman','');
        $data['agenda'] = $this->m_admin->total_data('id_agenda','agenda','');
        $data['galeri'] = $this->m_admin->total_data('id_galeri','galeri','galeri');

        $this->load->view('admin/main.php',$data);      
    }

//tampil halaman
    function tampil_info($nama) {
            $GetPage = $this->input->get('page');
            $page = (isset($GetPage))? $GetPage : 1;		
            $limit = 20;
            $limit_start = ($page - 1) * $limit;	
            $no = $limit_start + 1;

        if($nama == 'berita'){
            $data['berita'] = $this->m_admin->get_dataInformasi('id_berita','berita','BERITA',$limit,$limit_start);
            $data['total'] = $this->m_admin->get_totalInformasi('id_berita','berita');
            $data['data'] = array(
                'nama' => 'berita',
                'page' => $page,
                'limit' => $limit,
                'no' => $no
            );

            $this->load->view('admin/informasi/tampil.php',$data);
            //$this->load->view('coba.php',$data);
        }else if($nama == 'pengumuman'){
            $data['pengumuman'] = $this->m_admin->get_dataInformasi('id_pengumuman','pengumuman','',$limit,$limit_start);
            $data['total'] = $this->m_admin->get_totalInformasi('id_pengumuman','pengumuman');
            $data['data'] = array(
                'nama' => 'pengumuman',
                'page' => $page,
                'limit' => $limit,
                'no' => $no
            );

            $this->load->view('admin/informasi/tampil.php',$data);
        }else if($nama == 'agenda'){
            $data['agenda'] = $this->m_admin->get_dataInformasi('id_agenda','agenda','',$limit,$limit_start);
            $data['total'] = $this->m_admin->get_totalInformasi('id_agenda','agenda');
            $data['data'] = array(
                'nama' => 'agenda',
                'page' => $page,
                'limit' => $limit,
                'no' => $no
            );

            $this->load->view('admin/informasi/tampil.php',$data);
        }
    }

    function tampil_galeri($nama) {
        $GetPage = $this->input->get('hal');
        $hal = (isset($GetPage))? $GetPage : 1;		
        $per_hal=5;
        $start = ($hal - 1) * $per_hal;

        if($nama == 'galeri'){
            $data['galeri'] = $this->m_admin->get_dataGaleri('galeri',$start,$per_hal);
            $jumlah_baris = $this->m_admin->get_totalGaleri('galeri');
            $halaman=ceil($jumlah_baris / $per_hal);

        
            $data['data'] = array(
                'nama' => 'galeri',
                'halaman' => $halaman,
                'hal' => $hal,
                'per_hal' => $per_hal,
                'start' => $start
            );

            $this->load->view('admin/galeri/tampil.php',$data);
        }else if($nama == 'slide'){
        $data['slide'] = $this->m_admin->get_dataGaleri('slide',$start,$per_hal);
        $jumlah_baris = $this->m_admin->get_totalGaleri('slide');
        $halaman=ceil($jumlah_baris / $per_hal);

        $data['data'] = array(
            'nama' => 'slide',
            'halaman' => $halaman,
            'hal' => $hal,
            'per_hal' => $per_hal,
            'start' => $start
        );

        $this->load->view('admin/galeri/tampil.php',$data);
        }
    }

    function tampil_akademik($nama) {
        $GetPage = $this->input->get('hal');
        $hal = (isset($GetPage))? $GetPage : 1;		
        $per_hal=5;
        $start = ($hal - 1) * $per_hal;

        if($nama == 'kurikulum'){
            $data['kurikulum'] = $this->m_admin->get_dataList('KURIKULUM');
            $data['data'] = array('nama' => 'kurikulum');

            $this->load->view('admin/akademik/formedit.php',$data);
        }else if($nama == 'penjaminanmutu'){
            $data['penjaminanmutu'] = $this->m_admin->get_dataList('PENJAMINANMUTU');
            $data['data'] = array('nama' => 'penjaminanmutu');
            
            $this->load->view('admin/akademik/formedit.php',$data);
        }else if($nama == 'publikasi'){
            $data['publikasi'] = $this->m_admin->get_dataList('PUBLIKASI ILMIAH');
            $data['data'] = array('nama' => 'publikasi');
            
            $this->load->view('admin/akademik/formedit.php',$data);
        }else if($nama == 'prestasi'){
             $data['prestasi'] = $this->m_admin->get_dataprestasi($start,$per_hal);
             $jumlah_baris = $this->m_admin->get_totalprestasi();
            $halaman=ceil($jumlah_baris / $per_hal);

            $data['data'] = array(
                'nama' => 'prestasi',
                'halaman' => $halaman,
                'hal' => $hal,
                'per_hal' => $per_hal,
                'start' => $start
            );
            
            $this->load->view('admin/akademik/prestasi.php',$data);
        }
    }

    function tampil_page() {
        $GetPage = $this->input->get('hal');
        $search = $this->input->post('keyword');
        if(!isset($search) && empty($search)){
            $search = "";
        }
        $page = (isset($GetPage))? $GetPage : 1;		
        $limit = 10;
        $limit_start = ($page - 1) * $limit;	
        $no = $limit_start + 1;

        $data['list'] = $this->m_admin->get_dataPage($limit,$limit_start,$search);
        $data['total'] = $this->m_admin->get_totalPage();
        $data['data'] = array(
            'page' => $page,
            'limit' => $limit,
            'no' => $no
        );

         $this->load->view('admin/page/tampil.php',$data);
    }

    function tampil_pengaturan($nama) {
        if($nama == 'password'){
            $tabel = 'admin';
            $id_fakultas = $this->session->userdata('id_fakultas');
            $userlogin = $this->session->userdata('userlogin');
            $data['user'] = $this->m_admin->get_dataPengaturan($tabel,$id_fakultas,$userlogin);

            $this->load->view('admin/pengaturan/password.php',$data);
        }else if($nama == 'kontak'){
            $data['kontak'] = $this->m_admin->get_dataPengaturan($nama,'','');

            $this->load->view('admin/pengaturan/kontak.php',$data);
        }else if($nama == 'template'){
            $data['template'] = $this->m_admin->get_dataPengaturan($nama,'','');

            $this->load->view('admin/pengaturan/template.php',$data);
        }
    }

    function tampil_menu($nama) {
        $GetPage = $this->input->get('hal');
        $search = $this->input->post('keyword');
        if(!isset($search) && empty($search)){
            $search = "";
        }
        $page = (isset($GetPage))? $GetPage : 1;		
        $limit = 10;
        $limit_start = ($page - 1) * $limit;	
        $no = $limit_start + 1;

        if($nama == "menu"){
            $data['menu'] = $this->m_admin->get_datamenu($limit,$limit_start,$search,$nama,"id_menu");
            $data['total'] = $this->m_admin->get_totalmenu("id_menu",$nama);
            $data['data'] = array(
                'page' => $page,
                'limit' => $limit,
                'no' => $no,
                'halaman' => $nama
            );
    
            $this->load->view('admin/menu/tampil.php',$data);
        }else if($nama == "sub_menu"){
           // $data['sub'] = $this->m_admin->get_datamenu($limit,$limit_start,$search,$nama,"id_sub");
           $data['sub'] = $this->m_admin->subJoinmenu($limit,$limit_start,$search);
            $data['total'] = $this->m_admin->get_totalmenu("id_sub",$nama);
            $data['data'] = array(
                'page' => $page,
                'limit' => $limit,
                'no' => $no,
                'halaman' => $nama,
            );
  
            $this->load->view('admin/menu/tampil.php',$data);
        }else if($nama == "pages"){
            //$data['sub'] = $this->m_admin->get_dataPage($limit,$limit_start,$search);
            $data['total'] = $this->m_admin->get_totalPage();
            $data['join'] = $this->m_admin->JoinMenuAndSub($limit,$limit_start,$search);
            $data['data'] = array(
                'page' => $page,
                'limit' => $limit,
                'no' => $no,
                'halaman' => $nama,
            );
    
            $this->load->view('admin/menu/tampil.php',$data);
        }
    }

    function trafik($nama) {
        if($nama == "berita"){
            $id = "id_berita";
            $min = $this->m_admin->min_chart($nama);
            $data['chart'] = $this->m_admin->chart($min[0]['min'],$nama,$id);
            $data['berita'] = $this->m_admin->chart1($min[0]['min'],$nama);
            
            $this->load->view('admin/trafik_pengunjung/berita.php',$data);      
        }else if($nama == "agenda"){

        }else if($nama == "pengumuman"){

        }
    }

//form add
    function Fadd_info($nama) {
        if($nama == 'berita'){
            $data['data'] = array('nama' => 'berita');

            $this->load->view('admin/informasi/formadd.php',$data);
        }else if($nama == 'pengumuman'){
        $data['data'] = array('nama' => 'pengumuman');

            $this->load->view('admin/informasi/formadd.php',$data);
        }else if($nama == 'agenda'){
            $data['data'] = array('nama' => 'agenda');

            $this->load->view('admin/informasi/formadd.php',$data);
        }
    }

    function Fadd_galeri($nama) {
        if($nama == 'galeri'){
            $data['data'] = array('nama' => 'galeri');

            $this->load->view('admin/galeri/formadd.php',$data);
        }else if($nama == 'slide'){
        $data['data'] = array('nama' => 'slide');

            $this->load->view('admin/galeri/formadd.php',$data);
        }
    }

    function Fadd_prestasi() {
        $data['data'] = array('nama' => 'prestasi');
        
        $this->load->view('admin/akademik/formadd.php');
    }

    function Fadd_menu($nama) {
        if($nama == "menu"){
            $data['data'] = array('halaman' => 'menu');

            $this->load->view('admin/menu/formadd.php',$data);
        }else if($nama == "sub_menu"){
            $data['data'] = array('halaman' => 'sub_menu');
            $data['menu'] = $this->m_admin->get_data('menu')->result_array();

            $this->load->view('admin/menu/formadd.php',$data);
        }else if($nama == "pages"){
            $data['data'] = array('halaman' => 'pages');
            $data['menu'] = $this->m_admin->get_data('menu')->result_array();
            $data['sub'] = $this->m_admin->get_data('sub_menu')->result_array();

            $this->load->view('admin/menu/formadd.php',$data);
        }
    }

//form edit
    function Fedit_info($nama,$id) {
        if($nama == 'berita'){
            $tabel = 'berita';
            $where = array('id_berita' => $id);
            $data['berita'] = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['data'] = array('nama' => 'berita');

            $this->load->view('admin/informasi/formedit.php',$data);
        }else if($nama == 'pengumuman'){
            $tabel = 'pengumuman';
            $where = array('id_pengumuman' => $id);
            $data['pengumuman'] = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['data'] = array('nama' => 'pengumuman');

            $this->load->view('admin/informasi/formedit.php',$data);
        }else if($nama == 'agenda'){
            $tabel = 'agenda';
            $where = array('id_agenda' => $id);
            $data['agenda'] = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['data'] = array('nama' => 'agenda');

            $this->load->view('admin/informasi/formedit.php',$data);
        }
    }

    function Fedit_galeri($nama,$id) {
        if($nama == 'galeri'){
            $tabel = 'galeri';
            $where = array('id_galeri' => $id);
            $data['galeri'] = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['data'] = array('nama' => 'galeri');

            $this->load->view('admin/galeri/formedit.php',$data);
        }else if($nama == 'slide'){
            $tabel = 'galeri';
            $where = array('id_galeri' => $id);
            $data['slide'] = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['data'] = array('nama' => 'slide');

            $this->load->view('admin/galeri/formedit.php',$data);
        }
    }

    function Fedit_prestasi($id) {
        $tabel = 'prestasi';
        $where = array('id_prestasi' => $id);
        $data['prestasi'] = $this->m_admin->get_dataById($tabel,$where)->result_array();
        $data['data'] = array('nama' => 'prestasi');

        $this->load->view('admin/akademik/formedit.php',$data);
    }

    function Fedit_page($id) {
        $tabel = 'list';
        $where = array('id_list' => $id);
        $result = $this->m_admin->get_dataById($tabel,$where)->result_array();
        $data['list'] = $result;
        $tema = $result[0]['tema'];
        $data['data'] = array('tema' => $tema);

        $this->load->view('admin/page/formedit.php',$data);      
    }

    function Fedit_menu($id,$nama) {
        if($nama == "menu"){
            $tabel = 'menu';
            $where = array('id_menu' => $id);
            $result = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['menu'] = $result;
            $nama_menu = $result[0]['nama'];
            $data['data'] = array('halaman' => "menu",'tema' => $nama_menu);
    
            $this->load->view('admin/menu/formedit.php',$data);      
        }else if($nama == "pages"){
            $tabel = 'list';
            $menu = 'menu';
            $where = array('id_list' => $id);
            $result = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['list'] = $result;
            $tema = $result[0]['tema'];
            $data['menu'] = $this->m_admin->get_data($menu)->result_array();
            $data['sub'] = $this->m_admin->get_data('sub_menu')->result_array();
            $data['data'] = array('tema' => $tema,'halaman' => "pages");
    
            $this->load->view('admin/menu/formedit.php',$data);      
        }else if($nama == "sub_menu"){
            $tabel = 'sub_menu';
            $where = array('id_sub' => $id);
            $menu = 'menu';
            $result = $this->m_admin->get_dataById($tabel,$where)->result_array();
            $data['sub'] = $result;
            $nama_sub = $result[0]['nama'];
            $data['menu'] = $this->m_admin->get_data($menu)->result_array();
            $data['data'] = array('halaman' => "sub_menu",'tema' => $nama_sub);
    
            $this->load->view('admin/menu/formedit.php',$data); 
        }     
    }
    
//add dan update data
    function add_info($nama) {
        if($nama == 'berita'){
            $tabel = 'berita';
            $op = str_replace("'", "", $this->input->post('op'));
            $id_berita = str_replace("'", "", $this->input->post('id_berita'));
            $judul = str_replace("'", "", $this->input->post('judul'));
            $isi = str_replace("'", "", $this->input->post('isi'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $penulis = str_replace("'", "", $this->input->post('penulis'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_berita' => $id_berita);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");
            
            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('berita',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url() ."assets/img/berita/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }else if($op == "simpan"){
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url() ."assets/img/berita/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = "";
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }
            }

            $data  = array(
                'judul' => $judul,
                'isi' => $isi,
                'penulis' => $penulis,
                'tgl_posting' => $tgl_posting,
                'user' => $user,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'gambar' => $gambar,
                'file_name' => $nama_file,
                'fungsi'=>'BERITA'
            ); 

            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/berita').'";</script>';   
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/berita').'";</script>';   
                    }              
                } else {
                    // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan
                    
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('informasi/berita').'";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('informasi/berita').'";</script>';   
                    }                 
                }
            }else{
                if($op == 'simpan'){
                    $this->m_admin->input_data($tabel,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/berita').'";</script>';   
                }else if($op == 'edit'){
                    $this->m_admin->update_data($tabel,$where,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/berita').'";</script>';   
                }
            }
        }else if($nama == 'pengumuman'){
            $tabel = 'pengumuman';
            $op = str_replace("'", "", $this->input->post('op'));
            $id_pengumuman = str_replace("'", "", $this->input->post('id_pengumuman'));
            $judul = str_replace("'", "", $this->input->post('judul'));
            $isi = str_replace("'", "", $this->input->post('isi'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $penulis = str_replace("'", "", $this->input->post('penulis'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_pengumuman' => $id_pengumuman);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");
        
            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('pengumuman',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url() ."assets/img/pengumuman/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }else if($op == "simpan"){
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/pengumuman/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = "";
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }
            }

            $data  = array(
                'judul' => $judul,
                'isi' => $isi,
                'penulis' => $penulis,
                'tgl_posting' => $tgl_posting,
                'user' => $user,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'gambar' => $gambar,
                'file_name' => $nama_file,
            );
        
            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/pengumuman').'";</script>';   
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/pengumuman').'";</script>';   
                    }              
                } else {
                    // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan
                    
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('informasi/pengumuman').'";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('informasi/pengumuman').'";</script>';   
                    }                 
                }
            }else{
                if($op == 'simpan'){
                    $this->m_admin->input_data($tabel,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/pengumuman').'";</script>';   
                }else if($op == 'edit'){
                    $this->m_admin->update_data($tabel,$where,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/pengumuman').'";</script>';   
                }
            }
        }else if($nama == 'agenda'){
            $tabel = 'agenda';
            $op = str_replace("'", "", $this->input->post('op'));
            $id_agenda = str_replace("'", "", $this->input->post('id_agenda'));
            $judul = str_replace("'", "", $this->input->post('judul'));
            $penyelenggara = str_replace("'", "", $this->input->post('penyelenggara'));
            $tempat = str_replace("'", "", $this->input->post('tempat'));
            $kontak = str_replace("'", "", $this->input->post('kontak'));
            $mulai = str_replace("'", "", $this->input->post('mulai'));
            $selesai = str_replace("'", "", $this->input->post('selesai'));
            $waktu_mulai = str_replace("'", "", $this->input->post('waktu_mulai'));
            $isi = str_replace("'", "", $this->input->post('isi'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $penulis = str_replace("'", "", $this->input->post('penulis'));
            date_default_timezone_set('Asia/Jakarta');
            $user = str_replace("'", "", $this->input->post('user'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_agenda' => $id_agenda);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");
        
            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('agenda',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url() ."assets/img/agenda/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }else if($op == "simpan"){
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url() ."assets/img/agenda/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = "";
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }
            } 

            $data  = array(
                'judul' => $judul,
                'penyelenggara' => $penyelenggara,
                'tempat' => $tempat,
                'kontak' =>$kontak,
                'tgl_mulai' => $mulai,
                'tgl_selesai' => $selesai,
                'waktu' => $waktu_mulai,
                'isi' => $isi,
                'penulis' => $penulis,
                'tgl_posting' => $tgl_posting,
                'user' => $user,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'gambar' => $gambar,
                'file_name' => $nama_file,
            );              
            
            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/agenda').'";</script>';   
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/agenda').'";</script>';   
                    }              
                } else {
                    // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan
                    
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('informasi/agenda').'";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('informasi/agenda').'";</script>';   
                    }                 
                }
            }else{
                if($op == 'simpan'){
                    $this->m_admin->input_data($tabel,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/agenda').'";</script>';   
                }else if($op == 'edit'){
                    $this->m_admin->update_data($tabel,$where,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('informasi/agenda').'";</script>';   
                }
            }
        }
    }

    function add_galeri($nama) {
        if($nama == 'galeri'){
            $tabel = 'galeri';
            $fungsi = 'galeri';
            $op = str_replace("'", "", $this->input->post('op'));
            $judul = str_replace("'", "", $this->input->post('judul'));
            $id_galeri = str_replace("'", "", $this->input->post('id_galeri'));

            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_galeri' => $id_galeri);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");
            $eror		= false;

            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('galeri',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url() ."assets/img/galeri/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }else if($op == "simpan"){
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/galeri/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = "";
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }
            } 

            $data  = array(
                'judul' => $judul,
                'fungsi' =>$fungsi,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'gambar' => $gambar,
                'file_name' => $nama_file
            );
            //periksa apakah ada file yang diupload
            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$fungsi,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('galeri/galeri').'";</script>';   
                    }else if($op == 'edit'){
                         $this->m_admin->update_data($tabel,$where,$data);	
                         echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('galeri/galeri').'";</script>';   
                    }              
                } else {
                    // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan
                    
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('galeri/galeri').'";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('galeri/galeri').'";</script>';   
                    }                 
                }
            }else{
                if($op == 'simpan'){
                    $this->m_admin->input_data($tabel,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('galeri/galeri').'";</script>';   
                }else if($op == 'edit'){
                    $this->m_admin->update_data($tabel,$where,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('galeri/galeri').'";</script>';   
                }
            }
        }else if($nama == 'slide'){
                $tabel = 'galeri';
                $fungsi = 'slide';
                $op = str_replace("'", "", $this->input->post('op'));
                $id_galeri = str_replace("'", "", $this->input->post('id_galeri'));
                $id_fakultas = '5';
                $id_prodi = 'f5';
                $kode_fakultas='05';
                $where = array('id_galeri' => $id_galeri);
                $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");

                if($op == "edit"){            
                    $data = $this->m_admin->get_dataById('galeri',$where)->result_array();
                    $cek = $data[0]['gambar'];
    
                    if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                        $namafolder = base_url()."assets/img/slide/".$waktu;
                        $get_nama	= $_FILES['data_upload']['name'];
                        $gambar		= $namafolder."".$get_nama;
                        $nama_file = $waktu.$get_nama;
                        $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                        if(isset($cek) && !empty($cek)){                  
                            $gambar_lama = $cek;
                            $gambar = $cek;
                            $pecah = pathinfo($cek);
                            $nama_file=$pecah['basename'];
                        }else{
                            $gambar_lama = "";
                            $gambar = "";
                            $nama_file="";
                        }             
                    }
                }else if($op == "simpan"){
                    if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                        $namafolder = base_url()."assets/img/slide/".$waktu;
                        $get_nama	= $_FILES['data_upload']['name'];
                        $gambar		= $namafolder."".$get_nama;
                        $nama_file = $waktu.$get_nama;
                        $gambar_lama = "";
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }
                } 

                $data  = array(
                    'fungsi' =>$fungsi,
                    'id_fakultas' => $id_fakultas,
                    'id_prodi' => $id_prodi,
                    'gambar' => $gambar,
                    'file_name' => $nama_file,
                );
            
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $upload_result = $this->upload_gambar($nama_file,$fungsi,$gambar_lama);
                    if ($upload_result === TRUE) {
                        // Upload gambar berhasil 
                        if($op == 'simpan'){
                            $this->m_admin->input_data($tabel,$data);	   
                        }else if($op == 'edit'){
                            $this->m_admin->update_data($tabel,$where,$data);	
                        }         
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('galeri/slide').'";</script>';     
                    } else {
                       // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan   
                        if (is_string($upload_result)) {
                            // Tampilkan pesan kesalahan kustom jika ada
                            $upload_result = strip_tags($upload_result);
                            echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('galeri/slide').'";</script>';   
                        } else {
                            // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                            echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('galeri/slide').'";</script>';   
                        }                 
                    }
                }else{
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	 
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                    }
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('galeri/slide').'";</script>';   
                }
        }
    }

    function add_akademik($nama) {
        if($nama == 'kurikulum'){
            $tabel = "list";
            $tema = "KURIKULUM";
            $op = str_replace("'", "", $this->input->post('op'));
            $isi = str_replace("'", "", $this->input->post('isi'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_list = str_replace("'", "", $this->input->post('id_list'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('tema' => $tema);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");
            
            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('list',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/kurikulum/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }

                $data  = array(
                    'tema' =>$tema,
                    'id_fakultas' => $id_fakultas,
                    'id_prodi' => $id_prodi,
                    'isi' => $isi,
                    'tgl_posting' => $tgl_posting,
                    'user' => $user,
                    'gambar' => $gambar,
                    'file_name' => $nama_file,
                );

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $upload_result = $this->upload_gambar($nama_file,$fungsi,$gambar_lama);
                    if ($upload_result === TRUE) {
                        // Upload gambar berhasil 
                        if($op == 'simpan'){
                            $this->m_admin->input_data($tabel,$data);	   
                        }else if($op == 'edit'){
                            $this->m_admin->update_data($tabel,$where,$data);	
                        }         
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('akademik/kurikulum').'";</script>';     
                    } else {
                       // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan   
                        if (is_string($upload_result)) {
                            // Tampilkan pesan kesalahan kustom jika ada
                            $upload_result = strip_tags($upload_result);
                            echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('akademik/kurikulum').'";</script>';   
                        } else {
                            // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                            echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('akademik/kurikulum').'";</script>';   
                        }                 
                    }
                }else{
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	 
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                    }
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('akademik/kurikulum').'";</script>';   
                }
        }else if($nama == 'penjaminanmutu'){

        }else if($nama == 'publikasi'){

        }else if($nama == 'prestasi'){
            $tabel = "prestasi";
            $op = str_replace("'", "", $this->input->post('op'));
            $nama_prestasi = str_replace("'", "", $this->input->post('nama'));
            $penyelenggara = str_replace("'", "", $this->input->post('penyelenggara'));
            $tgl_prestasi = str_replace("'", "", $this->input->post('tanggal_prestasi'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_prestasi = str_replace("'", "", $this->input->post('id_prestasi'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_prestasi' => $id_prestasi);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");

            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('prestasi',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/prestasi/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }else if($op == "simpan"){
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/prestasi/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = "";
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }
            } 

            $data  = array(
                'nama_prestasi' => $nama_prestasi,
                'penyelenggara' =>$penyelenggara,
                'tanggal_prestasi' =>$tgl_prestasi,
                'tanggal' =>$tgl_posting,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'gambar' => $gambar,
                'file_name' => $nama_file
            );

            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('admin/prestasi').'";</script>';   
                    }else if($op == 'edit'){
                         $this->m_admin->update_data($tabel,$where,$data);	
                         echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('admin/prestasi').'";</script>';   
                    }              
                } else {
                    // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan
                    
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('admin/prestasi').'";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('admin/prestasi').'";</script>';   
                    }                 
                }
            }else{
                if($op == 'simpan'){
                    $this->m_admin->input_data($tabel,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('admin/prestasi').'";</script>';   
                }else if($op == 'edit'){
                    $this->m_admin->update_data($tabel,$where,$data);	
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('admin/prestasi').'";</script>';   
                }
            }
        }
    }

    function add_page() {
        $tabel = "list";
        $tema = str_replace("'", "", $this->input->post('tema'));
        $op = str_replace("'", "", $this->input->post('op'));
        $isi = str_replace("'", "", $this->input->post('isi'));
        $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
        $user = str_replace("'", "", $this->input->post('user'));
        $id_list = str_replace("'", "", $this->input->post('id_list'));
        $id_fakultas = '5';
        $id_prodi = 'f5';
        $kode_fakultas='05';
        $where = array('id_list' => $id_list);
        $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");
        
        if($op == "edit"){            
            $data = $this->m_admin->get_dataById('list',$where)->result_array();
            $cek = $data[0]['gambar'];

            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $namafolder = base_url()."assets/img/page/".$waktu;
                $get_nama	= $_FILES['data_upload']['name'];
                $gambar		= $namafolder."".$get_nama;
                $nama_file = $waktu.$get_nama;
                $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
            }else{
                if(isset($cek) && !empty($cek)){                  
                    $gambar_lama = $cek;
                    $gambar = $cek;
                    $pecah = pathinfo($cek);
                    $nama_file=$pecah['basename'];
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }             
            }
        }

            $data  = array(
                'tema' =>$tema,
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'isi' => $isi,
                'tgl_posting' => $tgl_posting,
                'user' => $user,
                'gambar' => $gambar,
                'file_name' => $nama_file,
            );

            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	   
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                    }         
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('menu').'";</script>';     
                } else {
                   // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan   
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('menu').'";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('menu').'";</script>';   
                    }                 
                }
            }else{
                if($op == 'simpan'){
                    $this->m_admin->input_data($tabel,$data);	 
                }else if($op == 'edit'){
                    $this->m_admin->update_data($tabel,$where,$data);	
                }
                echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('menu').'";</script>';   
            }
    }

    function add_menu($nama) {
        if($nama == "menu"){
            $tabel = "menu";
            $op = str_replace("'", "", $this->input->post('op'));
            $nama = str_replace("'", "", $this->input->post('nama'));
            $tampil = str_replace("'", "", $this->input->post('tampil'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_menu = str_replace("'", "", $this->input->post('id_menu'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $where = array('id_menu' => $id_menu);
    
                $data  = array(
                    'id_fakultas' => $id_fakultas,
                    'id_prodi' => $id_prodi,
                    'tampil' => $tampil,
                    'tgl_posting' => $tgl_posting,
                    'user' => $user,
                    'nama' => $nama,
                );

                if($op == 'simpan'){
                    $this->form_validation->set_rules('nama', 'Nama Menu', 'required|is_unique[menu.nama]');
                    $this->form_validation->set_message('is_unique', '%s tidak boleh sama'); 
                

                    if ($this->form_validation->run() == FALSE) {
                        echo '<script language="javascript">alert("Data gagal di simpan,nama menu tidak boleh sama  !");document.location="'.base_url('menu/form_add').'";</script>';
                    }else{
                        $this->m_admin->input_data($tabel,$data);	 
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('menu').'";</script>';
                    }
                }else if($op == 'edit'){
                    $this->form_validation->set_rules('nama', 'Nama Menu', 'callback_check_menu');

                    if ($this->form_validation->run() == FALSE) {
                        echo '<script language="javascript">alert("Data gagal di simpan,nama menu tidak boleh sama  !");document.location="'.base_url('menu/form_edit/').$id_menu.'";</script>';
                    }else{
                        $this->m_admin->update_data($tabel,$where,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('menu').'";</script>';  
                    }
                } 
        }else if($nama == "sub_menu"){
            $tabel = "sub_menu";
            $op = str_replace("'", "", $this->input->post('op'));
            $nama = str_replace("'", "", $this->input->post('nama'));
            $tampil = str_replace("'", "", $this->input->post('tampil'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $menu = str_replace("'", "", $this->input->post('menu'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_sub = str_replace("'", "", $this->input->post('id_sub'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $where = array('id_sub' => $id_sub);
    
                $data  = array(
                    'id_fakultas' => $id_fakultas,
                    'id_prodi' => $id_prodi,
                    'tampil' => $tampil,
                    'tgl_posting' => $tgl_posting,
                    'user' => $user,
                    'nama' => $nama,
                    'id_menu' =>$menu
                );

                 if($op == 'simpan'){
                    $this->form_validation->set_rules('nama', 'Nama Sub Menu', 'required|is_unique[sub_menu.nama]');
                    $this->form_validation->set_message('is_unique', '%s tidak boleh sama'); 
                

                    if ($this->form_validation->run() == FALSE) {
                        echo '<script language="javascript">alert("Data gagal di simpan,nama sub menu tidak boleh sama  !");document.location="'.base_url('sub_menu/form_add').'";</script>';
                    }else{
                        $this->m_admin->input_data($tabel,$data);	 
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('sub_menu').'";</script>';
                    }
                }else if($op == 'edit'){
                    $this->form_validation->set_rules('nama', 'Nama Menu', 'callback_check_SubMenu');

                    if ($this->form_validation->run() == FALSE) {
                        echo '<script language="javascript">alert("Data gagal di simpan,nama sub menu tidak boleh sama  !");document.location="'.base_url('sub_menu/form_edit/').$id_sub.'";</script>';
                    }else{
                        $this->m_admin->update_data($tabel,$where,$data);	
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('sub_menu').'";</script>';  
                    }  
                } 
        }else if($nama == "pages"){
            $tabel = "list";
            $tema = str_replace("'", "", $this->input->post('tema'));
            $op = str_replace("'", "", $this->input->post('op'));
            $isi = str_replace("'", "", $this->input->post('isi'));
            $tgl_posting = str_replace("'", "", $this->input->post('tgl_posting'));
            $menu = str_replace("'", "", $this->input->post('menu'));
            $sub = str_replace("'", "", $this->input->post('sub'));
            $tampil = str_replace("'", "", $this->input->post('tampil'));
            $user = str_replace("'", "", $this->input->post('user'));
            $id_list = str_replace("'", "", $this->input->post('id_list'));
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_list' => $id_list);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");

            if($op == "edit"){            
                $data = $this->m_admin->get_dataById('list',$where)->result_array();
                $cek = $data[0]['gambar'];

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/list/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($cek, PHP_URL_PATH));
                }else{
                    if(isset($cek) && !empty($cek)){                  
                        $gambar_lama = $cek;
                        $gambar = $cek;
                        $pecah = pathinfo($cek);
                        $nama_file=$pecah['basename'];
                    }else{
                        $gambar_lama = "";
                        $gambar = "";
                        $nama_file="";
                    }             
                }
            }else if($op == "simpan"){
                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $namafolder = base_url()."assets/img/list/".$waktu;
                    $get_nama	= $_FILES['data_upload']['name'];
                    $gambar		= $namafolder."".$get_nama;
                    $nama_file = $waktu.$get_nama;
                    $gambar_lama = "";
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }
            }


                $data  = array(
                    'tema' =>$tema,
                    'id_fakultas' => $id_fakultas,
                    'id_prodi' => $id_prodi,
                    'isi' => $isi,
                    'tgl_posting' => $tgl_posting,
                    'user' => $user,
                    'gambar' => $gambar,
                    'file_name' => $nama_file,
                    'id_menu' => $menu,
                    'id_sub' => $sub,
                    'tampil' =>$tampil
                );

                if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                    $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                    if ($upload_result === TRUE) {
                        // Upload gambar berhasil 
                        if($op == 'simpan'){
                            $this->m_admin->input_data($tabel,$data);	   
                        }else if($op == 'edit'){
                            $this->m_admin->update_data($tabel,$where,$data);	
                        }         
                        echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('pages').'";</script>';     
                    } else {
                    // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan   
                        if (is_string($upload_result)) {
                            // Tampilkan pesan kesalahan kustom jika ada
                            $upload_result = strip_tags($upload_result);
                            echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url('pages').'";</script>';   
                        } else {
                            // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                            echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url('pages').'";</script>';   
                        }                 
                    }
                }else{
                    if($op == 'simpan'){
                        $this->m_admin->input_data($tabel,$data);	 
                    }else if($op == 'edit'){
                        $this->m_admin->update_data($tabel,$where,$data);	
                    }
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url('pages').'";</script>';   
                }
            }      
    }

       function add_pengaturan($nama) {
        if($nama == "password"){
            $tabel = "admin";
            $userlogin = $this->session->userdata('userlogin');
            $id_fakultas = $this->session->userdata('id_fakultas');
            $username =  str_replace("'", "", $this->input->post('username'));
            $pass = md5($this->input->post('pass'));
            $pass2 = md5($this->input->post('pass2'));
            $pass3 = md5($this->input->post('pass3'));
            $getUser = $this->m_admin->getUser($id_fakultas,$userlogin);
            $where = array('id_fakultas' => $id_fakultas);
            $data  = array(
                'username' => $username,
                'password' => $pass2
            );

            if($pass != $getUser->password ){
                echo '<script language="javascript">alert("Terjadi kesalahan pada password yang lama  !"); document.location="'.base_url().'pengaturan/password";</script>'; 
            }else if($pass2 != $pass3){
                echo '<script language="javascript">alert("Terjadi kesalahan pada Ulangi Password  !"); document.location="'.base_url().'pengaturan/password";</script>';   
            }else if(($pass == $getUser->password) && ($pass2 == $pass3) ){
                $this->m_admin->update_data($tabel,$where,$data);	
                echo '<script language="javascript">alert("Data username dan password berhasil diperbarui,silahkan login kembali  !");  document.location="'.base_url().'logout";</script>';   
            }
        }else if($nama == "kontak"){
            $tabel = "kontak";
            $alamat = str_replace("'", "", $this->input->post('alamat'));
            $telepon = str_replace("'", "", $this->input->post('telepon'));
            $faksimile = str_replace("'", "", $this->input->post('faksimile'));
            $email = str_replace("'", "", $this->input->post('email'));
            $id_kontak = '30';
            $id_fakultas = '5';
            $id_prodi = 'f5';
            $where = array('id_kontak' => $id_kontak);
    
            $data  = array(
                'id_fakultas' => $id_fakultas,
                'id_prodi' => $id_prodi,
                'alamat' => $alamat,
                'faksimile' => $faksimile,
                'telepon' => $telepon,
                'email' => $email,
            );
            

                $this->m_admin->update_data($tabel,$where,$data);	
                echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url().'pengaturan/kontak";</script>';  
        }else if($nama == "template"){
            $tabel = "template";
            $topbar = str_replace("'", "", $this->input->post('topbar'));
            $navbar = str_replace("'", "", $this->input->post('navbar'));
            $font_hover = str_replace("'", "", $this->input->post('font_hover'));
            $garis_bawah_menu = str_replace("'", "", $this->input->post('garis_bawah_menu'));
            $warna_font = str_replace("'", "", $this->input->post('warna_font'));
            $footer = str_replace("'", "", $this->input->post('footer'));
            $nama = str_replace("'", "", $this->input->post('nama'));
            $id_template = '28';
            $id_prodi = 'f5';
            $kode_fakultas='05';
            $where = array('id_template' => $id_template);
            $waktu = $kode_fakultas."_".date("d_m_Y_h_i_s");

            $data = $this->m_admin->get_dataById('template',$where)->result_array();
            $cek = $data[0]['background'];

            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $namafolder = "assets/img/galeri/".$waktu;
                $get_nama	= $_FILES['data_upload']['name'];
                $gambar		= $namafolder."".$get_nama;
                $nama_file = $waktu.$get_nama;
                $gambar_lama = $cek;
            }else{
                if(isset($cek) && !empty($cek)){                  
                    $gambar_lama = $cek;
                    $gambar = $cek;
                    $pecah = pathinfo($cek);
                    $nama_file=$pecah['basename'];
                }else{
                    $gambar_lama = "";
                    $gambar = "";
                    $nama_file="";
                }   
            } 

            $data  = array(
                'color_topbar' => $topbar,
                'color_navbar' =>  "$navbar;$font_hover;$garis_bawah_menu;$warna_font",
                'color_footer' => $footer,
                'logo_navbar' => $nama,
                'background' => $gambar
            );

            if(isset($_FILES['data_upload']['name']) && !empty($_FILES['data_upload']['name'])){
                $upload_result = $this->upload_gambar($nama_file,$tabel,$gambar_lama);
                if ($upload_result === TRUE) {
                    // Upload gambar berhasil 
                    $this->m_admin->update_data($tabel,$where,$data);	    
                    echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url().'pengaturan/template";</script>';     
                } else {
                // Upload gambar gagal atau validasi gagal, tampilkan pesan kesalahan   
                    if (is_string($upload_result)) {
                        // Tampilkan pesan kesalahan kustom jika ada
                        $upload_result = strip_tags($upload_result);
                        echo '<script language="javascript">alert("'.$upload_result.'"); document.location="'.base_url().'pengaturan/template";</script>';   
                    } else {
                        // Tampilkan pesan kesalahan default jika tidak ada pesan kustom
                        echo '<script language="javascript">alert("Data gagal di simpan  !"); document.location="'.base_url().'pengaturan/template";</script>';   
                    }                 
                }
            }else{
                $this->m_admin->update_data($tabel,$where,$data);	
                echo '<script language="javascript">alert("Data berhasil di simpan  !"); document.location="'.base_url().'pengaturan/template";</script>';   
            }
        }
    }

//hapus data
    function delete($nama,$id) {
        if($nama == 'berita'){
            $where = array('id_berita' => $id);
            $data = $this->m_admin->get_dataById($nama,$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data($nama,$where);
            $lokasi = 'informasi/berita';          
        }else if($nama == 'pengumuman'){
            $where = array('id_pengumuman' => $id);
            $data = $this->m_admin->get_dataById($nama,$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data($nama,$where);
            $lokasi = 'informasi/pengumuman';
        }else if($nama == 'agenda'){
            $where = array('id_agenda' => $id);
            $data = $this->m_admin->get_dataById($nama,$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data($nama,$where);
            $lokasi = 'informasi/agenda';
        }else if($nama == 'galeri'){
            $where = array('id_galeri' => $id);
            $data = $this->m_admin->get_dataById($nama,$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data($nama,$where);
            $lokasi = 'galeri/galeri';
        }else if($nama == 'slide'){
            $where = array('id_galeri' => $id);
            $data = $this->m_admin->get_dataById('galeri',$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data('galeri',$where);
            $lokasi = 'galeri/slide';

        }else if($nama == 'prestasi'){
            $where = array('id_prestasi' => $id);
            $data = $this->m_admin->get_dataById('prestasi',$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data('prestasi',$where);
            $lokasi = 'admin/prestasi';

        }else if($nama == 'menu'){
            $where = array('id_menu' => $id);
           
            $this->m_admin->delete_data('menu',$where);
            $lokasi = 'menu';

        }else if($nama == 'pages'){
            $where = array('id_list' => $id);
            $data = $this->m_admin->get_dataById('list',$where)->result_array();
            $gambar = $data[0]['gambar'];
            if(isset($gambar) && !empty($gambar)){
                 $this->delete_gambar($gambar);
            }

            $this->m_admin->delete_data('list',$where);
            $lokasi = 'sub_menu';      
        }else if($nama == 'sub_menu'){
            $where = array('id_sub' => $id);
          
            $this->m_admin->delete_data('sub_menu',$where);
            $lokasi = 'sub_menu';
        }
        echo '<script language="javascript">alert("Data berhasil di hapus  !"); document.location="'.base_url($lokasi).'";</script>';
    }

//fungsi upload gambar
    function upload_gambar($nama,$lokasi,$gambar_lama) {
        $config['upload_path'] = FCPATH .'assets/img/'.$lokasi;
        $config['allowed_types'] = 'jpg|jpeg|pdf|png';
        $config['max_size'] = 2000000;
        //$config['min_size'] = 10000;
        $config['remove_spaces'] = FALSE;
        $config['file_name'] = $nama;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('data_upload')) {
            // Tipe file tidak sesuai atau ukuran terlalu besar
            $error_message = $this->upload->display_errors();
            // Ubah pesan kesalahan yang diberikan oleh library Upload
            $error_message = str_replace('The filetype you are attempting to upload is not allowed.', 'Extensi tidak di izinkan !', $error_message);
            $error_message = str_replace('The file you are attempting to upload exceeds the maximum allowed size.', 'file terlalu besar  Maksimal 2 MB!', $error_message);

            return $error_message;
        } else {
            // Upload berhasil
            $uploaded_data = $this->upload->data();

            // Baca isi file yang diunggah
            $file_content = file_get_contents($uploaded_data['full_path']);
            // Lakukan pemeriksaan terhadap isi file
            if (strpos($file_content, 'php') !== false || strpos($file_content, 'script') !== false) {
                // Jika kata 'php' atau 'script' ditemukan dalam isi file
                // Hapus file yang sudah diunggah
                unlink($uploaded_data['full_path']);
                return 'Data gagal disimpan';
            } else {
                // File aman
                //periksa apakah $gambar_lama ada isinya
                if(isset($gambar_lama) && !empty($gambar_lama)){
                    //jika ada hapus gambar lama
                    if (file_exists($gambar_lama)) {
                        unlink($gambar_lama);                    
                    }                
                }
                return TRUE;
            }
        }
    }

//fungsi menghapus gambar dari folder
    function delete_gambar($lokasi) {
        $folder = realpath($_SERVER["DOCUMENT_ROOT"] . parse_url($lokasi, PHP_URL_PATH));

        if (file_exists($folder)) {
            unlink($folder);                    
        }  
    }

//fungsi untuk mengecek apakah nama sudah ada pada database
    public function check_menu($nama)
    {
        $id = str_replace("'", "", $this->input->post('id_menu'));
        $existing_user = $this->m_admin->getNama($nama,'menu')->row();

        if ($existing_user && $existing_user->id_menu!= $id) {
            return FALSE;
        }
     return TRUE;
    }

    public function check_SubMenu($nama)
    {
        $id = str_replace("'", "", $this->input->post('id_sub'));
        $existing_user = $this->m_admin->getNama($nama,'sub_menu')->row();

        if ($existing_user && $existing_user->id_sub != $id) {
            return FALSE;
        }
     return TRUE;
    }
}