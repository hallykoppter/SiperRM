<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpemusnahan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        // $this->title = $this->common_lib->getTitle();
    }
    public function index()
    {
        $header["title"] = "SI Retensi dan Pemusnahan";
        $card["title"] = " Laporan Pemusnahan / Laporan Pemusnahan";
        $data['cetak'] = $this->M_data->filterpemusnahan();
        if (isset($_POST['filter'])) {
            $dari = $_POST['dari'];
            $sampai = $_POST['sampai'];
            if ($dari != null && $sampai != null) {
                $data['cetak'] = $this->M_data->filterpemusnahan($dari, $sampai);
                $data['dari'] = $dari;
                $data['sampai'] = $sampai;
                $data['nama_kepala'] = $this->input->post('nama_kepala');
                $data['nip'] = $this->input->post('nip');
            }
        }
        if (isset($_POST['print'])) {
            $data['print'] = $this->M_data->filterpemusnahan();
            $dari = $_POST['dari'];
            $sampai = $_POST['sampai'];
            $data['nama_kepala'] = $this->input->post('nama_kepala');
            $data['nip'] = $this->input->post('nip');
            if ($dari != null && $sampai != null) {
                $data['print'] = $this->M_data->filterpemusnahan($dari, $sampai);
                $data['nama_kepala'] = $this->input->post('nama_kepala');
                $data['nip'] = $this->input->post('nip');
            }
            //kirim data ke method print
            $this->print($data['print'], $data['nama_kepala'], $data['nip']);
        }
        $this->load->view('_partials/header', $header);
        $this->load->view('_partials/breadcrumb', $card);
        $this->load->view('admin/laporan/laporan-pemusnahan/data-lpemusnahan', $data);
        $this->load->view('_partials/footer');
    }

    public function print($data, $nama_kepala, $nip)
    {
        $data['pemusnahan'] = $data;
        $data['nama_kepala'] = $nama_kepala;
        $data['nip'] = $nip;
        $date = date('d-m-Y');
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $html = $this->load->view('admin/laporan/laporan-pemusnahan/lpemusnahan', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($date . '-laporan-pemusnahan.pdf', 'I');
    }
}
