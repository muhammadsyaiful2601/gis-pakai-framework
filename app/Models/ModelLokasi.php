<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    protected $table      = 'tbl_lokasi';
    protected $primaryKey = 'id_lokasi';

    public function insertData($data)
    {
        $this->db->table('tbl_lokasi')->insert($data);
    }

    public function allData()
    {
        return $this->db->table('tbl_lokasi')
            ->get()->getResultArray();
    }

    public function getData($id_lokasi)
    {
        return $this->db->table('tbl_lokasi')
            ->where('id_lokasi', $id_lokasi)
            ->get()->getRowArray();
    }

    public function updateData($data, $id_lokasi)
    {
        $this->db->table('tbl_lokasi')
            ->where('id_lokasi', $id_lokasi)
            ->update($data);
    }

    public function deleteData($id_lokasi)
    {
        $this->db->table('tbl_lokasi')
            ->where('id_lokasi', $id_lokasi)
            ->delete();
    }
}
