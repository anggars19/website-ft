<?php

class Halaman extends CI_Controller
{

function tampil_berita($id) {
    //echo $id;
    $antiinject= str_replace("'", "",$id);
	$id1 = intval($antiinject);
    if(preg_match("/'/",$id))
    {
    session_start();
    session_destroy();
    header("location:template/404.php");
    exit();		
    }

    $data['berita'] = $this->m_halaman->get_beritaById($id1);
    $data['Nberita'] = $this->m_halaman->get_berita();
    $data['pengumuman'] = $this->m_halaman->get_pengumuman();
    $data['kontak'] = $this->m_home->get_kontak();
    $data['header_menu'] = $this->m_home->get_menu("menu");
    $data['header_sub'] = $this->m_home->get_menu("sub_menu");
    $data['header_list'] = $this->m_home->get_list();
    $tabel = 'berita';
    $namaId='id_berita';
    $this->m_halaman->updateVisitor($id1,$namaId,$tabel);

    $this->load->view('halaman/berita.php',$data);      
}

function print_berita($id) {
    $antiinject= str_replace("'", "",$id);
	$id1 = intval($antiinject);
    if(preg_match("/'/",$id))
    {
    session_start();
    session_destroy();
    header("location:template/404.php");
    exit();		
    }

    $data['berita'] = $this->m_halaman->get_beritaById($id1);
    $data['header'] = $this->m_halaman->get_header();

    $this->load->library('pdf');
    $this->pdf->setPaper('A4');
    $this->pdf->filename = "berita.pdf";
    $this->pdf->load_view('halaman/print-berita.php', $data);
}

function daftar_berita() {
    $GetPage = $this->input->get('page');
    $page = (isset($GetPage))? $GetPage : 1;		
    $limit = 10;
    $limit_start = ($page - 1) * $limit;	
    $no = $limit_start + 1;
    $tabel= 'berita';

    $data['kontak'] = $this->m_home->get_kontak();
    $data['header'] = $this->m_halaman->get_header();
    $data['berita'] = $this->m_halaman->get_Daftarberita($limit,$limit_start);
    $data['jumlahData'] = $this->m_halaman->jumlah_data($tabel);
    $data['header_menu'] = $this->m_home->get_menu("menu");
    $data['header_sub'] = $this->m_home->get_menu("sub_menu");
    $data['header_list'] = $this->m_home->get_list();
    $data['data'] = array(
        'page' => $page,
        'limit' => $limit,
        'no' => $no
    );
    
    $this->load->view('halaman/daftar-berita.php',$data);     
}

function tampil_pengumuman($id) {
    //echo $id;
    $antiinject= str_replace("'", "",$id);
	$id1 = intval($antiinject);
    if(preg_match("/'/",$id))
    {
    session_start();
    session_destroy();
    header("location:template/404.php");
    exit();		
    }

    $data['pengumuman'] = $this->m_halaman->get_pengumumanById($id1);
    $data['berita'] = $this->m_halaman->get_berita();
    $data['Npengumuman'] = $this->m_halaman->get_pengumuman();
    $data['kontak'] = $this->m_home->get_kontak();
    $data['header_menu'] = $this->m_home->get_menu("menu");
    $data['header_sub'] = $this->m_home->get_menu("sub_menu");
    $data['header_list'] = $this->m_home->get_list();
    $tabel = 'pengumuman';
    $namaId='id_pengumuman';
    $this->m_halaman->updateVisitor($id1,$namaId,$tabel);

    $this->load->view('halaman/pengumuman.php',$data);      
}

function print_pengumuman($id) {
    $antiinject= str_replace("'", "",$id);
	$id1 = intval($antiinject);
    if(preg_match("/'/",$id))
    {
    session_start();
    session_destroy();
    header("location:template/404.php");
    exit();		
    }

    $data['pengumuman'] = $this->m_halaman->get_pengumumanById($id1);
    $data['header'] = $this->m_halaman->get_header();

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "pengumumn.pdf";
    $this->pdf->load_view('halaman/print-pengumuman.php', $data);
}

function daftar_pengumuman() {
    $GetPage = $this->input->get('page');
    $page = (isset($GetPage))? $GetPage : 1;		
    $limit = 10;
    $limit_start = ($page - 1) * $limit;	
    $no = $limit_start + 1;
    $tabel='pengumuman';

    $data['kontak'] = $this->m_home->get_kontak();
    $data['header'] = $this->m_halaman->get_header();
    $data['pengumuman'] = $this->m_halaman->get_Daftarpengumuman($limit,$limit_start);
    $data['jumlahData'] = $this->m_halaman->jumlah_data($tabel);
    $data['header_menu'] = $this->m_home->get_menu("menu");
    $data['header_sub'] = $this->m_home->get_menu("sub_menu");
    $data['header_list'] = $this->m_home->get_list();
    $data['data'] = array(
        'page' => $page,
        'limit' => $limit,
        'no' => $no
    );
    
    $this->load->view('halaman/daftar-pengumuman.php',$data);     
}

function tampil_agenda($id) {
    //echo $id;
    $antiinject= str_replace("'", "",$id);
	$id1 = intval($antiinject);
    if(preg_match("/'/",$id))
    {
    session_start();
    session_destroy();
    header("location:template/404.php");
    exit();		
    }

    $data['agenda'] = $this->m_halaman->get_agendaById($id1);
    $data['berita'] = $this->m_halaman->get_berita();
    $data['pengumuman'] = $this->m_halaman->get_pengumuman();
    $data['kontak'] = $this->m_home->get_kontak();
    $data['header_menu'] = $this->m_home->get_menu("menu");
    $data['header_sub'] = $this->m_home->get_menu("sub_menu");
    $data['header_list'] = $this->m_home->get_list();
    $tabel = 'agenda';
    $namaId='id_agenda';
    $this->m_halaman->updateVisitor($id1,$namaId,$tabel);

    $this->load->view('halaman/agenda.php',$data);      
}

function print_agenda($id) {
    $antiinject= str_replace("'", "",$id);
	$id1 = intval($antiinject);
    if(preg_match("/'/",$id))
    {
    session_start();
    session_destroy();
    header("location:template/404.php");
    exit();		
    }

    $data['agenda'] = $this->m_halaman->get_agendaById($id1);
    $data['header'] = $this->m_halaman->get_header();

    $this->load->library('pdf');
    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "agenda.pdf";
    $this->pdf->load_view('halaman/print-agenda.php', $data);
}

function daftar_agenda() {
    $GetPage = $this->input->get('page');
    $page = (isset($GetPage))? $GetPage : 1;		
    $limit = 10;
    $limit_start = ($page - 1) * $limit;	
    $no = $limit_start + 1;
    $tabel='agenda';

    $data['kontak'] = $this->m_home->get_kontak();
    $data['header'] = $this->m_halaman->get_header();
    $data['agenda'] = $this->m_halaman->get_Daftaragenda($limit,$limit_start);
    $data['jumlahData'] = $this->m_halaman->jumlah_data($tabel);
    $data['header_menu'] = $this->m_home->get_menu("menu");
    $data['header_sub'] = $this->m_home->get_menu("sub_menu");
    $data['header_list'] = $this->m_home->get_list();
    $data['data'] = array(
        'page' => $page,
        'limit' => $limit,
        'no' => $no
    );
    
    $this->load->view('halaman/daftar-agenda.php',$data);     
}

function daftar_galeri() {
    $data['kontak'] = $this->m_home->get_kontak();
    $data['header'] = $this->m_halaman->get_header();
    $data['galeri'] = $this->m_halaman->get_galeri();
    
    $this->load->view('halaman/daftar-galery.php',$data);     
}
}