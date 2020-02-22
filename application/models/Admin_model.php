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
