<?php
class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function delete($table, $field, $id)
    {
        $data = $this->db->delete($table, array($field => $id));
        return $data;
    }

    public function tambah_data($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id($table);
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function get_gambar_ruangan($id) {
        // Gantilah 'ruangan' dengan nama tabel yang sesuai di database Anda
        $query = $this->db->where('id', $id)->get('ruangan');
        return $query->row(); // Menggunakan row() untuk mengambil satu data
    }
}