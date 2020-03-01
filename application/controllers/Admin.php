<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jumlah_kesmas'] = $this->Admin_model->KesmasCount();
        $data['jumlah_psik'] = $this->Admin_model->PsikCount();
        $data['jumlah_keseluruhan'] = $this->Admin_model->AllCount();
        $data['jumlah_belum'] = $this->Admin_model->AllCount_Belum();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
    }

    public function Skripsi_Psik()
    {
        $data['title'] = 'Skripsi PSIK';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['skripsi_psik'] = $this->Admin_model->getSkripsiPsik();

        $this->form_validation->set_rules('npm', 'NPM', 'required|is_unique[data_skripsi.npm]', [
            'is_unique' => 'Data dengan NPM <strong><u> ' . ($this->input->post('npm')) . '</strong></u> sudah ada'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('pembimbing1', 'Pembimbing 1', 'required');
        $this->form_validation->set_rules('pembimbing2', 'Pembimbing 2', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/skripsi-psik', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->InputData();
            $this->session->set_flashdata('message', '<b>Ditambahkan!</b>');
            redirect('admin/skripsi_psik');
        }
    }

    public function Skripsi_Kesmas()
    {
        $data['title'] = 'Skripsi Kesmas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['skripsi_kesmas'] = $this->Admin_model->getSkripsiKesmas();

        $this->form_validation->set_rules('npm', 'NPM', 'required|is_unique[data_skripsi.npm]', [
            'is_unique' => 'Data dengan NPM <strong><u> ' . ($this->input->post('npm')) . '</strong></u> sudah ada'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('pembimbing1', 'Pembimbing 1', 'required');
        $this->form_validation->set_rules('pembimbing2', 'Pembimbing 2', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/skripsi-kesmas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->InputData();
            $this->session->set_flashdata('message', ' <b> ditambahkan! </b>');
            redirect('admin/skripsi_kesmas');
        }
    }

    public function HapusData($id)
    {
        // cek data yang dihapus
        $data = $this->db->get_where('data_skripsi', ['id' => $id])->row_array();
        if ($data['prodi'] == 'PSIK') {
            $this->Admin_model->HapusData($id);
            $this->session->set_flashdata('message', '<strong>dihapus! </strong>');
            redirect('admin/skripsi_psik');
        } else {
            $this->Admin_model->HapusData($id);
            $this->session->set_flashdata('message', '<strong>dihapus! </strong>');
            redirect('admin/skripsi_kesmas');
        }
    }

    public function CetakLabel()
    {
        $data['skripsi'] = $this->Admin_model->Data_();
        $this->load->view('admin/cetak-label', $data);
        $this->Admin_model->UpdateStatusCetak();
    }

    public function CetakLabelKesmas()
    {
        $data['skripsi'] = $this->Admin_model->Data_Kesmas();
        $this->load->view('admin/cetak-label-kesmas', $data);
        $this->Admin_model->UpdateStatusCetak_Kesmas();
    }

    public function CetakLabelPSIK()
    {
        $data['skripsi'] = $this->Admin_model->Data_PSIK();
        $this->load->view('admin/cetak-label-psik', $data);
        $this->Admin_model->UpdateStatusCetak_PSIK();
    }

    public function SkripsiLabel()
    {
        $data['title'] = 'Data Skripsi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['skripsi_label'] = $this->Admin_model->getSkripsiLabel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/skripsi-label', $data);
        $this->load->view('templates/footer');
    }

    public function Skripsi_Keseluruhan()
    {
        $data['title'] = 'Data Skripsi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['skripsi_keseluruhan'] = $this->Admin_model->getSkripsiKeseluruhan();

        $this->form_validation->set_rules('npm', 'NPM', 'required|is_unique[data_skripsi.npm]', [
            'is_unique' => 'Data dengan NPM <strong><u> ' . ($this->input->post('npm')) . '</strong></u> sudah ada'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('pembimbing1', 'Pembimbing 1', 'required');
        $this->form_validation->set_rules('pembimbing2', 'Pembimbing 2', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/skripsi-keseluruhan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->InputData();
            $this->session->set_flashdata('message', ' <b> ditambahkan! </b>');
            redirect('admin/skripsi_keseluruhan');
        }
    }

    public function getSkripsiById()
    {
        echo json_encode($this->Admin_model->getSkripsiById($_POST['id']));
    }

    public function Ubah()
    {
        $this->Admin_model->edit($_POST['id']);
        $this->session->set_flashdata('message', '<strong>Diubah! </strong>');
        redirect('admin/skripsi_keseluruhan');
    }
}
