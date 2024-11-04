<?php

class Perangkat_desa_model extends CI_Model
{
    public function get_all_perangkat_desa(): array
    {
        $query = "SELECT perangkat_desa.* FROM perangkat_desa";
        return $this->db->query($query)->result();
    }
}
