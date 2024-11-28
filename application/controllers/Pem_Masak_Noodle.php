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
class Pem_Masak_Noodle extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_masak_noodle_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_masak_noodle' => $this->pem_masak_noodle_model->get_all(),
            'active_nav' => 'pem_masak_noodle',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pem_masak_noodle');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pem_masak_noodle_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pem_masak_noodle berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pem_masak_noodle");
            }

            // Redirect after handling the form submission
            redirect('pem_masak_noodle');
        }

        // Prepare data to load the form view
        $data = array(
            'pem_masak_noodle' => $this->pem_masak_noodle_model->get_all(),
            'active_nav' => 'pem_masak_noodle',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pem_masak_noodle-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pem_masak_noodle'] = $this->pem_masak_noodle_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pem_masak_noodle-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'mixing_bahan_utama' => $this->input->post('mixing_bahan_utama'),
            'mixing_kode_produksi' => $this->input->post('mixing_kode_produksi'),
            'mixing_berat' => $this->input->post('mixing_berat'),
            'bahan_lain' => $this->input->post('bahan_lain'),
            'bahan_lain_kode_produksi' => $this->input->post('bahan_lain_kode_produksi'),
            'bahan_lain_berat' => $this->input->post('bahan_lain_berat'),
            'bahan_lain_kode_produksi_item2' => $this->input->post('bahan_lain_kode_produksi_item2'),
            'bahan_lain_berat_item2' => $this->input->post('bahan_lain_berat_item2'),
            'waktu_proses' => $this->input->post('waktu_proses'),
            'vacuum' => $this->input->post('vacuum'),
            'suhu_adonan' => $this->input->post('suhu_adonan'),
            'aging_waktu' => $this->input->post('aging_waktu'),
            'aging_rh' => $this->input->post('aging_rh'),
            'aging_suhu_ruangan' => $this->input->post('aging_suhu_ruangan'),
            'rolling_ukuran_tebal' => $this->input->post('rolling_ukuran_tebal'),
            'cutting_sampling_berat' => $this->input->post('cutting_sampling_berat'),
            'boiling_suhu_setting_water' => $this->input->post('boiling_suhu_setting_water'),
            'boiling_suhu_actual_water' => $this->input->post('boiling_suhu_actual_water'),
            'boiling_waktu' => $this->input->post('boiling_waktu'),
            'washing_suhu_setting_water' => $this->input->post('washing_suhu_setting_water'),
            'washing_suhu_actual_water' => $this->input->post('washing_suhu_actual_water'),
            'washing_waktu' => $this->input->post('washing_waktu'),
            'cooling_suhu_setting_water' => $this->input->post('cooling_suhu_setting_water'),
            'cooling_suhu_actual_water' => $this->input->post('cooling_suhu_actual_water'),
            'cooling_waktu' => $this->input->post('cooling_waktu'),
            'lama_proses_jam_mulai' => $this->input->post('lama_proses_jam_mulai'),
            'lama_proses_jam_selesai' => $this->input->post('lama_proses_jam_selesai'),
            'sensori_suhu_produk_akhir' => $this->input->post('sensori_suhu_produk_akhir'),
            'sensori_suhu_produk_setelah' => $this->input->post('sensori_suhu_produk_setelah'),
            'sensori_rasa' => $this->input->post('sensori_rasa'),
            'sensori_kekenyalan' => $this->input->post('sensori_kekenyalan'),
            'sensori_warna' => $this->input->post('sensori_warna'),
            'catatan' => $this->input->post('catatan')

        );

        $update = $this->pem_masak_noodle_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pem_masak_noodle berhasil diupdate');
            redirect('pem_masak_noodle');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pem_masak_noodle');
            redirect('pem_masak_noodle/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pem_masak_noodle_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_masak_noodle berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_masak_noodle');
        }
        redirect('pem_masak_noodle');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 09 pemeriksaan pemasakan noodle.xls'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $dateSet = false;

        $shiftArray = []; // To store unique shifts
        $catatanArray = []; // To store concatenated catatan

        // Starting row for the main data (B9 onwards vertically)
        $startingRow = 7;

        // Starting column for the items (B, C, D, ...)
        $startingCol = 3; // B column

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->pem_masak_noodle_model->get_by_uuid($uuid);
                if (!empty($data)) {
                    $allData[] = $data;
                }
            }

            // Sort the data by 'created_at' to ensure earlier data comes first
            usort($allData, function ($a, $b) {
                return strtotime($a->created_at) - strtotime($b->created_at);
            });

            // Process the sorted data
            foreach ($allData as $data) {
                // Set date only once
                if (!$dateSet || !empty($data->date)) {
                    $sheet->setCellValue('C6', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }

                // Collect unique shift values into an array
                if (!empty($data->shift)) {
                    $shiftArray[] = $data->shift;
                }

                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data vertically starting at row B9
                $currentRow = $startingRow; // Save the starting row for each item


                $namaProdukParts = explode(',', $data->nama_produk ?? '');
                $sheet->setCellValue('C7', trim($namaProdukParts[0]));
                if (isset($namaProdukParts[1])) {
                    $sheet->setCellValue('H7', trim($namaProdukParts[1]));
                }
                $currentRow++;
                $kode_produksiParts = explode(',', $data->kode_produksi ?? '');
                $sheet->setCellValue('C8', trim($kode_produksiParts[0]));
                if (isset($kode_produksiParts[1])) {
                    $sheet->setCellValue('H8', trim($kode_produksiParts[1]));
                }
                $currentRow++;
                $currentRow++;
                $mixing_bahan_utamaParts = explode(',', $data->mixing_bahan_utama ?? '');
                $sheet->setCellValue('C10', trim($mixing_bahan_utamaParts[0]));
                if (isset($mixing_bahan_utamaParts[1])) {
                    $sheet->setCellValue('H10', trim($mixing_bahan_utamaParts[1]));
                }
                $currentRow++;
                $mixing_kode_produksiParts = explode(',', $data->mixing_kode_produksi ?? '');
                $sheet->setCellValue('C11', trim($mixing_kode_produksiParts[0]));
                if (isset($mixing_kode_produksiParts[1])) {
                    $sheet->setCellValue('H11', trim($mixing_kode_produksiParts[1]));
                }
                $currentRow++;
                $mixing_beratParts = explode(',', $data->mixing_berat ?? '');
                $sheet->setCellValue('C12', trim($mixing_beratParts[0]));
                if (isset($mixing_beratParts[1])) {
                    $sheet->setCellValue('H12', trim($mixing_beratParts[1]));
                }
                $currentRow++;
                // Set the starting row for bahan_lain at B14
                $currentRow = 14;

                // Set the starting column to 2 (B)
                $startingCol = 2;

                // Split bahan_lain by commas and place each part on a new line in subsequent rows
                $bahanLainParts = explode(',', $data->bahan_lain ?? '');
                foreach ($bahanLainParts as $part) {
                    // Set the value for the cell at B$currentRow
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next row
                    $currentRow++;
                }
                $currentRow = 14;
                $startingCol = 3;

                // Split bahan_lain_kode_produksi by commas and place each part on a new line in subsequent rows
                $bahanLainKodeProduksiParts = explode(',', $data->bahan_lain_kode_produksi ?? '');
                foreach ($bahanLainKodeProduksiParts as $part) {
                    // Set the value for the cell at C$currentRow (for bahan_lain_kode_produksi)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next row
                    $currentRow++;
                }
                $currentRow = 14;
                $startingCol = 6;

                // Split bahan_lain_kode_produksi by commas and place each part on a new line in subsequent rows
                $bahan_lain_beratParts = explode(',', $data->bahan_lain_berat ?? '');
                foreach ($bahan_lain_beratParts as $part) {
                    // Set the value for the cell at C$currentRow (for bahan_lain_berat)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next row
                    $currentRow++;
                }
                $currentRow = 14;
                $startingCol = 8;

                // Split bahan_lain_kode_produksi by commas and place each part on a new line in subsequent rows
                $bahan_lain_kode_produksi_item2Parts = explode(',', $data->bahan_lain_kode_produksi_item2 ?? '');
                foreach ($bahan_lain_kode_produksi_item2Parts as $part) {
                    // Set the value for the cell at C$currentRow (for bahan_lain_kode_produksi_item2)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next row
                    $currentRow++;
                }
                $currentRow = 14;
                $startingCol = 11;

                // Split bahan_lain_kode_produksi by commas and place each part on a new line in subsequent rows
                $bahan_lain_berat_item2Parts = explode(',', $data->bahan_lain_berat_item2 ?? '');
                foreach ($bahan_lain_berat_item2Parts as $part) {
                    // Set the value for the cell at C$currentRow (for bahan_lain_berat_item2)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next row
                    $currentRow++;
                }


                $currentRow = 20;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $waktu_prosesParts = explode(',', $data->waktu_proses ?? '');
                foreach ($waktu_prosesParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for waktu_proses)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;

                $currentRow = 21;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $vacuumParts = explode(',', $data->vacuum ?? '');
                foreach ($vacuumParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for vacuum)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;

                $currentRow = 22;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $suhu_adonanParts = explode(',', $data->suhu_adonan ?? '');
                foreach ($suhu_adonanParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for suhu_adonan)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow++;
                $currentRow++;
                $currentRow = 24;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $aging_waktuParts = explode(',', $data->aging_waktu ?? '');
                foreach ($aging_waktuParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for aging_waktu)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 25;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $aging_rhParts = explode(',', $data->aging_rh ?? '');
                foreach ($aging_rhParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for aging_rh)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 26;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $aging_suhu_ruanganParts = explode(',', $data->aging_suhu_ruangan ?? '');
                foreach ($aging_suhu_ruanganParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for aging_suhu_ruangan)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow++;
                $currentRow = 28;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $rolling_ukuran_tebalParts = explode(',', $data->rolling_ukuran_tebal ?? '');
                foreach ($rolling_ukuran_tebalParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for rolling_ukuran_tebal)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 30;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $cutting_sampling_beratParts = explode(',', $data->cutting_sampling_berat ?? '');
                foreach ($cutting_sampling_beratParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for cutting_sampling_berat)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 32;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $boiling_suhu_setting_waterParts = explode(',', $data->boiling_suhu_setting_water ?? '');
                foreach ($boiling_suhu_setting_waterParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for boiling_suhu_setting_water)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 33;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $boiling_suhu_actual_waterParts = explode(',', $data->boiling_suhu_actual_water ?? '');
                foreach ($boiling_suhu_actual_waterParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for boiling_suhu_actual_water)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 34;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $boiling_waktuParts = explode(',', $data->boiling_waktu ?? '');
                foreach ($boiling_waktuParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for boiling_waktu)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }


                $currentRow++;
                $currentRow = 36;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $washing_suhu_setting_waterParts = explode(',', $data->washing_suhu_setting_water ?? '');
                foreach ($washing_suhu_setting_waterParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for washing_suhu_setting_water)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 37;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $washing_suhu_actual_waterParts = explode(',', $data->washing_suhu_actual_water ?? '');
                foreach ($washing_suhu_actual_waterParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for washing_suhu_actual_water)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 38;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $washing_waktuParts = explode(',', $data->washing_waktu ?? '');
                foreach ($washing_waktuParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for washing_waktu)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 40;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $cooling_suhu_setting_waterParts = explode(',', $data->cooling_suhu_setting_water ?? '');
                foreach ($cooling_suhu_setting_waterParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for cooling_suhu_setting_water)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 41;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $cooling_suhu_actual_waterParts = explode(',', $data->cooling_suhu_actual_water ?? '');
                foreach ($cooling_suhu_actual_waterParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for cooling_suhu_actual_water)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 42;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $cooling_waktuParts = explode(',', $data->cooling_waktu ?? '');
                foreach ($cooling_waktuParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for cooling_waktu)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 44;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $lama_proses_jam_mulaiParts = explode(',', $data->lama_proses_jam_mulai ?? '');
                foreach ($lama_proses_jam_mulaiParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for lama_proses_jam_mulai)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 45;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $lama_proses_jam_selesaiParts = explode(',', $data->lama_proses_jam_selesai ?? '');
                foreach ($lama_proses_jam_selesaiParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for lama_proses_jam_selesai)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 47;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $sensori_suhu_produk_akhirParts = explode(',', $data->sensori_suhu_produk_akhir ?? '');
                foreach ($sensori_suhu_produk_akhirParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for sensori_suhu_produk_akhir)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 48;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $sensori_suhu_produk_setelahParts = explode(',', $data->sensori_suhu_produk_setelah ?? '');
                foreach ($sensori_suhu_produk_setelahParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for sensori_suhu_produk_setelah)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 49;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $sensori_rasaParts = explode(',', $data->sensori_rasa ?? '');
                foreach ($sensori_rasaParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for sensori_rasa)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }
                $currentRow++;
                $currentRow = 50;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $sensori_kekenyalanParts = explode(',', $data->sensori_kekenyalan ?? '');
                foreach ($sensori_kekenyalanParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for sensori_kekenyalan)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                $currentRow++;
                $currentRow = 51;  // Start at row 20
                $startingCol = 3;  // Start at column D (since A=1, B=2, C=3, D=4)

                // Split waktu_proses by commas and place each part in subsequent columns
                $sensori_warnaParts = explode(',', $data->sensori_warna ?? '');
                foreach ($sensori_warnaParts as $part) {
                    // Set the value for the cell at $startingCol$currentRow (for sensori_warna)
                    $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, trim($part));

                    // Move to the next column (rightwards)
                    $startingCol++;
                }

                // Move to the next column for the next item
                $startingCol++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('H6', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('C56', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pem_masak_noodle_Multiple_Report.xls"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }



}
?>