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
class Pem_Tumbling extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_tumbling_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_tumbling' => $this->pem_tumbling_model->get_all(),
            'active_nav' => 'pem_tumbling',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_tumbling');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pem_tumbling_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Pemeriksaan Pemasakan Dengan Tumbling berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Pemeriksaan Pemasakan Dengan Tumbling");
            }

            // Redirect after handling the form submission
            redirect('pem_tumbling');
        }

        // Prepare data to load the form view
        $data = array(
            'pem_tumbling' => $this->pem_tumbling_model->get_all(),
            'active_nav' => 'pem_tumbling',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_tumbling-tambah', $data);
        $this->load->view('partials/footer');
    }


    public function edit($uuid)
    {
        $data['pem_tumbling'] = $this->pem_tumbling_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_tumbling-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Get UUID from the post request
        $uuid = $this->input->post('uuid');

        // Prepare data for updating
        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'batch_no' => $this->input->post('batch_no'),
            'identifikasi_daging' => $this->input->post('identifikasi_daging'),
            'asal' => $this->input->post('asal'),
            'kode_item_1' => $this->input->post('kode_item_1'),
            'kode_item_2' => $this->input->post('kode_item_2'),
            'kode_item_3' => $this->input->post('kode_item_3'),
            'kode_item_4' => $this->input->post('kode_item_4'),
            'berat_item_1' => $this->input->post('berat_item_1'),
            'berat_item_2' => $this->input->post('berat_item_2'),
            'berat_item_3' => $this->input->post('berat_item_3'),
            'berat_item_4' => $this->input->post('berat_item_4'),
            'suhu_daging_item_1' => $this->input->post('suhu_daging_item_1'),
            'suhu_daging_item_2' => $this->input->post('suhu_daging_item_2'),
            'suhu_daging_item_3' => $this->input->post('suhu_daging_item_3'),
            'suhu_daging_item_4' => $this->input->post('suhu_daging_item_4'),
            'rata_rata_item_1' => $this->input->post('rata_rata_item_1'),
            'rata_rata_item_2' => $this->input->post('rata_rata_item_2'),
            'rata_rata_item_3' => $this->input->post('rata_rata_item_3'),
            'rata_rata_item_4' => $this->input->post('rata_rata_item_4'),
            'kondisi_daging' => $this->input->post('kondisi_daging'),
            'marinade_bahan_utama_1' => $this->input->post('marinade_bahan_utama_1'),
            'marinade_bahan_utama_2' => $this->input->post('marinade_bahan_utama_2'),
            'marinade_bahan_utama_3' => $this->input->post('marinade_bahan_utama_3'),
            'marinade_bahan_utama_4' => $this->input->post('marinade_bahan_utama_4'),
            'marinade_kode_1' => $this->input->post('marinade_kode_1'),
            'marinade_kode_2' => $this->input->post('marinade_kode_2'),
            'marinade_kode_3' => $this->input->post('marinade_kode_3'),
            'marinade_kode_4' => $this->input->post('marinade_kode_4'),
            'marinade_berat_1' => $this->input->post('marinade_berat_1'),
            'marinade_berat_2' => $this->input->post('marinade_berat_2'),
            'marinade_berat_3' => $this->input->post('marinade_berat_3'),
            'marinade_berat_4' => $this->input->post('marinade_berat_4'),
            'marinade_kode_next_1' => $this->input->post('marinade_kode_next_1'),
            'marinade_kode_next_2' => $this->input->post('marinade_kode_next_2'),
            'marinade_kode_next_3' => $this->input->post('marinade_kode_next_3'),
            'marinade_kode_next_4' => $this->input->post('marinade_kode_next_4'),
            'marinade_berat_next_1' => $this->input->post('marinade_berat_next_1'),
            'marinade_berat_next_2' => $this->input->post('marinade_berat_next_2'),
            'marinade_berat_next_3' => $this->input->post('marinade_berat_next_3'),
            'marinade_berat_next_4' => $this->input->post('marinade_berat_next_4'),
            'bahan_lain' => $this->input->post('bahan_lain'),
            'bahan_lain_kode_item_1' => $this->input->post('bahan_lain_kode_item_1'),
            'bahan_lain_berat_item_1' => $this->input->post('bahan_lain_berat_item_1'),
            'bahan_lain_sensori_item_1' => $this->input->post('bahan_lain_sensori_item_1'),
            'bahan_lain_kode_item_2' => $this->input->post('bahan_lain_kode_item_2'),
            'bahan_lain_berat_item_2' => $this->input->post('bahan_lain_berat_item_2'),
            'bahan_lain_sensori_item_2' => $this->input->post('bahan_lain_sensori_item_2'),
            'bahan_lain_kode_item_3' => $this->input->post('bahan_lain_kode_item_3'),
            'bahan_lain_berat_item_3' => $this->input->post('bahan_lain_berat_item_3'),
            'bahan_lain_sensori_item_3' => $this->input->post('bahan_lain_sensori_item_3'),
            'bahan_lain_kode_item_4' => $this->input->post('bahan_lain_kode_item_4'),
            'bahan_lain_berat_item_4' => $this->input->post('bahan_lain_berat_item_4'),
            'bahan_lain_sensori_item_4' => $this->input->post('bahan_lain_sensori_item_4'),
            'air' => $this->input->post('air'),
            'suhu_air' => $this->input->post('suhu_air'),
            'suhu_marinade' => $this->input->post('suhu_marinade'),
            'lama_pengadukan' => $this->input->post('lama_pengadukan'),
            'brix_salinity' => $this->input->post('brix_salinity'),
            'drum_on' => $this->input->post('drum_on'),
            'drum_off' => $this->input->post('drum_off'),
            'drum_speed' => $this->input->post('drum_speed'),
            'vacuum_time' => $this->input->post('vacuum_time'),
            'total_time' => $this->input->post('total_time'),
            'mulai_item_1' => $this->input->post('mulai_item_1'),
            'mulai_item_2' => $this->input->post('mulai_item_2'),
            'mulai_item_3' => $this->input->post('mulai_item_3'),
            'mulai_item_4' => $this->input->post('mulai_item_4'),
            'selesai_item_1' => $this->input->post('selesai_item_1'),
            'selesai_item_2' => $this->input->post('selesai_item_2'),
            'selesai_item_3' => $this->input->post('selesai_item_3'),
            'selesai_item_4' => $this->input->post('selesai_item_4'),
            'tumbling_suhu_daging_item_1' => $this->input->post('tumbling_suhu_daging_item_1'),
            'tumbling_suhu_daging_item_2' => $this->input->post('tumbling_suhu_daging_item_2'),
            'tumbling_suhu_daging_item_3' => $this->input->post('tumbling_suhu_daging_item_3'),
            'tumbling_suhu_daging_item_4' => $this->input->post('tumbling_suhu_daging_item_4'),
            'tumbling_rata_rata' => $this->input->post('tumbling_rata_rata'),
            'kondisi' => $this->input->post('kondisi'),
            'catatan_bawah' => $this->input->post('catatan_bawah'),
            'catatan' => $this->input->post('catatan')

        );

        // Check if the UUID exists before attempting to update
        if ($this->pem_tumbling_model->exists($uuid)) {
            // Update the database and handle transaction
            $this->db->trans_start(); // Start transaction
            $this->pem_tumbling_model->update($uuid, $data);
            $this->db->trans_complete(); // Complete transaction

            if ($this->db->trans_status() === FALSE) {
                // Transaction failed
                $this->session->set_flashdata('error', 'Update failed. Please try again.');
                redirect('pem_tumbling'); // Redirect to your desired URL
            } else {
                // Update successful
                $this->session->set_flashdata('success', 'Data updated successfully.');
                redirect('pem_tumbling'); // Redirect to your desired URL
            }
        } else {
            // UUID does not exist
            $this->session->set_flashdata('error', 'Invalid UUID provided.');
            redirect('pem_tumbling'); // Redirect to your desired URL
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pem_tumbling_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_tumbling berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_tumbling');
        }
        redirect('pem_tumbling');
    }


    public function export_tumbling_excel($uuid)
    {
        // Load the data based on UUID (from your database or other source)
        $data = $this->pem_tumbling_model->get_by_uuid($uuid);
        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 05 Pemeriksaan Proses Tumbling.xlsx'; // Path to your template
        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);
        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();
        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');
        // Check if data is available
        if (!empty($data)) {
            // Map all fields from the database table to specific cells in the sheet
            $sheet->setCellValue('B5', $data->date ?? '');                      // Date
            $sheet->setCellValue('E5', $data->shift ?? '');                     // Shift
            $sheet->setCellValue('G5', $data->nama_produk ?? '');               // Nama Produk
            // For batch_no
            if (!empty($data->batch_no)) {
                $batchParts = explode(',', $data->batch_no); // Split batch_no on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B7', $batchParts[0] ?? ''); // First part
                $sheet->setCellValue('H7', $batchParts[1] ?? ''); // Second part
                $sheet->setCellValue('N7', $batchParts[2] ?? ''); // Third part
                $sheet->setCellValue('T7', $batchParts[3] ?? ''); // Fourth part
            }
            // For identifikasi_daging
            if (!empty($data->identifikasi_daging)) {
                $dagingParts = explode(',', $data->identifikasi_daging); // Split identifikasi_daging on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B8', $dagingParts[0] ?? ''); // First part
                $sheet->setCellValue('H8', $dagingParts[1] ?? ''); // Second part
                $sheet->setCellValue('N8', $dagingParts[2] ?? ''); // Third part
                $sheet->setCellValue('T8', $dagingParts[3] ?? ''); // Fourth part
            }
            // For asal
            if (!empty($data->asal)) {
                $asalParts = explode(',', $data->asal); // Split asal on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B9', $asalParts[0] ?? ''); // First part
                $sheet->setCellValue('H9', $asalParts[1] ?? ''); // Second part
                $sheet->setCellValue('N9', $asalParts[2] ?? ''); // Third part
                $sheet->setCellValue('T9', $asalParts[3] ?? ''); // Fourth part
            }
            // For kode_item_1
            if (!empty($data->kode_item_1)) {
                $kodeItemParts = explode(',', $data->kode_item_1); // Split kode_item_1 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B10', $kodeItemParts[0] ?? ''); // First part
                $sheet->setCellValue('D10', $kodeItemParts[1] ?? ''); // Second part
                $sheet->setCellValue('F10', $kodeItemParts[2] ?? ''); // Third part
            }
            // For kode_item_2
            if (!empty($data->kode_item_2)) {
                $kodeItem2Parts = explode(',', $data->kode_item_2); // Split kode_item_2 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('H10', $kodeItem2Parts[0] ?? ''); // First part
                $sheet->setCellValue('J10', $kodeItem2Parts[1] ?? ''); // Second part
                $sheet->setCellValue('L10', $kodeItem2Parts[2] ?? ''); // Third part
            }
            // For kode_item_3
            if (!empty($data->kode_item_3)) {
                $kodeItem3Parts = explode(',', $data->kode_item_3); // Split kode_item_3 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('N10', $kodeItem3Parts[0] ?? ''); // First part
                $sheet->setCellValue('P10', $kodeItem3Parts[1] ?? ''); // Second part
                $sheet->setCellValue('R10', $kodeItem3Parts[2] ?? ''); // Third part
            }
            // For kode_item_4
            if (!empty($data->kode_item_4)) {
                $kodeItem4Parts = explode(',', $data->kode_item_4); // Split kode_item_4 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('T10', $kodeItem4Parts[0] ?? ''); // First part
                $sheet->setCellValue('V10', $kodeItem4Parts[1] ?? ''); // Second part
                $sheet->setCellValue('X10', $kodeItem4Parts[2] ?? ''); // Third part
            }
            // For berat_item_1
            if (!empty($data->berat_item_1)) {
                $beratItem1Parts = explode(',', $data->berat_item_1); // Split berat_item_1 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('B11', $beratItem1Parts[0] ?? ''); // First part
                $sheet->setCellValue('D11', $beratItem1Parts[1] ?? ''); // Second part
                $sheet->setCellValue('F11', $beratItem1Parts[2] ?? ''); // Third part
            }
            // For berat_item_2
            if (!empty($data->berat_item_2)) {
                $beratItem2Parts = explode(',', $data->berat_item_2); // Split berat_item_2 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('H11', $beratItem2Parts[0] ?? ''); // First part
                $sheet->setCellValue('J11', $beratItem2Parts[1] ?? ''); // Second part
                $sheet->setCellValue('L11', $beratItem2Parts[2] ?? ''); // Third part
            }
            // For berat_item_3
            if (!empty($data->berat_item_3)) {
                $beratItem3Parts = explode(',', $data->berat_item_3); // Split berat_item_3 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('N11', $beratItem3Parts[0] ?? ''); // First part
                $sheet->setCellValue('P11', $beratItem3Parts[1] ?? ''); // Second part
                $sheet->setCellValue('R11', $beratItem3Parts[2] ?? ''); // Third part
            }

            // For berat_item_4
            if (!empty($data->berat_item_4)) {
                $beratItem4Parts = explode(',', $data->berat_item_4); // Split berat_item_4 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('T11', $beratItem4Parts[0] ?? ''); // First part
                $sheet->setCellValue('V11', $beratItem4Parts[1] ?? ''); // Second part
                $sheet->setCellValue('X11', $beratItem4Parts[2] ?? ''); // Third part
            }

            if (!empty($data->suhu_daging_item_1)) {
                $suhuDagingItem1Parts = explode(',', $data->suhu_daging_item_1); // Split suhu_daging_item_1 on commas

                // Map each part to the respective cells in the grid
                $sheet->setCellValue('B12', $suhuDagingItem1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('C12', $suhuDagingItem1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('B13', $suhuDagingItem1Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('C13', $suhuDagingItem1Parts[3] ?? ''); // Part 4

                $sheet->setCellValue('D12', $suhuDagingItem1Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('E12', $suhuDagingItem1Parts[5] ?? ''); // Part 6
                $sheet->setCellValue('D13', $suhuDagingItem1Parts[6] ?? ''); // Part 7
                $sheet->setCellValue('E13', $suhuDagingItem1Parts[7] ?? ''); // Part 8

                $sheet->setCellValue('F12', $suhuDagingItem1Parts[8] ?? ''); // Part 9
                $sheet->setCellValue('G12', $suhuDagingItem1Parts[9] ?? ''); // Part 10
                $sheet->setCellValue('F13', $suhuDagingItem1Parts[10] ?? ''); // Part 11
                $sheet->setCellValue('G13', $suhuDagingItem1Parts[11] ?? ''); // Part 12
            }
            // For suhu_daging_item_2
            if (!empty($data->suhu_daging_item_2)) {
                $suhuDagingItem2Parts = explode(',', $data->suhu_daging_item_2); // Split suhu_daging_item_2 on commas

                // Map each part to the respective cells in the grid
                $sheet->setCellValue('H12', $suhuDagingItem2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('I12', $suhuDagingItem2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('H13', $suhuDagingItem2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('I13', $suhuDagingItem2Parts[3] ?? ''); // Part 4

                $sheet->setCellValue('J12', $suhuDagingItem2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('K12', $suhuDagingItem2Parts[5] ?? ''); // Part 6
                $sheet->setCellValue('J13', $suhuDagingItem2Parts[6] ?? ''); // Part 7
                $sheet->setCellValue('K13', $suhuDagingItem2Parts[7] ?? ''); // Part 8

                $sheet->setCellValue('L12', $suhuDagingItem2Parts[8] ?? ''); // Part 9
                $sheet->setCellValue('M12', $suhuDagingItem2Parts[9] ?? ''); // Part 10
                $sheet->setCellValue('L13', $suhuDagingItem2Parts[10] ?? ''); // Part 11
                $sheet->setCellValue('M13', $suhuDagingItem2Parts[11] ?? ''); // Part 12
            }

            // For suhu_daging_item_3
            if (!empty($data->suhu_daging_item_3)) {
                $suhuDagingItem3Parts = explode(',', $data->suhu_daging_item_3); // Split suhu_daging_item_3 on commas

                // Map each part to the respective cells in the grid
                $sheet->setCellValue('N12', $suhuDagingItem3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('O12', $suhuDagingItem3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('N13', $suhuDagingItem3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('O13', $suhuDagingItem3Parts[3] ?? ''); // Part 4

                $sheet->setCellValue('P12', $suhuDagingItem3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('Q12', $suhuDagingItem3Parts[5] ?? ''); // Part 6
                $sheet->setCellValue('P13', $suhuDagingItem3Parts[6] ?? ''); // Part 7
                $sheet->setCellValue('Q13', $suhuDagingItem3Parts[7] ?? ''); // Part 8

                $sheet->setCellValue('R12', $suhuDagingItem3Parts[8] ?? ''); // Part 9
                $sheet->setCellValue('S12', $suhuDagingItem3Parts[9] ?? ''); // Part 10
                $sheet->setCellValue('R13', $suhuDagingItem3Parts[10] ?? ''); // Part 11
                $sheet->setCellValue('S13', $suhuDagingItem3Parts[11] ?? ''); // Part 12
            }

            // For suhu_daging_item_4
            if (!empty($data->suhu_daging_item_4)) {
                $suhuDagingItem4Parts = explode(',', $data->suhu_daging_item_4); // Split suhu_daging_item_4 on commas

                // Map each part to the respective cells in the grid
                $sheet->setCellValue('T12', $suhuDagingItem4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('U12', $suhuDagingItem4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('T13', $suhuDagingItem4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('U13', $suhuDagingItem4Parts[3] ?? ''); // Part 4

                $sheet->setCellValue('V12', $suhuDagingItem4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('W12', $suhuDagingItem4Parts[5] ?? ''); // Part 6
                $sheet->setCellValue('V13', $suhuDagingItem4Parts[6] ?? ''); // Part 7
                $sheet->setCellValue('W13', $suhuDagingItem4Parts[7] ?? ''); // Part 8

                $sheet->setCellValue('X12', $suhuDagingItem4Parts[8] ?? ''); // Part 9
                $sheet->setCellValue('Y12', $suhuDagingItem4Parts[9] ?? ''); // Part 10
                $sheet->setCellValue('X13', $suhuDagingItem4Parts[10] ?? ''); // Part 11
                $sheet->setCellValue('Y13', $suhuDagingItem4Parts[11] ?? ''); // Part 12
            }

            // For rata_rata_item_1
            if (!empty($data->rata_rata_item_1)) {
                $rataRataItem1Parts = explode(',', $data->rata_rata_item_1); // Split rata_rata_item_1 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B14', $rataRataItem1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('D14', $rataRataItem1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('F14', $rataRataItem1Parts[2] ?? ''); // Part 3
            }

            // For rata_rata_item_2
            if (!empty($data->rata_rata_item_2)) {
                $rataRataItem2Parts = explode(',', $data->rata_rata_item_2); // Split rata_rata_item_2 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('H14', $rataRataItem2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('J14', $rataRataItem2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('L14', $rataRataItem2Parts[2] ?? ''); // Part 3
            }

            // For rata_rata_item_3
            if (!empty($data->rata_rata_item_3)) {
                $rataRataItem3Parts = explode(',', $data->rata_rata_item_3); // Split rata_rata_item_3 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('N14', $rataRataItem3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('P14', $rataRataItem3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('R14', $rataRataItem3Parts[2] ?? ''); // Part 3
            }

            // For rata_rata_item_4
            if (!empty($data->rata_rata_item_4)) {
                $rataRataItem4Parts = explode(',', $data->rata_rata_item_4); // Split rata_rata_item_4 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('T14', $rataRataItem4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('V14', $rataRataItem4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('X14', $rataRataItem4Parts[2] ?? ''); // Part 3
            }

            // For kondisi_daging
            if (!empty($data->kondisi_daging)) {
                $kondisiDagingParts = explode(',', $data->kondisi_daging); // Split kondisi_daging on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B15', $kondisiDagingParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H15', $kondisiDagingParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N15', $kondisiDagingParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T15', $kondisiDagingParts[3] ?? ''); // Part 4
            }

            // For marinade_bahan_utama_1
            if (!empty($data->marinade_bahan_utama_1)) {
                $marinadeBahanUtama1Parts = explode(',', $data->marinade_bahan_utama_1); // Split marinade_bahan_utama_1 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B17', $marinadeBahanUtama1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('D17', $marinadeBahanUtama1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('F17', $marinadeBahanUtama1Parts[2] ?? ''); // Part 3
            }
            // For marinade_bahan_utama_2
            if (!empty($data->marinade_bahan_utama_2)) {
                $marinadeBahanUtama2Parts = explode(',', $data->marinade_bahan_utama_2); // Split marinade_bahan_utama_2 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('H17', $marinadeBahanUtama2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('J17', $marinadeBahanUtama2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('L17', $marinadeBahanUtama2Parts[2] ?? ''); // Part 3
            }

            // For marinade_bahan_utama_3
            if (!empty($data->marinade_bahan_utama_3)) {
                $marinadeBahanUtama3Parts = explode(',', $data->marinade_bahan_utama_3); // Split marinade_bahan_utama_3 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('N17', $marinadeBahanUtama3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('P17', $marinadeBahanUtama3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('R17', $marinadeBahanUtama3Parts[2] ?? ''); // Part 3
            }

            // For marinade_bahan_utama_4
            if (!empty($data->marinade_bahan_utama_4)) {
                $marinadeBahanUtama4Parts = explode(',', $data->marinade_bahan_utama_4); // Split marinade_bahan_utama_4 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('T17', $marinadeBahanUtama4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('V17', $marinadeBahanUtama4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('X17', $marinadeBahanUtama4Parts[2] ?? ''); // Part 3
            }

            // For marinade_kode_1
            if (!empty($data->marinade_kode_1)) {
                $marinadeKode1Parts = explode(',', $data->marinade_kode_1); // Split marinade_kode_1 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('B18', $marinadeKode1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('C18', $marinadeKode1Parts[1] ?? ''); // Part 2             
                $sheet->setCellValue('D18', $marinadeKode1Parts[2] ?? ''); // Part 5
                $sheet->setCellValue('E18', $marinadeKode1Parts[3] ?? ''); // Part 6            
                $sheet->setCellValue('F18', $marinadeKode1Parts[4] ?? ''); // Part 9
                $sheet->setCellValue('G18', $marinadeKode1Parts[5] ?? ''); // Part 10

            }

            // For marinade_kode_2
            if (!empty($data->marinade_kode_2)) {
                $marinadeKode2Parts = explode(',', $data->marinade_kode_2); // Split marinade_kode_2 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('H18', $marinadeKode2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('I18', $marinadeKode2Parts[1] ?? ''); // Part 2             
                $sheet->setCellValue('J18', $marinadeKode2Parts[2] ?? ''); // Part 5
                $sheet->setCellValue('K18', $marinadeKode2Parts[3] ?? ''); // Part 6           
                $sheet->setCellValue('L18', $marinadeKode2Parts[4] ?? ''); // Part 9
                $sheet->setCellValue('M18', $marinadeKode2Parts[5] ?? ''); // Part 10

            }

            // For marinade_kode_3
            if (!empty($data->marinade_kode_3)) {
                $marinadeKode3Parts = explode(',', $data->marinade_kode_3); // Split marinade_kode_3 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('N18', $marinadeKode3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('O18', $marinadeKode3Parts[1] ?? ''); // Part 2          
                $sheet->setCellValue('P18', $marinadeKode3Parts[2] ?? ''); // Part 5
                $sheet->setCellValue('Q18', $marinadeKode3Parts[3] ?? ''); // Part 6     
                $sheet->setCellValue('R18', $marinadeKode3Parts[4] ?? ''); // Part 9
                $sheet->setCellValue('S18', $marinadeKode3Parts[5] ?? ''); // Part 10

            }

            // For marinade_kode_4
            if (!empty($data->marinade_kode_4)) {
                $marinadeKode4Parts = explode(',', $data->marinade_kode_4); // Split marinade_kode_4 on commas
                // Map each part to the respective cells
                $sheet->setCellValue('T18', $marinadeKode4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('U18', $marinadeKode4Parts[1] ?? ''); // Part 2  
                $sheet->setCellValue('V18', $marinadeKode4Parts[2] ?? ''); // Part 5
                $sheet->setCellValue('W18', $marinadeKode4Parts[3] ?? ''); // Part 6
                $sheet->setCellValue('X18', $marinadeKode4Parts[4] ?? ''); // Part 9
                $sheet->setCellValue('Y18', $marinadeKode4Parts[5] ?? ''); // Part 10

            }

            // For marinade_berat_1
            if (!empty($data->marinade_berat_1)) {
                $marinadeBerat1Parts = explode(',', $data->marinade_berat_1); // Split marinade_berat_1 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B19', $marinadeBerat1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('C19', $marinadeBerat1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('D19', $marinadeBerat1Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('E19', $marinadeBerat1Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('F19', $marinadeBerat1Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('G19', $marinadeBerat1Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_2
            if (!empty($data->marinade_berat_2)) {
                $marinadeBerat2Parts = explode(',', $data->marinade_berat_2); // Split marinade_berat_2 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('H19', $marinadeBerat2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('I19', $marinadeBerat2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('J19', $marinadeBerat2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('K19', $marinadeBerat2Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('L19', $marinadeBerat2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('M19', $marinadeBerat2Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_3
            if (!empty($data->marinade_berat_3)) {
                $marinadeBerat3Parts = explode(',', $data->marinade_berat_3); // Split marinade_berat_3 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('N19', $marinadeBerat3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('O19', $marinadeBerat3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('P19', $marinadeBerat3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('Q19', $marinadeBerat3Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('R19', $marinadeBerat3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('S19', $marinadeBerat3Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_4
            if (!empty($data->marinade_berat_4)) {
                $marinadeBerat4Parts = explode(',', $data->marinade_berat_4); // Split marinade_berat_4 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('T19', $marinadeBerat4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('U19', $marinadeBerat4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('V19', $marinadeBerat4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('W19', $marinadeBerat4Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('X19', $marinadeBerat4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('Y19', $marinadeBerat4Parts[5] ?? ''); // Part 6
            }

            // For marinade_kode_next_1
            if (!empty($data->marinade_kode_next_1)) {
                $marinadeKodeNext1Parts = explode(',', $data->marinade_kode_next_1); // Split marinade_kode_next_1 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B20', $marinadeKodeNext1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('C20', $marinadeKodeNext1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('D20', $marinadeKodeNext1Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('E20', $marinadeKodeNext1Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('F20', $marinadeKodeNext1Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('G20', $marinadeKodeNext1Parts[5] ?? ''); // Part 6
            }

            // For marinade_kode_next_2
            if (!empty($data->marinade_kode_next_2)) {
                $marinadeKodeNext2Parts = explode(',', $data->marinade_kode_next_2); // Split marinade_kode_next_2 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('H20', $marinadeKodeNext2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('I20', $marinadeKodeNext2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('J20', $marinadeKodeNext2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('K20', $marinadeKodeNext2Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('L20', $marinadeKodeNext2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('M20', $marinadeKodeNext2Parts[5] ?? ''); // Part 6
            }

            // For marinade_kode_next_3
            if (!empty($data->marinade_kode_next_3)) {
                $marinadeKodeNext3Parts = explode(',', $data->marinade_kode_next_3); // Split marinade_kode_next_3 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('N20', $marinadeKodeNext3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('O20', $marinadeKodeNext3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('P20', $marinadeKodeNext3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('Q20', $marinadeKodeNext3Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('R20', $marinadeKodeNext3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('S20', $marinadeKodeNext3Parts[5] ?? ''); // Part 6
            }

            // For marinade_kode_next_4
            if (!empty($data->marinade_kode_next_4)) {
                $marinadeKodeNext4Parts = explode(',', $data->marinade_kode_next_4); // Split marinade_kode_next_4 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('T20', $marinadeKodeNext4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('U20', $marinadeKodeNext4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('V20', $marinadeKodeNext4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('W20', $marinadeKodeNext4Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('X20', $marinadeKodeNext4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('Y20', $marinadeKodeNext4Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_next_1
            if (!empty($data->marinade_berat_next_1)) {
                $marinadeBeratNext1Parts = explode(',', $data->marinade_berat_next_1); // Split marinade_berat_next_1 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B21', $marinadeBeratNext1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('C21', $marinadeBeratNext1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('D21', $marinadeBeratNext1Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('E21', $marinadeBeratNext1Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('F21', $marinadeBeratNext1Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('G21', $marinadeBeratNext1Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_next_2
            if (!empty($data->marinade_berat_next_2)) {
                $marinadeBeratNext2Parts = explode(',', $data->marinade_berat_next_2); // Split marinade_berat_next_2 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('H21', $marinadeBeratNext2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('I21', $marinadeBeratNext2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('J21', $marinadeBeratNext2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('K21', $marinadeBeratNext2Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('L21', $marinadeBeratNext2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('M21', $marinadeBeratNext2Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_next_3
            if (!empty($data->marinade_berat_next_3)) {
                $marinadeBeratNext3Parts = explode(',', $data->marinade_berat_next_3); // Split marinade_berat_next_3 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('N21', $marinadeBeratNext3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('O21', $marinadeBeratNext3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('P21', $marinadeBeratNext3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('Q21', $marinadeBeratNext3Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('R21', $marinadeBeratNext3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('S21', $marinadeBeratNext3Parts[5] ?? ''); // Part 6
            }

            // For marinade_berat_next_4
            if (!empty($data->marinade_berat_next_4)) {
                $marinadeBeratNext4Parts = explode(',', $data->marinade_berat_next_4); // Split marinade_berat_next_4 on commas

                // Map each part to the respective cells
                $sheet->setCellValue('T21', $marinadeBeratNext4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('U21', $marinadeBeratNext4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('V21', $marinadeBeratNext4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('W21', $marinadeBeratNext4Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('X21', $marinadeBeratNext4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('Y21', $marinadeBeratNext4Parts[5] ?? ''); // Part 6
            }


            // For bahan_lain
            if (!empty($data->bahan_lain)) {
                $bahanLainParts = explode(',', $data->bahan_lain); // Split bahan_lain on commas

                // Map each part to the respective cells (A21 to A28)
               
                $sheet->setCellValue('A23', $bahanLainParts[0] ?? ''); // Part 3
                $sheet->setCellValue('A24', $bahanLainParts[1] ?? ''); // Part 4
                $sheet->setCellValue('A25', $bahanLainParts[2] ?? ''); // Part 5
                $sheet->setCellValue('A26', $bahanLainParts[3] ?? ''); // Part 6
                $sheet->setCellValue('A27', $bahanLainParts[4] ?? ''); // Part 7
                $sheet->setCellValue('A28', $bahanLainParts[5] ?? ''); // Part 8
            }

            // For bahan_lain_kode_item_1
            if (!empty($data->bahan_lain_kode_item_1)) {
                $bahanLainKodeItemParts = explode(',', $data->bahan_lain_kode_item_1); // Split on commas

                // Map each part to the respective cells (B23 to B28)
                $sheet->setCellValue('B23', $bahanLainKodeItemParts[0] ?? ''); // Part 1
                $sheet->setCellValue('B24', $bahanLainKodeItemParts[1] ?? ''); // Part 2
                $sheet->setCellValue('B25', $bahanLainKodeItemParts[2] ?? ''); // Part 3
                $sheet->setCellValue('B26', $bahanLainKodeItemParts[3] ?? ''); // Part 4
                $sheet->setCellValue('B27', $bahanLainKodeItemParts[4] ?? ''); // Part 5
                $sheet->setCellValue('B28', $bahanLainKodeItemParts[5] ?? ''); // Part 6
            }

            // For bahan_lain_berat_item_1
            if (!empty($data->bahan_lain_berat_item_1)) {
                $bahanLainBeratParts = explode(',', $data->bahan_lain_berat_item_1); // Split on commas

                // Map each part to the respective cells (D23 to D28)
                $sheet->setCellValue('D23', $bahanLainBeratParts[0] ?? ''); // Part 1
                $sheet->setCellValue('D24', $bahanLainBeratParts[1] ?? ''); // Part 2
                $sheet->setCellValue('D25', $bahanLainBeratParts[2] ?? ''); // Part 3
                $sheet->setCellValue('D26', $bahanLainBeratParts[3] ?? ''); // Part 4
                $sheet->setCellValue('D27', $bahanLainBeratParts[4] ?? ''); // Part 5
                $sheet->setCellValue('D28', $bahanLainBeratParts[5] ?? ''); // Part 6
            }

            // For bahan_lain_sensori_item_1
            if (!empty($data->bahan_lain_sensori_item_1)) {
                $bahanLainSensoriParts = explode(',', $data->bahan_lain_sensori_item_1); // Split on commas

                // Map each part to the respective cells (F23 to F28)
                $sheet->setCellValue('F23', $bahanLainSensoriParts[0] ?? ''); // Part 1
                $sheet->setCellValue('F24', $bahanLainSensoriParts[1] ?? ''); // Part 2
                $sheet->setCellValue('F25', $bahanLainSensoriParts[2] ?? ''); // Part 3
                $sheet->setCellValue('F26', $bahanLainSensoriParts[3] ?? ''); // Part 4
                $sheet->setCellValue('F27', $bahanLainSensoriParts[4] ?? ''); // Part 5
                $sheet->setCellValue('F28', $bahanLainSensoriParts[5] ?? ''); // Part 6
            }

            // For bahan_lain_kode_item_2
            if (!empty($data->bahan_lain_kode_item_2)) {
                $bahanLainKodeItem2Parts = explode(',', $data->bahan_lain_kode_item_2); // Split on commas

                // Map each part to the respective cells (H23 to H28)
                $sheet->setCellValue('H23', $bahanLainKodeItem2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('H24', $bahanLainKodeItem2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('H25', $bahanLainKodeItem2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('H26', $bahanLainKodeItem2Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('H27', $bahanLainKodeItem2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('H28', $bahanLainKodeItem2Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_berat_item_2
            if (!empty($data->bahan_lain_berat_item_2)) {
                $bahanLainBeratItem2Parts = explode(',', $data->bahan_lain_berat_item_2); // Split on commas

                // Map each part to the respective cells (J23 to J28)
                $sheet->setCellValue('J23', $bahanLainBeratItem2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('J24', $bahanLainBeratItem2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('J25', $bahanLainBeratItem2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('J26', $bahanLainBeratItem2Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('J27', $bahanLainBeratItem2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('J28', $bahanLainBeratItem2Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_sensori_item_2
            if (!empty($data->bahan_lain_sensori_item_2)) {
                $bahanLainSensoriItem2Parts = explode(',', $data->bahan_lain_sensori_item_2); // Split on commas

                // Map each part to the respective cells (L23 to L28)
                $sheet->setCellValue('L23', $bahanLainSensoriItem2Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('L24', $bahanLainSensoriItem2Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('L25', $bahanLainSensoriItem2Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('L26', $bahanLainSensoriItem2Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('L27', $bahanLainSensoriItem2Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('L28', $bahanLainSensoriItem2Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_kode_item_3
            if (!empty($data->bahan_lain_kode_item_3)) {
                $bahanLainKodeItem3Parts = explode(',', $data->bahan_lain_kode_item_3); // Split on commas

                // Map each part to the respective cells (N23 to N28)
                $sheet->setCellValue('N23', $bahanLainKodeItem3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('N24', $bahanLainKodeItem3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('N25', $bahanLainKodeItem3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('N26', $bahanLainKodeItem3Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('N27', $bahanLainKodeItem3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('N28', $bahanLainKodeItem3Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_berat_item_3
            if (!empty($data->bahan_lain_berat_item_3)) {
                $bahanLainBeratItem3Parts = explode(',', $data->bahan_lain_berat_item_3); // Split on commas

                // Map each part to the respective cells (P23 to P28)
                $sheet->setCellValue('P23', $bahanLainBeratItem3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('P24', $bahanLainBeratItem3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('P25', $bahanLainBeratItem3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('P26', $bahanLainBeratItem3Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('P27', $bahanLainBeratItem3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('P28', $bahanLainBeratItem3Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_sensori_item_3
            if (!empty($data->bahan_lain_sensori_item_3)) {
                $bahanLainSensoriItem3Parts = explode(',', $data->bahan_lain_sensori_item_3); // Split on commas

                // Map each part to the respective cells (R23 to R28)
                $sheet->setCellValue('R23', $bahanLainSensoriItem3Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('R24', $bahanLainSensoriItem3Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('R25', $bahanLainSensoriItem3Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('R26', $bahanLainSensoriItem3Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('R27', $bahanLainSensoriItem3Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('R28', $bahanLainSensoriItem3Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_kode_item_4
            if (!empty($data->bahan_lain_kode_item_4)) {
                $bahanLainKodeItem4Parts = explode(',', $data->bahan_lain_kode_item_4); // Split on commas

                // Map each part to the respective cells (T23 to T28)
                $sheet->setCellValue('T23', $bahanLainKodeItem4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('T24', $bahanLainKodeItem4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('T25', $bahanLainKodeItem4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('T26', $bahanLainKodeItem4Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('T27', $bahanLainKodeItem4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('T28', $bahanLainKodeItem4Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_berat_item_4
            if (!empty($data->bahan_lain_berat_item_4)) {
                $bahanLainBeratItem4Parts = explode(',', $data->bahan_lain_berat_item_4); // Split on commas

                // Map each part to the respective cells (V23 to V28)
                $sheet->setCellValue('V23', $bahanLainBeratItem4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('V24', $bahanLainBeratItem4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('V25', $bahanLainBeratItem4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('V26', $bahanLainBeratItem4Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('V27', $bahanLainBeratItem4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('V28', $bahanLainBeratItem4Parts[5] ?? ''); // Part 6
            }

            // For bahan_lain_sensori_item_4
            if (!empty($data->bahan_lain_sensori_item_4)) {
                $bahanLainSensoriItem4Parts = explode(',', $data->bahan_lain_sensori_item_4); // Split on commas

                // Map each part to the respective cells (X23 to X28)
                $sheet->setCellValue('X23', $bahanLainSensoriItem4Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('X24', $bahanLainSensoriItem4Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('X25', $bahanLainSensoriItem4Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('X26', $bahanLainSensoriItem4Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('X27', $bahanLainSensoriItem4Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('X28', $bahanLainSensoriItem4Parts[5] ?? ''); // Part 6
            }


            // Other fields
            // For air (B29, H29, N29, T29, etc.)
            if (!empty($data->air)) {
                $airParts = explode(',', $data->air); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B29', $airParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H29', $airParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N29', $airParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T29', $airParts[3] ?? ''); // Part 4
            }

            // For suhu_air (B30, H30, N30, T30, etc.)
            if (!empty($data->suhu_air)) {
                $suhuAirParts = explode(',', $data->suhu_air); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B30', $suhuAirParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H30', $suhuAirParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N30', $suhuAirParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T30', $suhuAirParts[3] ?? ''); // Part 4
            }

            // For suhu_marinade (B31, H31, N31, T31, etc.)
            if (!empty($data->suhu_marinade)) {
                $suhuMarinadeParts = explode(',', $data->suhu_marinade); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B31', $suhuMarinadeParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H31', $suhuMarinadeParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N31', $suhuMarinadeParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T31', $suhuMarinadeParts[3] ?? ''); // Part 4
            }

            // For lama_pengadukan (B32, H32, N32, T32, etc.)
            if (!empty($data->lama_pengadukan)) {
                $lamaPengadukanParts = explode(',', $data->lama_pengadukan); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B32', $lamaPengadukanParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H32', $lamaPengadukanParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N32', $lamaPengadukanParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T32', $lamaPengadukanParts[3] ?? ''); // Part 4
            }

            // For brix_salinity (B33, H33, N33, T33, etc.)
            if (!empty($data->brix_salinity)) {
                $brixSalinityParts = explode(',', $data->brix_salinity); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B33', $brixSalinityParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H33', $brixSalinityParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N33', $brixSalinityParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T33', $brixSalinityParts[3] ?? ''); // Part 4
            }

            // For drum_on (B35, H35, N35, T35, etc.)
            if (!empty($data->drum_on)) {
                $drumOnParts = explode(',', $data->drum_on); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B35', $drumOnParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H35', $drumOnParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N35', $drumOnParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T35', $drumOnParts[3] ?? ''); // Part 4
            }

            // For drum_off (B36, H36, N36, T36, etc.)
            if (!empty($data->drum_off)) {
                $drumOffParts = explode(',', $data->drum_off); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B36', $drumOffParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H36', $drumOffParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N36', $drumOffParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T36', $drumOffParts[3] ?? ''); // Part 4
            }

            // For drum_speed (B37, H37, N37, T37, etc.)
            if (!empty($data->drum_speed)) {
                $drumSpeedParts = explode(',', $data->drum_speed); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B37', $drumSpeedParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H37', $drumSpeedParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N37', $drumSpeedParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T37', $drumSpeedParts[3] ?? ''); // Part 4
            }

            // For vacuum_time (B38, H38, N38, T38, etc.)
            if (!empty($data->vacuum_time)) {
                $vacuumTimeParts = explode(',', $data->vacuum_time); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B38', $vacuumTimeParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H38', $vacuumTimeParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N38', $vacuumTimeParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T38', $vacuumTimeParts[3] ?? ''); // Part 4
            }

            // For total_time (B39, H39, N39, T39, etc.)
            if (!empty($data->total_time)) {
                $totalTimeParts = explode(',', $data->total_time); // Split on commas

                // Map each part to the respective cells
                $sheet->setCellValue('B39', $totalTimeParts[0] ?? ''); // Part 1
                $sheet->setCellValue('H39', $totalTimeParts[1] ?? ''); // Part 2
                $sheet->setCellValue('N39', $totalTimeParts[2] ?? ''); // Part 3
                $sheet->setCellValue('T39', $totalTimeParts[3] ?? ''); // Part 4
            }

            // For mulai_item_1 (B40, E40)
            if (!empty($data->mulai_item_1)) {
                $mulaiItem1Parts = explode(',', $data->mulai_item_1);

                $sheet->setCellValue('B40', $mulaiItem1Parts[0] ?? '');
                $sheet->setCellValue('E40', $mulaiItem1Parts[1] ?? '');
            }

            // For mulai_item_2 (H40, K40)
            if (!empty($data->mulai_item_2)) {
                $mulaiItem2Parts = explode(',', $data->mulai_item_2);

                $sheet->setCellValue('H40', $mulaiItem2Parts[0] ?? '');
                $sheet->setCellValue('K40', $mulaiItem2Parts[1] ?? '');
            }

            // For mulai_item_3 (N40, Q40)
            if (!empty($data->mulai_item_3)) {
                $mulaiItem3Parts = explode(',', $data->mulai_item_3);

                $sheet->setCellValue('N40', $mulaiItem3Parts[0] ?? '');
                $sheet->setCellValue('Q40', $mulaiItem3Parts[1] ?? '');
            }

            // For mulai_item_4 (T40, W40)
            if (!empty($data->mulai_item_4)) {
                $mulaiItem4Parts = explode(',', $data->mulai_item_4);

                $sheet->setCellValue('T40', $mulaiItem4Parts[0] ?? '');
                $sheet->setCellValue('W40', $mulaiItem4Parts[1] ?? '');
            }

            // For selesai_item_1 (D40, G40)
            if (!empty($data->selesai_item_1)) {
                $selesaiItem1Parts = explode(',', $data->selesai_item_1);

                $sheet->setCellValue('D40', $selesaiItem1Parts[0] ?? '');
                $sheet->setCellValue('G40', $selesaiItem1Parts[1] ?? '');
            }

            // For selesai_item_2 (J40, M40)
            if (!empty($data->selesai_item_2)) {
                $selesaiItem2Parts = explode(',', $data->selesai_item_2);

                $sheet->setCellValue('J40', $selesaiItem2Parts[0] ?? '');
                $sheet->setCellValue('M40', $selesaiItem2Parts[1] ?? '');
            }

            // For selesai_item_3 (P40, S40)
            if (!empty($data->selesai_item_3)) {
                $selesaiItem3Parts = explode(',', $data->selesai_item_3);

                $sheet->setCellValue('P40', $selesaiItem3Parts[0] ?? '');
                $sheet->setCellValue('S40', $selesaiItem3Parts[1] ?? '');
            }

            // For selesai_item_4 (V40, Y40)
            if (!empty($data->selesai_item_4)) {
                $selesaiItem4Parts = explode(',', $data->selesai_item_4);

                $sheet->setCellValue('V40', $selesaiItem4Parts[0] ?? '');
                $sheet->setCellValue('Y40', $selesaiItem4Parts[1] ?? '');
            }


            if (!empty($data->tumbling_suhu_daging_item_1)) {
                $item1Parts = explode(',', $data->tumbling_suhu_daging_item_1); // Split on commas

                // Map each part to respective cells (row 42)
                $sheet->setCellValue('B42', $item1Parts[0] ?? ''); // Part 1
                $sheet->setCellValue('C42', $item1Parts[1] ?? ''); // Part 2
                $sheet->setCellValue('D42', $item1Parts[2] ?? ''); // Part 3
                $sheet->setCellValue('E42', $item1Parts[3] ?? ''); // Part 4
                $sheet->setCellValue('F42', $item1Parts[4] ?? ''); // Part 5
                $sheet->setCellValue('G42', $item1Parts[5] ?? ''); // Part 6

                // Map each part to respective cells (row 43)
                $sheet->setCellValue('B43', $item1Parts[6] ?? ''); // Part 1
                $sheet->setCellValue('C43', $item1Parts[7] ?? ''); // Part 2
                $sheet->setCellValue('D43', $item1Parts[8] ?? ''); // Part 3
                $sheet->setCellValue('E43', $item1Parts[9] ?? ''); // Part 4
                $sheet->setCellValue('F43', $item1Parts[10] ?? ''); // Part 5
                $sheet->setCellValue('G43', $item1Parts[11] ?? ''); // Part 6
            }

            if (!empty($data->tumbling_suhu_daging_item_2)) {
                $item2Parts = explode(',', $data->tumbling_suhu_daging_item_2);

                // Map each part to respective cells (row 42)
                $sheet->setCellValue('H42', $item2Parts[0] ?? '');
                $sheet->setCellValue('I42', $item2Parts[1] ?? '');
                $sheet->setCellValue('J42', $item2Parts[2] ?? '');
                $sheet->setCellValue('K42', $item2Parts[3] ?? '');
                $sheet->setCellValue('L42', $item2Parts[4] ?? '');
                $sheet->setCellValue('M42', $item2Parts[5] ?? '');

                // Map each part to respective cells (row 43)
                $sheet->setCellValue('H43', $item2Parts[6] ?? '');
                $sheet->setCellValue('I43', $item2Parts[7] ?? '');
                $sheet->setCellValue('J43', $item2Parts[8] ?? '');
                $sheet->setCellValue('K43', $item2Parts[9] ?? '');
                $sheet->setCellValue('L43', $item2Parts[10] ?? '');
                $sheet->setCellValue('M43', $item2Parts[11] ?? '');
            }

            if (!empty($data->tumbling_suhu_daging_item_3)) {
                $item3Parts = explode(',', $data->tumbling_suhu_daging_item_3);

                $sheet->setCellValue('N42', $item3Parts[0] ?? '');
                $sheet->setCellValue('O42', $item3Parts[1] ?? '');
                $sheet->setCellValue('P42', $item3Parts[2] ?? '');
                $sheet->setCellValue('Q42', $item3Parts[3] ?? '');
                $sheet->setCellValue('R42', $item3Parts[4] ?? '');
                $sheet->setCellValue('S42', $item3Parts[5] ?? '');

                $sheet->setCellValue('N43', $item3Parts[6] ?? '');
                $sheet->setCellValue('O43', $item3Parts[7] ?? '');
                $sheet->setCellValue('P43', $item3Parts[8] ?? '');
                $sheet->setCellValue('Q43', $item3Parts[9] ?? '');
                $sheet->setCellValue('R43', $item3Parts[10] ?? '');
                $sheet->setCellValue('S43', $item3Parts[11] ?? '');
            }

            if (!empty($data->tumbling_suhu_daging_item_4)) {
                $item4Parts = explode(',', $data->tumbling_suhu_daging_item_4);

                $sheet->setCellValue('T42', $item4Parts[0] ?? '');
                $sheet->setCellValue('U42', $item4Parts[1] ?? '');
                $sheet->setCellValue('V42', $item4Parts[2] ?? '');
                $sheet->setCellValue('W42', $item4Parts[3] ?? '');
                $sheet->setCellValue('X42', $item4Parts[4] ?? '');
                $sheet->setCellValue('Y42', $item4Parts[5] ?? '');

                $sheet->setCellValue('T43', $item4Parts[6] ?? '');
                $sheet->setCellValue('U43', $item4Parts[7] ?? '');
                $sheet->setCellValue('V43', $item4Parts[8] ?? '');
                $sheet->setCellValue('W43', $item4Parts[9] ?? '');
                $sheet->setCellValue('X43', $item4Parts[10] ?? '');
                $sheet->setCellValue('Y43', $item4Parts[11] ?? '');
            }

            if (!empty($data->tumbling_rata_rata)) {
                $rataParts = explode(',', $data->tumbling_rata_rata);

                $sheet->setCellValue('B44', $rataParts[0] ?? '');
                $sheet->setCellValue('H44', $rataParts[1] ?? '');
                $sheet->setCellValue('N44', $rataParts[2] ?? '');
                $sheet->setCellValue('T44', $rataParts[3] ?? '');
            }

            if (!empty($data->kondisi)) {
                $kondisiParts = explode(',', $data->kondisi);

                $sheet->setCellValue('B45', $kondisiParts[0] ?? '');
                $sheet->setCellValue('H45', $kondisiParts[1] ?? '');
                $sheet->setCellValue('N45', $kondisiParts[2] ?? '');
                $sheet->setCellValue('T45', $kondisiParts[3] ?? '');
            }


            if (!empty($data->catatan_bawah)) {
                $catatanParts = explode(',', $data->catatan_bawah);

                $sheet->setCellValue('B46', $catatanParts[0] ?? '');
                $sheet->setCellValue('H46', $catatanParts[1] ?? '');
                $sheet->setCellValue('N46', $catatanParts[2] ?? '');
                $sheet->setCellValue('T46', $catatanParts[3] ?? '');
            }
            $sheet->setCellValue('B51', $data->catatan ?? '');


            // Add the rest of your database fields here in a similar way
        }

        // Set the writer to Xlsx and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Tumbling_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }


}