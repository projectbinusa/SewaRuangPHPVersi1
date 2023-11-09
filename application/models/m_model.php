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
    public function update($table, $data, $where)
    {
        $data = $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }

    public function get_data_by_id($table, $id)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        $this->db->where('id', $id);
        return $this->db->get($table);
    }

    public function hapus_data($table, $id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }


    public function get_gambar_ruangan($id)
    {
        // Gantilah 'ruangan' dengan nama tabel yang sesuai di database Anda
        $query = $this->db->where('id', $id)->get('ruangan');
        return $query->row(); // Menggunakan row() untuk mengambil satu data
    }

    public function get_foto_by_id($id)
    {
        $this->db->select('image');
        $this->db->from('ruangan');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->image;
        } else {
            return false;
        }
    }

    // m model update data pelanggan
    public function ubah_data($tabel, $data, $where)
    {
        $data=$this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }
    public function get_data_operator()
    {
        return $this->db->where('role', 'operator')
            ->get('user');
    }

    public function hapus_image($file_path)
    {
        if (file_exists($file_path)) {
            unlink($file_path);
            return true;
        } else {
            return false;
        }
    }

    public function edit_ruangan($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('ruangan', $data);
    }

    public function get_image_by_id($table, $id)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai dalam database Anda
        $query = $this->db->get_where($table, array('id' => $id));

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->image; // Asumsikan bahwa nama kolom gambar adalah 'image'
        }

        return null;
    }

    public function get_ruangan_by_id($id)
    {
        $query = $this->db->get_where('ruangan', array('id' => $id));
        return $query->row(); // Mengembalikan satu baris data sebagai objek
    }
}
