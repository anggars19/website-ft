<?php
class m_menu extends CI_Model
{
  function get_list($nama) {
    $this->db->select('*');
    $this->db->from('list');
    $this->db->where('tema',$nama);
    $this->db->where('id_prodi','f5');
    $this->db->where('id_fakultas', '5');

      return $this->db->get()->result_array();
  }

  function get_allList($id) {
    $this->db->select('*');
    $this->db->from('list');
    $this->db->where('id_list',$id);
    $this->db->where('id_prodi','f5');
    $this->db->where('id_fakultas', '5');

      return $this->db->get()->result_array();
  }

  function get_dosen($limit,$limit_start) {
    $this->db->select('dosen.id_dosen,dosen.nama,dosen.nip,dosen.id_prodi');
    $this->db->from('dosen');
    $this->db->join('prodi', 'prodi.id_prodi = dosen.id_prodi');
    // $this->db->where('dosen.id_prodi','f5');
    $this->db->where('dosen.id_fakultas','5');
    $this->db->limit($limit, $limit_start);
    
    return $this->db->get()->result_array();
  }

  function get_dataprestasi($id) {
    $this->db->select('*');
    $this->db->from('prestasi');
    $this->db->where('id_prestasi',$id);
    $this->db->where('id_fakultas','5');
    $this->db->where('id_prodi','f5');

    return $this->db->get()->result_array();
}

  function get_dataprodi() {
    $this->db->select('id_prodi,nama_prodi');
    $this->db->from('prodi');
    $this->db->where('id_fakultas','5');

    return $this->db->get()->result_array();
  }

  function get_dataprodibyid($id) {
    $this->db->select('nama_prodi');
    $this->db->from('prodi');
    $this->db->where('id_fakultas','5');
    $this->db->where('id_prodi',$id);

    return $this->db->get()->row_array();
  }

  function get_dataPrestasibyfilter($start,$per_hal,$prodi,$tahun) {
    $this->db->select('*');
    $this->db->from('prestasi');
    $this->db->where('id_fakultas','5');
    $this->db->where('id_prodi',$prodi);
    $this->db->where('YEAR(tanggal_prestasi)', $tahun);
    $this->db->order_by('id_prestasi', 'DESC');
    $this->db->limit($per_hal,$start);

    return $this->db->get()->result_array();
}
}
