<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getSkripsiPsik()
    {
        return $this->db->get_where('data_skripsi', ['prodi' => 'PSIK'])->result_array();
    }

    public function getSkripsiKesmas()
    {
        return $this->db->get_where('data_skripsi', ['prodi' => 'KESMAS'])->result_array();
    }

    public function getSkripsiLabel()
    {
        return $this->db->get_where('data_skripsi', ['cetak_status' => 0])->result_array();
    }

    public function UpdateStatusCetak()
    {
        $this->db->where(['cetak_status' => 0]);
        $this->db->set('cetak_status', 1);
        $this->db->update('data_skripsi');
    }

    public function GetDataNama()
    {
        $QueryNama = " SELECT RIGHT (nama, 3) FROM data_skripsi";
        $resultNama = $this->db->query($QueryNama)->result_array();

        return $resultNama;
    }

    public function GetDataJudul()
    {
        $QueryJudul = " SELECT LEFT (judul, 1) FROM data_skripsi";
        $resultJudul = $this->db->query($QueryJudul)->result_array();
        return $resultJudul;
    }

    public function DataSkripsi()
    {
        return $this->db->get_where('data_skripsi', ['cetak_status' => 1])->result_array();
    }

    public function Data_()
    {
        $QueryNama = " SELECT id,  RIGHT (nama, 3) AS nama, LEFT (judul, 1) AS judul FROM data_skripsi WHERE `cetak_status` = 1 ";
        $result = $this->db->query($QueryNama)->result_array();
        return $result;
    }

    public function KesmasCount()
    {
        $data = $this->getSkripsiKesmas();
        return count($data);
    }

    public function PsikCount()
    {
        $data = $this->getSkripsiPsik();
        return count($data);
    }

    public function AllCount()
    {
        return count($this->db->get('data_skripsi')->result_array());
    }

    public function HapusData($id)
    {
        $this->db->delete('data_skripsi', ['id' => $id]);
    }

    public function InputData()
    {
        $data = [
            'npm' => htmlspecialchars($this->input->post('npm', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'judul' => htmlspecialchars($this->input->post('judul', true)),
            'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
            'prodi' => htmlspecialchars($this->input->post('prodi', true)),
            'tahun' => htmlspecialchars($this->input->post('tahun', true)),
            'pembimbing_1' => htmlspecialchars($this->input->post('pembimbing1', true)),
            'pembimbing_2' => htmlspecialchars($this->input->post('pembimbing2', true)),
        ];
        $this->db->insert('data_skripsi', $data);
    }
}
