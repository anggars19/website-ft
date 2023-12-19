<?php

class Menu extends CI_Controller
{
    function tampil_profile($nama) { 
        if($nama == 'sambutan'){
            $data['sambutan'] = $this->m_menu->get_list($nama);
            $data['kontak'] = $this->m_home->get_kontak();
            $data['header_menu'] = $this->m_home->get_menu("menu");
            $data['header_sub'] = $this->m_home->get_menu("sub_menu");
            $data['header_list'] = $this->m_home->get_list();

            $this->load->view('menu/profil/sambutan.php',$data);      
        }else if($nama == 'vimitu'){
            $data['visi'] = $this->m_menu->get_list('visi');
            $data['misi'] = $this->m_menu->get_list('misi');
            $data['tujuan'] = $this->m_menu->get_list('tujuan');
            $data['kontak'] = $this->m_home->get_kontak();
            $data['header_menu'] = $this->m_home->get_menu("menu");
            $data['header_sub'] = $this->m_home->get_menu("sub_menu");
            $data['header_list'] = $this->m_home->get_list();

            $this->load->view('menu/profil/vimitu.php',$data);      
        }else if($nama == 'sejarah'){
            $data['sejarah'] = $this->m_menu->get_list($nama);
            $data['kontak'] = $this->m_home->get_kontak();
            $data['header_menu'] = $this->m_home->get_menu("menu");
            $data['header_sub'] = $this->m_home->get_menu("sub_menu");
            $data['header_list'] = $this->m_home->get_list();

            $this->load->view('menu/profil/sejarah.php',$data);      
        }else if($nama == 'so'){
            $data['so'] = $this->m_menu->get_list($nama);
            $data['kontak'] = $this->m_home->get_kontak();
            $data['header_menu'] = $this->m_home->get_menu("menu");
            $data['header_sub'] = $this->m_home->get_menu("sub_menu");
            $data['header_list'] = $this->m_home->get_list();

            $this->load->view('menu/profil/so',$data);      
        }else if($nama == 'prestasi_dosen'){
            $data['prestasi'] = $this->m_menu->get_list($nama);
            $data['kontak'] = $this->m_home->get_kontak();

            $this->load->view('menu/profil/prestasi_dosen.php',$data);   
        }else if($nama == 'pengajar'){
            $GetPage = $this->input->get('page');
            $page = (isset($GetPage))? $GetPage : 1;		
            $limit = 20;
            $limit_start = ($page - 1) * $limit;	
            $no = $limit_start + 1;
            $tabel='dosen';
        
            $data['kontak'] = $this->m_home->get_kontak();
            $data['header'] = $this->m_halaman->get_header();
            $data['dosen'] = $this->m_menu->get_dosen($limit,$limit_start);
            $data['jumlahData'] = $this->m_halaman->jumlah_data($tabel);
            $data['data'] = array(
                'page' => $page,
                'limit' => $limit,
                'no' => $no
            );
            
            $this->load->view('menu/dosen/getuser.php',$data);   
            $this->load->view('menu/dosen/dosen.php',$data);   
        }
    }

    function tampil_view($id) {
        $data['kontak'] = $this->m_home->get_kontak();
        $data['list'] = $this->m_menu->get_allList($id);
        $data['header_menu'] = $this->m_home->get_menu("menu");
        $data['header_sub'] = $this->m_home->get_menu("sub_menu");
        $data['header_list'] = $this->m_home->get_list();

        $this->load->view('menu/pageview.php',$data);   
    }

    function tampil_akademik($nama) {
        if($nama == 'k_a'){
            $data['header'] = $this->m_halaman->get_header();
            $data['kontak'] = $this->m_home->get_kontak();
            $data['header_menu'] = $this->m_home->get_menu("menu");
            $data['header_sub'] = $this->m_home->get_menu("sub_menu");
            $data['header_list'] = $this->m_home->get_list();

            $this->load->view('menu/akademik/kalender.php',$data);      
        }
    }

    function tampil_prestasi() {

        $GetPage = $this->input->get('page');
         $hal = (isset($GetPage) && ctype_digit($GetPage) && $GetPage > 0) ? $GetPage : 1;
        $per_hal=10;
        $start = ($hal - 1) * $per_hal;
        $no = $start + 1;
        $coba = "";
        $status = "awal";
        $isi ="";
        $prodi="";
        $tahun="";

        $data['header'] = $this->m_halaman->get_header();
        $data['kontak'] = $this->m_home->get_kontak();
        $data['header_menu'] = $this->m_home->get_menu("menu");
        $data['header_sub'] = $this->m_home->get_menu("sub_menu");
        $data['header_list'] = $this->m_home->get_list();
        $data['prodi'] = $this->m_menu->get_dataprodi();
        $data['prestasi'] = $this->m_admin->get_dataprestasi($start,$per_hal);
        $jumlah_baris = $this->m_admin->get_totalprestasi();
        $halaman=ceil($jumlah_baris / $per_hal);

        $data['data'] = array(
            'nama' => 'prestasi',
            'halaman' => $halaman,
            'hal' => $hal,
            'per_hal' => $per_hal,
            'start' => $start,
            'no' => $no,
            'page' => $hal,
            'coba' => $coba,
            'status' => $status,
            'isi' => $isi,
            'prodi' =>$prodi,
            'tahun'=>$tahun
        );

        $this->load->view('menu/akademik/prestasi.php',$data);          
        
    }

    function filter_prestasi() {
        $prodi = str_replace("'", "", $this->input->post('prodi'));
        $tahun = str_replace("'", "", $this->input->post('tahun'));
        $GetPage = $this->input->get('page');
        $hal = (isset($GetPage))? $GetPage : 1;		
        $per_hal=10;
        $start = ($hal - 1) * $per_hal;
        $no = $start + 1;
        $coba = "";
        $status = "awal";
        $isi ="";

        $data['header'] = $this->m_halaman->get_header();
        $data['kontak'] = $this->m_home->get_kontak();
        $data['header_menu'] = $this->m_home->get_menu("menu");
        $data['header_sub'] = $this->m_home->get_menu("sub_menu");
        $data['header_list'] = $this->m_home->get_list();
        $data['prodi'] = $this->m_menu->get_dataprodi();
        $data['prestasi'] = $this->m_menu->get_dataPrestasibyfilter($start,$per_hal,$prodi,$tahun);
        $jumlah_baris = $this->m_admin->get_totalprestasi();
        $halaman=ceil($jumlah_baris / $per_hal);

        if(isset($data['prestasi']) && !empty($data['prestasi'])){
            $status ="filter";
            $isi = "ada";
        }else{
            $status ="filter";
            $isi = "kosong";
        }

        $data['data'] = array(
            'nama' => 'prestasi',
            'halaman' => $halaman,
            'hal' => $hal,
            'per_hal' => $per_hal,
            'start' => $start,
            'no' => $no,
            'page' => $GetPage,
            'coba' => $coba,
            'status' => $status,
            'isi' => $isi,
            'prodi' =>$prodi,
            'tahun'=>$tahun
        );

        $this->load->view('menu/akademik/prestasi.php',$data);   
    }

    function print_prestasi() {
        $id_prodi = $this->input->get('prodi');
        $tahun = $this->input->get('tahun');
        $GetPage = $this->input->get('page');
        $hal = (isset($GetPage))? $GetPage : 1;		
        $per_hal=10;
        $start = ($hal - 1) * $per_hal;
        $data['prestasi'] = $this->m_menu->get_dataPrestasibyfilter($start,$per_hal,$id_prodi,$tahun);
        $prodi = $this->m_menu->get_dataprodibyid($id_prodi);

        $data['data'] = array(
            'prodi' =>$prodi,
            'tahun'=>$tahun
        );

        $this->load->library('pdf');
        $this->pdf->setPaper('A4');
        $this->pdf->filename = "prestasi.pdf";
        $this->pdf->load_view('menu/akademik/print-prestasi.php',$data);
    }

}