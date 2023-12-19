<?php
class Fungsi
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $id = $this->ci->session->userdata('id_admin');
        $data = $this->ci->m_auth->get($id)->row();
        return $data;
    }
}
