<?php

class Auth extends CI_Controller
{
    function index() {
        $this->load->view('admin/index.php');      
    }
function cek() {
   if($this->session->userdata('kodecap') ==  $this->input->post('kodeval')) {			
        $a = array('\'', '/',';', '[', ']', '{', '}', '|', '^', '~',',',"'",'"');
        $password=md5(str_replace($a, "", ($_POST['password'])));
        $username=str_replace($a, "", ($_POST['username']));
        $id_prodi='f5';
        $id_fakultas='5';
        $id_biro='0';
        $id_sij=517;
        $kode_fakultas='05';

        $querylogin = $this->m_auth->get_user($username,$password,$id_fakultas);
        $sij = $this->m_auth->get_user($username,$password,$id_sij);
       
        
        if ($querylogin)
        {   
            $this->session->set_userdata('userlogin',$querylogin->username);
            $this->session->set_userdata('id_prodi', $querylogin->id_prodi);
            $this->session->set_userdata('id_fakultas', $querylogin->id_fakultas);
            $this->session->set_userdata('id_biro',0);
            //untuk menu template, dan pengambilan data tbl prodi sesuai dengan  id prodi
            $querylogin2 = $this->m_auth->get_fakultas($id_fakultas);
            if ($querylogin2)
            {
                $this->session->set_userdata('id_fakultas', $querylogin2->id_fakultas);
        
                // Redirect ke halaman 'main.php' atau yang sesuai
               //redirect('main');	
             echo "<script type='text/javascript'>window.location.href = '".base_url('main')."';</script>";
            
            }
        }	else{
            echo '<script language="javascript">alert("username atau password tidak sesuai  !"); document.location="'.base_url('sij-wpa').'";</script>';
        }
        //login khusus SIJ
        if ($sij)
        {
            $this->session->set_userdata('userlogin', $sij['username']);
            $querylogin21 = $this->m_auth->get_prodi($id_fakultas);
            if ($querylogin21)
            {
               
            //$_SESSION['userlogin'] = $datalogin['username'];						
            $this->session->set_userdata('id_prodi', $querylogin21->id_prodi);
            $this->session->set_userdata('id_fakultas', $querylogin21->id_fakultas);
            $this->session->set_userdata('kode_prodi', $querylogin21->kode_prodi);
            $this->session->set_userdata('id_biro',0);
            
            
            redirect('main.php');
            //header("location:main.php");	
            }
            //}
        }
        
   }else{
    echo '<script language="javascript">alert("kode captcha tidak sesuai  !"); document.location="'.base_url('sij-wpa').'";</script>';
   }
}

function Logout() {
	session_destroy();
 echo "<script type='text/javascript'>window.location.href = '".base_url('sij-wpa')."';</script>";
}

function captcha() {
    
    $this->load->library('session'); // Memastikan sesi dimulai dengan cara CodeIgniter

    $width = 75; // Ukuran lebar
    $height = 25; // Tinggi
    $im = imagecreate($width, $height);
    $bg = imagecolorallocate($im, 0, 0, 0);
    $len = 5; // Panjang karakter 
    $chars = '12345abcdefg'; // Kombinasi huruf dan angka yang diacak
    $string = '';
    for ($i = 0; $i < $len; $i++) {
        $pos = mt_rand(0, strlen($chars) - 1);
        $string .= $chars[$pos];
    }

    $this->session->set_userdata('kodecap', $string); // Menyimpan hasil acak dalam sesi dengan cara CodeIgniter

    // Menambahkan titik-titik gambar / noise
    $bgR = mt_rand(100, 200); $bgG = mt_rand(100, 200); $bgB = mt_rand(100, 200);
    $noise_color = imagecolorallocate($im, abs(255 - $bgR), abs(255 - $bgG), abs(255 - $bgB));
    for($i = 0; $i < ($width * $height) / 3; $i++) {
        imagefilledellipse($im, mt_rand(0, $width), mt_rand(0, $height), 3, mt_rand(2, 5), $noise_color);
    }

    // Proses membuat tulisan
    $text_color = imagecolorallocate($im, 240, 240, 240);
    $rand_x = mt_rand(0, $width - 50);
    $rand_y = mt_rand(0, $height - 15);
    imagestring($im, 5, $rand_x, $rand_y, $string, $text_color); // Pastikan font size tersedia

    header("Content-type: image/png"); // Output format gambar
    imagepng($im);
    imagedestroy($im); // Membersihkan memory


}
}