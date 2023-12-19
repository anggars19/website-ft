<?php
class m_auth extends CI_Model
{
function get_user($username,$password,$id) {
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('username',$username);
    $this->db->where('password',$password);
    $this->db->where('id_fakultas',$id);

    return $this->db->get()->row();
}

function get_fakultas($id) {
    $this->db->select('id_fakultas,kode_fakultas');
    $this->db->from('fakultas');
    $this->db->where('id_fakultas',$id);

    return $this->db->get()->row();
}

function get_prodi($id) {
    $this->db->select('id_prodi,kode_prodi,id_fakultas');
    $this->db->from('prodi');
    $this->db->where('id_fakultas',$id);

    return $this->db->get()->row();
}

public function get($id)
{
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where('id_admin = ', $id);
    $query = $this->db->get();
    return $query;
}
}