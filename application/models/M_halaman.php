<?php
class m_halaman extends CI_Model
{
  function get_beritaById($id) {
    $this->db->select('*');
    $this->db->from('berita');
    $this->db->where('id_berita',$id);

    return $this->db->get()->result_array();
  }

  function get_berita() {
    $this->db->select('berita.id_berita,berita.judul,berita.isi,berita.gambar,berita.id_prodi,
                       berita.id_fakultas,berita.tgl_posting,berita.id_biro,
                       prodi.singkatan_prodi as x,fakultas.singkatan_fakultas');
    $this->db->from('berita');
    $this->db->join('prodi', 'prodi.id_prodi = berita.id_prodi');
    $this->db->join('fakultas', 'fakultas.id_fakultas = berita.id_fakultas');
    // $this->db->where('berita.id_prodi','f5');
    $this->db->where('berita.id_fakultas','5');
    $this->db->group_by('berita.tgl_posting');
    $this->db->order_by('berita.tgl_posting', 'DESC');
    $this->db->limit('5');
    
    return $this->db->get()->result_array();
}


function get_pengumuman() {
  $this->db->select('pengumuman.id_pengumuman,pengumuman.judul,pengumuman.isi,pengumuman.gambar,pengumuman.id_prodi,
                     pengumuman.id_fakultas,pengumuman.tgl_posting,pengumuman.id_biro,
                     prodi.singkatan_prodi as x,fakultas.singkatan_fakultas');
  $this->db->from('pengumuman');
  $this->db->join('prodi', 'prodi.id_prodi = pengumuman.id_prodi');
  $this->db->join('fakultas', 'fakultas.id_fakultas = pengumuman.id_fakultas');
  $this->db->where('pengumuman.id_prodi','f5');
  $this->db->or_where('pengumuman.id_fakultas','5');
  $this->db->group_by('pengumuman.tgl_posting');
  $this->db->order_by('pengumuman.tgl_posting', 'DESC');
  $this->db->limit('5');
  
  return $this->db->get()->result_array();
}

function updateVisitor($id,$namaId,$tabel) {
  $this->db->set('visitors', 'visitors+1', FALSE);
  $this->db->where($namaId, $id);
  $this->db->update($tabel);
}

function get_header() {
  $this->db->select('*');
  $this->db->from('header');
  $this->db->where('header.id_fakultas','5');

  return $this->db->get()->result_array();
}

function get_Daftarberita($limit,$limit_start) {
  $this->db->select('berita.id_berita,berita.judul,berita.isi,berita.gambar,berita.id_prodi,
                     berita.id_fakultas,berita.tgl_posting,berita.id_biro,
                     prodi.nama_prodi as x,fakultas.nama_fakultas');
  $this->db->from('berita');
  $this->db->join('prodi', 'prodi.id_prodi = berita.id_prodi');
  $this->db->join('fakultas', 'fakultas.id_fakultas = berita.id_fakultas');
  // $this->db->where('berita.id_prodi','f5');
  $this->db->where('berita.id_fakultas','5');
  $this->db->group_by('berita.tgl_posting');
  $this->db->order_by('berita.tgl_posting', 'DESC');
  $this->db->limit($limit, $limit_start);
  
  return $this->db->get()->result_array();
}

function jumlah_data($tabel) {
  $this->db->select('count(*) as jumlah');
  $this->db->from($tabel);
  $this->db->where('id_fakultas','5');

  return $this->db->get()->result_array();
}

function get_pengumumanById($id) {
  $this->db->select('*');
  $this->db->from('pengumuman');
  $this->db->where('id_pengumuman',$id);

  return $this->db->get()->result_array();
}

function get_Daftarpengumuman($limit,$limit_start) {
  $this->db->select('pengumuman.id_pengumuman,pengumuman.judul,pengumuman.isi,pengumuman.gambar,pengumuman.id_prodi,
                     pengumuman.id_fakultas,pengumuman.tgl_posting,pengumuman.id_biro,
                     prodi.nama_prodi as x,fakultas.nama_fakultas');
  $this->db->from('pengumuman');
  $this->db->join('prodi', 'prodi.id_prodi = pengumuman.id_prodi');
  $this->db->join('fakultas', 'fakultas.id_fakultas = pengumuman.id_fakultas');
  // $this->db->where('pengumuman.id_prodi','f5');
  $this->db->where('pengumuman.id_fakultas','5');
  $this->db->group_by('pengumuman.tgl_posting');
  $this->db->order_by('pengumuman.tgl_posting', 'DESC');
  $this->db->limit($limit, $limit_start);
  
  return $this->db->get()->result_array();
}

function get_agendaById($id) {
  $this->db->select('*');
  $this->db->from('agenda');
  $this->db->where('id_agenda',$id);

  return $this->db->get()->result_array();
}

function get_Daftaragenda($limit,$limit_start) {
  $this->db->select('agenda.id_agenda,agenda.judul,agenda.isi,agenda.gambar,agenda.id_prodi,
                     agenda.id_fakultas,agenda.tgl_posting,agenda.id_biro,
                     prodi.nama_prodi as x,fakultas.nama_fakultas');
  $this->db->from('agenda');
  $this->db->join('prodi', 'prodi.id_prodi = agenda.id_prodi');
  $this->db->join('fakultas', 'fakultas.id_fakultas = agenda.id_fakultas');
  // $this->db->where('agenda.id_prodi','f5');
  $this->db->where('agenda.id_fakultas','5');
  $this->db->group_by('agenda.tgl_posting');
  $this->db->order_by('agenda.tgl_posting', 'DESC');
  $this->db->limit($limit, $limit_start);
  
  return $this->db->get()->result_array();
}

function get_galeri() {
  $this->db->select('*');
  $this->db->from('galeri');
  $this->db->where('fungsi','galeri');
  $this->db->where('id_prodi','f5');
  $this->db->where('id_fakultas', '5');
  $this->db->order_by('galeri.id_galeri', 'DESC');
  $this->db->limit('16');

  return $this->db->get()->result_array();
}
}
