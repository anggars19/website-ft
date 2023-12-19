<?php
class m_home extends CI_Model
{
    function get_slide() {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where('fungsi','slide');
        $this->db->or_where('id_fakultas', '5');
        $this->db->limit('5');

        return $this->db->get()->result();
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
        $this->db->limit('10');
        
        return $this->db->get()->result_array();
    }
   
    function get_galeri() {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where('fungsi','galeri');
        $this->db->where('id_prodi','f5');
        $this->db->where('id_fakultas', '5');
        $this->db->order_by('galeri.id_galeri', 'DESC');
        $this->db->limit('8');

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
        $this->db->limit('10');
        
        return $this->db->get()->result_array();
    }

    function get_agenda() {
        $this->db->select('agenda.id_agenda,agenda.judul,agenda.isi,agenda.gambar,agenda.id_prodi,
                           agenda.id_fakultas,agenda.tgl_posting,agenda.id_biro,
                           prodi.singkatan_prodi as x,fakultas.singkatan_fakultas');
        $this->db->from('agenda');
        $this->db->join('prodi', 'prodi.id_prodi = agenda.id_prodi');
        $this->db->join('fakultas', 'fakultas.id_fakultas = agenda.id_fakultas');
        $this->db->where('agenda.id_prodi','f5');
        $this->db->or_where('agenda.id_fakultas','5');
        $this->db->group_by('agenda.tgl_posting');
        $this->db->order_by('agenda.tgl_posting', 'DESC');
        $this->db->limit('10');
        
        return $this->db->get()->result_array();
    }

    function get_kontak() {
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->where('id_prodi','f5');
        $this->db->where('id_fakultas', '5');

        return $this->db->get()->result_array();
    }

    function get_template() {
        $this->db->select('*');
        $this->db->from('template');
        $this->db->where('id_prodi','f5');
        $this->db->where('id_fakultas', '5');

        return $this->db->get()->result_array();
    }

    function get_menu($tabel) {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('tampil','Y');
        $this->db->where('id_prodi','f5');
        $this->db->where('id_fakultas', '5');

        return $this->db->get()->result_array();
    }

    function get_list() {
        $this->db->select('*');
        $this->db->from('list');
        $this->db->where('tampil','Y');
        $this->db->where('id_prodi','f5');
        $this->db->where('id_fakultas', '5');

        return $this->db->get()->result_array();
    }

        public function get_cari($search, $id_fakultas) {
        $sql = "(SELECT judul, isi as kutipan, 'berita' as bagian, tgl_posting as tanggal, id_berita as kode, id_prodi as prodi, id_fakultas as fakultas
        FROM berita
        WHERE judul LIKE '%$search%' AND id_fakultas = '$id_fakultas')
       UNION
       (SELECT judul, isi as kutipan, 'agenda' as bagian, tgl_posting as tanggal, id_agenda as kode, id_prodi as prodi, id_fakultas as fakultas
        FROM agenda
        WHERE judul LIKE '%$search%' AND id_fakultas = '$id_fakultas')
       UNION
       (SELECT judul, isi as kutipan, 'pengumuman' as bagian, tgl_posting as tanggal, id_pengumuman as kode, id_prodi as prodi, id_fakultas as fakultas
        FROM pengumuman
        WHERE judul LIKE '%$search%' AND id_fakultas = '$id_fakultas')
       UNION
       (SELECT nama_prestasi as judul, penyelenggara as kutipan, 'prestasi' as bagian, tanggal as tanggal, id_prestasi as kode, id_prodi as prodi, id_fakultas as fakultas
        FROM prestasi
        WHERE nama_prestasi LIKE '%$search%' AND id_fakultas = '$id_fakultas')";

        $result = $this->db->query($sql)->result_array();
        return $result;
    }
}
