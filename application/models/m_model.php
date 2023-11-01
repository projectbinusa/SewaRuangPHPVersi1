<?php
class M_model extends CI_Model
{
    public function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
}
