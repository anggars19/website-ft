<?php
class m_admin extends CI_Model
{
    function get_data($tabel) {
        return $this->db->get($tabel);
    }

    function total_data($id,$tabel,$fungsi)  {
        if($fungsi==''){
        $this->db->select('count('.$id.') as total');
        $this->db->from($tabel);
        $this->db->where('id_fakultas','5');
        }else{
            $this->db->select('count('.$id.') as total');
            $this->db->from($tabel);
            $this->db->where('id_fakultas','5');
            $this->db->where('fungsi',$fungsi);
        }
        return $this->db->get()->row();
    }

    function get_dataInformasi($id,$tabel,$fungsi,$limit,$limit_start) {
        if($fungsi==''){
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where('id_fakultas','5');
            $this->db->where('id_prodi','f5');
            $this->db->order_by($id, 'DESC');
            $this->db->limit($limit, $limit_start);
            }else{
                $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where('id_fakultas','5');
            $this->db->where('id_prodi','f5');
            $this->db->where('fungsi',$fungsi);
            $this->db->order_by($id, 'DESC');
            $this->db->limit($limit, $limit_start);
            }
            return $this->db->get()->result_array();
    }

    function get_totalInformasi($id,$tabel)  {
        $this->db->select('count('.$id.') as jumlah');
        $this->db->from($tabel);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
    
        return $this->db->get()->row();
    }

    public function get_dataById($tabel,$where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function input_data($tabel,$data)
    {
        $this->db->insert($tabel, $data);
    }

    public function update_data($tabel,$where,$data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    function delete_data($tabel,$where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    function get_totalGaleri($fungsi)  {
        $this->db->select('count(*) as total_rows');
        $this->db->from('galeri');
        $this->db->where('fungsi',$fungsi);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
    
        $result = $this->db->get()->row();
        return $result->total_rows;
    }

    function get_dataGaleri($fungsi,$start,$per_hal) {
        $this->db->select('*');
        $this->db->from('galeri');
        $this->db->where('fungsi',$fungsi);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
        $this->db->order_by('id_galeri', 'DESC');
        $this->db->limit($per_hal,$start);

        return $this->db->get()->result_array();
    }

    function get_dataList($tema) {
        $this->db->select('*');
        $this->db->from('list');
        $this->db->where('tema',$tema);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');

        return $this->db->get()->result_array();
    }

    function get_dataprestasi($start,$per_hal) {
        $this->db->select('*');
        $this->db->from('prestasi');
        $this->db->where('id_fakultas','5');
        // $this->db->where('id_prodi','f5');
        $this->db->order_by('id_prestasi', 'DESC');
        $this->db->limit($per_hal,$start);

        return $this->db->get()->result_array();
    }

    function get_totalprestasi()  {
        $this->db->select('count(*) as total_rows');
        $this->db->from('prestasi');
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
    
        $result = $this->db->get()->row();
        return $result->total_rows;
    }

    function get_dataPage($limit,$limit_start,$keyword) {
       
            $this->db->select('*');
            $this->db->from('list');
            if(isset($keyword) && !empty($keyword)){
                $this->db->like('tema', $keyword);
            }
            $this->db->where('id_fakultas','5');
            $this->db->where('id_prodi','f5');
            $this->db->order_by('id_list', 'ASC');
            $this->db->limit($limit, $limit_start);
            return $this->db->get()->result_array();
    }

    function get_totalPage()  {
        $this->db->select('count(id_list) as jumlah');
        $this->db->from('list');
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
    
        return $this->db->get()->row();
    }

    function min_chart($tabel)  {
        $this->db->select('min(visitors) as min');
        $this->db->from($tabel);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
        return $this->db->get()->result_array();
    }

    function chart($min,$tabel,$id) {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
        $this->db->where('visitors >=',$min);
        $this->db->order_by($id, 'DESC');
        $this->db->limit(8);

        return $this->db->get()->result_array();
    }

    function chart1($min,$tabel) {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
        $this->db->where('visitors >=',$min);
        $this->db->order_by('visitors', 'DESC');
        $this->db->limit(10);

        return $this->db->get()->result_array();
    }

    function get_dataPengaturan($tabel,$id_fakultas,$userlogin) {
        if(isset($id_fakultas) && !empty($id_fakultas)){
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where('id_fakultas',$id_fakultas);
            $this->db->where('username',$userlogin);
        }else{
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where('id_fakultas','5');
            $this->db->where('id_prodi','f5');
        }
       

        return $this->db->get()->result_array();
    }

    function get_datamenu($limit,$limit_start,$keyword,$tabel,$id) {
       
        $this->db->select('*');
        $this->db->from($tabel);
        if(isset($keyword) && !empty($keyword)){
            $this->db->like('nama', $keyword);
        }
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');
        $this->db->order_by($id, 'ASC');
        $this->db->limit($limit, $limit_start);
        return $this->db->get()->result_array();
}

    function get_totalmenu($id,$tabel)  {
        $this->db->select('count('.$id.') as jumlah');
        $this->db->from($tabel);
        $this->db->where('id_fakultas','5');
        $this->db->where('id_prodi','f5');

        return $this->db->get()->row();
    }
    function subJoinmenu($limit,$limit_start,$keyword) {
        $this->db->select('sub_menu.*, menu.nama as nama_menu');
        $this->db->from('sub_menu');
        $this->db->join('menu', 'menu.id_menu = sub_menu.id_menu','left');
        if(isset($keyword) && !empty($keyword)){
            $this->db->like('sub_menu.nama', $keyword);
        }
        $this->db->where('sub_menu.id_fakultas','5');
        $this->db->where('sub_menu.id_prodi','f5');
        $this->db->order_by('sub_menu.id_sub', 'ASC');
        $this->db->limit($limit, $limit_start);
        return $this->db->get()->result_array();
    }

    function JoinMenuAndSub($limit,$limit_start,$keyword) {
        $this->db->select('list.*, menu.nama as nama_menu,sub_menu.nama as nama_sub');
        $this->db->from('list');
        $this->db->join('menu', 'menu.id_menu = list.id_menu','left');
        $this->db->join('sub_menu', 'sub_menu.id_sub = list.id_sub','left');
        if(isset($keyword) && !empty($keyword)){
            $this->db->like('list.tema', $keyword);
        }
        $this->db->where('list.id_fakultas','5');
        $this->db->where('list.id_prodi','f5');
        $this->db->order_by('list.id_list', 'ASC');
        $this->db->limit($limit, $limit_start);
        return $this->db->get()->result_array();
    }

        function getNama($nama,$tabel)  {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('nama', $nama);
        $query = $this->db->get();
        return $query;
    }

    function getUser($id_fakultas,$username)  {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$username);
        $this->db->where('id_fakultas',$id_fakultas);
    
        return $this->db->get()->row();
    }
}

