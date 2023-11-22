<?php
class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_peminjaman_by_id($id)
    {
        // Assuming you have a table named 'peminjaman' and a column 'id'
        $this->db->where('id', $id);
        $query = $this->db->get('peminjaman');

        // Return the result if found, otherwise return false
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function get_tambahan_by_id($id)
    {
        return $this->db->get_where('tambahan', array('id' => $id))->row();
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
    public function ubah_data_report_sewa($tabel, $data, $where)
    {
        $data = $this->db->update($tabel, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_data_ruangan_by_id($table, $id)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        $this->db->where('id', $id);
        return $this->db->get('ruangan');
    }

    public function get_data_by_id($table, $id)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        $this->db->where('id', $id);
        return $this->db->get('peminjaman_tambaha');
    }

    public function get_data_byid($table, $id)
    {
        // Gantilah 'nama_tabel' dengan nama tabel yang sesuai
        $this->db->where('id', $id);
        return $this->db->get('ruangan');
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
        $this->db->where('status', 'booking');
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
        return $this->db->where_in('status', ['proses', 'selesai', 'di tolak'])
            ->get('peminjaman');
    }
    public function get_pelanggan()
    {
        return $this->db->where('id_pelanggan')
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
    public function get_by_update_report_sewa($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return $data;
    }
    public function get_peminjaman_by_status()
    {
        $this->db->select('p.*, GROUP_CONCAT(t.nama) as tambahan_nama', false);
        $this->db->from('peminjaman p');
        $this->db->join('peminjaman_tambahan pt', 'pt.id_peminjaman = p.id', 'left');
        $this->db->join('tambahan t', 'pt.id_tambahan = t.id', 'left');
        $this->db->where_in('p.status', ['proses', 'booking']);
        $this->db->group_by('p.id');

        $query = $this->db->get();
        return $query->result();
    }
    public function get_report_sewa_by_status()
    {
        $this->db->select('p.*, GROUP_CONCAT(t.nama) as tambahan_nama', false);
        $this->db->from('peminjaman p');
        $this->db->join('peminjaman_tambahan pt', 'pt.id_peminjaman = p.id', 'left');
        $this->db->join('tambahan t', 'pt.id_tambahan = t.id', 'left');
        $this->db->where_in('p.status', ['selesai', 'di tolak']);
        $this->db->group_by('p.id');

        $query = $this->db->get();
        return $query->result();
    }

    public function get_peminjaman_pdf_by_id($id)
    {
        $this->db->select('p.*, GROUP_CONCAT(t.id) as id_tambahan', false);
        $this->db->from('peminjaman p');
        $this->db->join('peminjaman_tambahan pt', 'pt.id_peminjaman = p.id', 'left');
        $this->db->join('tambahan t', 'pt.id_tambahan = t.id', 'left');
        $this->db->where('p.id', $id);
        $this->db->group_by('p.id');
    
        return $this->db->get();
    }

}
