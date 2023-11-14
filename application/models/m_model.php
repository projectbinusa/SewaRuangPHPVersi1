<?php
class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_ruang_by_id()
    {
        return $this->db->get_where('ruangan', array())->row();
    }

    public function get_snack_by_id()
    {
        return $this->db->get_where('snack', array())->row();
    }

    public function search($keyword)
    {
        $this->db->like('no_ruang', $keyword);
        $this->db->or_like('no_lantai', $keyword);
        $this->db->or_like('harga', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $query = $this->db->get('ruangan');
        return $query->result();
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
        $data = $this->db->update($tabel, $data, $where);
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
    public function is_time_conflict($id_ruangan, $start_time, $end_time)
    {
        // Query untuk memeriksa konflik waktu
        $this->db->where('id_ruangan', $id_ruangan);
        $this->db->where("('$start_time' BETWEEN tanggal_booking AND tanggal_berakhir OR '$end_time' BETWEEN tanggal_booking AND tanggal_berakhir)", NULL, FALSE);
        $query = $this->db->get('peminjaman');

        return $query->num_rows() > 0;
    }

    public function get_expired_bookings()
    {
        // Ambil semua pemesanan yang masih dalam status "booking" dan telah berakhir
        $current_time = date('Y-m-d H:i:s');
        $this->db->where('status', 'booking');
        $this->db->where('tanggal_berakhir <', $current_time);
        $query = $this->db->get('peminjaman');

        return $query->result();
    }
    public function get_status_peminjaman()
    {
        return $this->db->where_in('status', ['proses', 'booking', 'di tolak'])
            ->get('peminjaman');
    }
    public function get_status_proses()
    {
        return $this->db->where('status', 'proses')
            ->get('peminjaman');
    }
    public function get_status_selesai()
    {
        return $this->db->where('status', 'selesai')
            ->get('peminjaman');
    }
    public function update_status($id, $status)
    {
        $this->db->where('id', $id);
        $this->db->update('peminjaman', array('status' => $status));
    }
}
