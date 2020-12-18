<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BAP extends CI_Controller
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
        $card["title"] = " Berita Acara Pemusnahan";

        $this->load->view('_partials/header', $header);
        $this->load->view('_partials/breadcrumb', $card);
        $this->load->view('admin/laporan/berita-acara-pemusnahan/data-bap');
        $this->load->view('_partials/footer');
    }

    public function print()
    {
        // $data['kepala-pkm'] = $nama_kepala;
        // $data['nip-kepala'] = $nip1;
        // $data['ketua1'] = $ketua;
        // $data['nip-ketua'] = $nip2;
        // $data['sekretaris'] = $sekretaris;
        // $data['nip-sekretaris'] = $nip3;

        $data = [
            'hari'              => $this->input->post('hari'),
            'tanggal'           => $this->input->post('tanggal'),
            'waktu'             => $this->input->post('waktu'),
            'lokasi'            => $this->input->post('lokasi'),
            'ketua'             => $this->input->post('ketua'),
            'sekretaris'        => $this->input->post('sekretaris'),
            'pelaksana1'        => $this->input->post('pelaksana1'),
            'pelaksana2'        => $this->input->post('pelaksana2'),
            'pelaksana3'        => $this->input->post('pelaksana3'),
            'kepala_pkm'        => $this->input->post('kepala_pkm'),
            'nip_sekretaris'    => $this->input->post('nip_sekretaris'),
            'nip_ketua'         => $this->input->post('nip_ketua'),
            'nip_kepala'        => $this->input->post('nip_kepala')
        ];

        $date = date('d-m-Y');
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
        $html = $this->load->view('admin/laporan/berita-acara-pemusnahan/bap', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output($date . '-bap.pdf', 'I');
    }
}
