<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['slide'] = $this->m_home->get_slide();
        $data['berita'] = $this->m_home->get_berita();
        $data['galeri'] = $this->m_home->get_galeri();
        $data['pengumuman'] = $this->m_home->get_pengumuman();
        $data['agenda'] = $this->m_home->get_agenda();
        $data['kontak'] = $this->m_home->get_kontak();
        $data['template'] = $this->m_home->get_template();
        $data['header_menu'] = $this->m_home->get_menu("menu");
        $data['header_sub'] = $this->m_home->get_menu("sub_menu");
        $data['header_list'] = $this->m_home->get_list();
        
        $this->load->view('index',$data);      
    }

    function coba() {
        $data  = array(
            'judul' => "judul halaman"
        );
    
        $this->load->view('coba',$data);  
    }

    function tampil_view($id) {
        $data['kontak'] = $this->m_home->get_kontak();
        $data['list'] = $this->m_menu->get_allList($id);
        $data['header_menu'] = $this->m_home->get_menu("menu");
        $data['header_sub'] = $this->m_home->get_menu("sub_menu");
        $data['header_list'] = $this->m_home->get_list();
        
        $this->load->view('menu/pageview.php',$data);   
    }

        function search() {
        $GetKeyword =  str_replace("'", "",$this->input->get('keyword'));
        $searchfor	= array("<?php","script","'");
        $berbahaya = false;
        $id_fakultas=5;

        foreach ($searchfor as $searchfor) {
            if (preg_match("/\b$searchfor\b/", $GetKeyword)) {
                $berbahaya = true;
            break;
            }
        }

        if ($berbahaya) {
            $data['data']  = array('keyword' => '');
            $this->load->view('search',$data);   
        }
        if(preg_match("/'/", $_GET['keyword'])){
            $data['data']  = array('keyword' => '');
            $this->load->view('search',$data);  
        }
        if(preg_match("/<script>/", $_GET['keyword'])){
            $data['data']  = array('keyword' => '');
            $this->load->view('search',$data);  
        }	

        $data['kontak'] = $this->m_home->get_kontak();
        $data['header_menu'] = $this->m_home->get_menu("menu");
        $data['header_sub'] = $this->m_home->get_menu("sub_menu");
        $data['header_list'] = $this->m_home->get_list();
        if($berbahaya){
            $data['data']  = array('keyword' => '');

            $this->load->view('search',$data);   
        }else if((preg_match("/'/", $_GET['keyword']))){
            $data['data']  = array('keyword' => '');

            $this->load->view('search',$data);   
        }else if(preg_match("/<script>/", $_GET['keyword'])){
            $data['data']  = array('keyword' => '');

            $this->load->view('search',$data);   
        }else{
            $data['cari'] = $this->m_home->get_cari($GetKeyword,$id_fakultas);
            $data['data']  = array('keyword' => $GetKeyword);
    
            $this->load->view('search',$data);   
        };    
    }
}
