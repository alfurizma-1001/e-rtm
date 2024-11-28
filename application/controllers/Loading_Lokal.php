<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\IOFactory;
class Loading_Lokal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('loading_lokal_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'loading_lokal' => $this->loading_lokal_model->get_all(),
            'active_nav' => 'loading_lokal',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/loading_lokal');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->loading_lokal_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data loading_lokal berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data loading_lokal");
            }

            // Redirect after handling the form submission
            redirect('loading_lokal');
        }

        // Prepare data to load the form view
        $data = array(
            'loading_lokal' => $this->loading_lokal_model->get_all(),
            'active_nav' => 'loading_lokal',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/loading_lokal-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['loading_lokal'] = $this->loading_lokal_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/loading_lokal-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'mulai_loading' => $this->input->post('mulai_loading'),
            'selesai_loading' => $this->input->post('selesai_loading'),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan' => $this->input->post('nomor_kendaraan'),
            'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
            'nama_supir' => $this->input->post('nama_supir'),
            'nama_pengirim' => $this->input->post('nama_pengirim'),
            'tujuan_pengiriman' => $this->input->post('tujuan_pengiriman'),
            'bersih' => $this->input->post('bersih'),
            'tidak_berdebu' => $this->input->post('tidak_berdebu'),
            'tidak_pecah' => $this->input->post('tidak_pecah'),
            'bebas_hama' => $this->input->post('bebas_hama'),
            'tidak_kondensasi' => $this->input->post('tidak_kondensasi'),
            'pecah' => $this->input->post('pecah'),
            'bebabs_produk_nonhalal' => $this->input->post('bebabs_produk_nonhalal'),
            'tidak_ada_noda' => $this->input->post('tidak_ada_noda'),
            'pallet_utuh' => $this->input->post('pallet_utuh'),
            'tidak_ada_sampah' => $this->input->post('tidak_ada_sampah'),
            'binatang' => $this->input->post('binatang'),
            'jamur' => $this->input->post('jamur'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kondisi_produk' => $this->input->post('kondisi_produk'),
            'kondisi_kemasanan' => $this->input->post('kondisi_kemasanan'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'tanggal_kadaluarsa' => $this->input->post('tanggal_kadaluarsa'),
            'keterangan' => $this->input->post('keterangan'),
            'sanitasi_larutan' => $this->input->post('sanitasi_larutan'),
            'ppm_sanitasi_larutan' => $this->input->post('ppm_sanitasi_larutan'),
            'precooling' => $this->input->post('precooling'),
            'suhu_produk' => $this->input->post('suhu_produk'),
            'suhu_18' => $this->input->post('suhu_18'),
            'segel_terpasang' => $this->input->post('segel_terpasang'),
            'lama_delay' => $this->input->post('lama_delay')
        );

        $update = $this->loading_lokal_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data loading_lokal berhasil diupdate');
            redirect('loading_lokal');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data loading_lokal');
            redirect('loading_lokal/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->loading_lokal_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data loading_lokal berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data loading_lokal');
        }
        redirect('loading_lokal');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 32 Loading Produk untuk Lokal.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $dateSet = false;
        $shiftArray = []; // To store unique shifts


        // Starting row for the main data (A11 onwards)
        $startingRow = 19;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->loading_lokal_model->get_by_uuid($uuid);
                if (!empty($data)) {
                    $allData[] = $data;
                }
            }

            // Sort the data by 'created_at' to ensure earlier data comes first
            usort($allData, function ($a, $b) {
                return strtotime($a->created_at) - strtotime($b->created_at);
            });
            $no = 1;
            // Process the sorted data
            foreach ($allData as $data) {
                // Set date only once
                if (!$dateSet || !empty($data->date)) {
                    $sheet->setCellValue('C6', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }

                $mulaiLoadingSet = false;
                if (!$mulaiLoadingSet || !empty($data->mulai_loading)) {
                    $sheet->setCellValue('C8' , $data->mulai_loading ?? '');
                    $mulaiLoadingSet = true;
                }

                $selesaiLoadingSet = false;
                if (!$selesaiLoadingSet || !empty($data->selesai_loading)) {
                    $sheet->setCellValue('I8' , $data->selesai_loading ?? '');
                    $selesaiLoadingSet = true;
                }

                $jenisKendaraanSet = false;
                if (!$jenisKendaraanSet || !empty($data->jenis_kendaraan)) {
                    $sheet->setCellValue('C9' , $data->jenis_kendaraan ?? '');
                    $jenisKendaraanSet = true;
                }

                $nomorKendaraanSet = false;
                if (!$nomorKendaraanSet || !empty($data->nomor_kendaraan)) {
                    $sheet->setCellValue('I9' , $data->nomor_kendaraan ?? '');
                    $nomorKendaraanSet = true;
                }

                $namaEkspedisiSet = false;
                if (!$namaEkspedisiSet || !empty($data->nama_ekspedisi)) {
                    $sheet->setCellValue('C10' , $data->nama_ekspedisi ?? '');
                    $namaEkspedisiSet = true;
                }

                $namaSupirSet = false;
                if (!$namaSupirSet || !empty($data->nama_supir)) {
                    $sheet->setCellValue('I10' , $data->nama_supir ?? '');
                    $namaSupirSet = true;
                }

                $namaPengirimSet = false;
                if (!$namaPengirimSet || !empty($data->nama_pengirim)) {
                    $sheet->setCellValue('C11' , $data->nama_pengirim ?? '');
                    $namaPengirimSet = true;
                }

                $tujuanPengirimanSet = false;
                if (!$tujuanPengirimanSet || !empty($data->tujuan_pengiriman)) {
                    $sheet->setCellValue('I11' , $data->tujuan_pengiriman ?? '');
                    $tujuanPengirimanSet = true;
                }

                $bersihSet = false;
                if (!$bersihSet || !empty($data->bersih)) {
                    $sheet->setCellValue('D12' , $data->bersih ?? '');
                    $bersihSet = true;
                }

                $tidakBerdebuSet = false;
                if (!$tidakBerdebuSet || !empty($data->tidak_berdebu)) {
                    $sheet->setCellValue('D13' , $data->tidak_berdebu ?? '');
                    $tidakBerdebuSet = true;
                }

                $tidakPecahSet = false;
                if (!$tidakPecahSet || !empty($data->tidak_pecah)) {
                    $sheet->setCellValue('D14' , $data->tidak_pecah ?? '');
                    $tidakPecahSet = true;
                }

                $bebasHamaSet = false;
                if (!$bebasHamaSet || !empty($data->bebas_hama)) {
                    $sheet->setCellValue('F12' , $data->bebas_hama ?? '');
                    $bebasHamaSet = true;
                }

                $tidakKondensasiSet = false;
                if (!$tidakKondensasiSet || !empty($data->tidak_kondensasi)) {
                    $sheet->setCellValue('F13' , $data->tidak_kondensasi ?? '');
                    $tidakKondensasiSet = true;
                }

                $pecahSet = false;
                if (!$pecahSet || !empty($data->pecah)) {
                    $sheet->setCellValue('F14' , $data->pecah ?? '');
                    $pecahSet = true;
                }

                $bebasProdukNonhalalSet = false;
                if (!$bebasProdukNonhalalSet || !empty($data->bebabs_produk_nonhalal)) {
                    $sheet->setCellValue('H12' , $data->bebabs_produk_nonhalal ?? '');
                    $bebasProdukNonhalalSet = true;
                }

                $tidakAdaNodaSet = false;
                if (!$tidakAdaNodaSet || !empty($data->tidak_ada_noda)) {
                    $sheet->setCellValue('H13' , $data->tidak_ada_noda ?? '');
                    $tidakAdaNodaSet = true;
                }

                $palletUtuhSet = false;
                if (!$palletUtuhSet || !empty($data->pallet_utuh)) {
                    $sheet->setCellValue('H14' , $data->pallet_utuh ?? '');
                    $palletUtuhSet = true;
                }

                $tidakAdaSampahSet = false;
                if (!$tidakAdaSampahSet || !empty($data->tidak_ada_sampah)) {
                    $sheet->setCellValue('K12' , $data->tidak_ada_sampah ?? '');
                    $tidakAdaSampahSet = true;
                }

                $binatangSet = false;
                if (!$binatangSet || !empty($data->binatang)) {
                    $sheet->setCellValue('K13' , $data->binatang ?? '');
                    $binatangSet = true;
                }

                $jamurSet = false;
                if (!$jamurSet || !empty($data->jamur)) {
                    $sheet->setCellValue('K14' , $data->jamur ?? '');
                    $jamurSet = true;
                }

                $SanitasiLarutanSet = false;
                if (!$SanitasiLarutanSet || !empty($data->sanitasi_larutan)) {
                    $sheet->setCellValue('D57' , $data->sanitasi_larutan ?? '');
                    $SanitasiLarutanSet = true;
                }

                $ppmSanitasiLarutanSet = false;
                if (!$ppmSanitasiLarutanSet || !empty($data->ppm_sanitasi_larutan)) {
                    $sheet->setCellValue('E57' , $data->ppm_sanitasi_larutan ?? '');
                    $ppmSanitasiLarutanSet = true;
                }

                $precoolingSet = false;
                if (!$precoolingSet || !empty($data->precooling)) {
                    $sheet->setCellValue('E59' , $data->precooling ?? '');
                    $precoolingSet = true;
                }

                $suhuProdukSet = false;
                if (!$suhuProdukSet || !empty($data->suhu_produk)) {
                    $sheet->setCellValue('E61' , $data->suhu_produk ?? '');
                    $suhuProdukSet = true;
                }

                $suhu18Set = false;
                if (!$suhu18Set || !empty($data->suhu_18)) {
                    $sheet->setCellValue('K57' , $data->suhu_18 ?? '');
                    $suhu18Set = true;
                }

                $segelTerpasangSet = false;
                if (!$segelTerpasangSet || !empty($data->segel_terpasang)) {
                    $sheet->setCellValue('K59' , $data->segel_terpasang ?? '');
                    $segelTerpasangSet = true;
                }

                $lamaDelaySet = false;
                if (!$lamaDelaySet || !empty($data->lama_delay)) {
                    $sheet->setCellValue('K61' , $data->lama_delay ?? '');
                    $lamaDelaySet = true;
                }


                // Collect unique shift values into an array
                if (!empty($data->shift)) {
                    $shiftArray[] = $data->shift;
                }


                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->nama_produk ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->kondisi_produk ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->kondisi_kemasanan ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->tanggal_kadaluarsa ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->keterangan ?? '');
          



                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('J6', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6


        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="loading_lokal_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>