<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpelestarian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
        // $this->title = $this->common_lib->getTitle();
    }
    public function index()
    {
        $header["title"] = "SI Retensi";
        $card["title"] = " Laporan Pelestarian / Laporan Pelestarian";
        $data['cetak'] = $this->M_data->filterpelestarian();
        if (isset($_POST['filter'])) {
            $dari = $_POST['dari'];
            $sampai = $_POST['sampai'];
            if ($dari != null && $sampai != null) {
                $data['cetak'] = $this->M_data->filterpelestarian($dari, $sampai);
                $data['dari'] = $dari;
                $data['sampai'] = $sampai;
                $data['nama_kepala'] = $this->input->post('nama_kepala');
            }
        }
        if (isset($_POST['print'])) {
            $data['print'] = $this->M_data->filterpelestarian();
            $dari = $_POST['dari'];
            $sampai = $_POST['sampai'];
            $data['nama_kepala'] = $this->input->post('nama_kepala');
            if ($dari != null && $sampai != null) {
                $data['print'] = $this->M_data->filterpelestarian($dari, $sampai);
                $data['nama_kepala'] = $this->input->post('nama_kepala');
            }
            //kirim data ke method print
            $this->print($data['print'], $data['nama_kepala']);
        }
        $this->load->view('_partials/header', $header);
        $this->load->view('_partials/breadcrumb', $card);
        $this->load->view('admin/laporan/laporan-pelestarian/data-lpelestarian', $data);
        $this->load->view('_partials/footer');
    }

    public function print($data, $nama_kepala)
    {
        $data['pelestarian'] = $data;
        $data['nama_kepala'] = $nama_kepala;
        $date = date('d-m-Y');
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $html = $this->load->view('admin/laporan/laporan-pelestarian/lpelestarian', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($date . '-laporan-pelestarian.pdf', 'I');
    }
}
