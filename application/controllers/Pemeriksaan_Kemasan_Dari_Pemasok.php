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
class Pemeriksaan_Kemasan_Dari_Pemasok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_kemasan_dari_pemasok_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pemeriksaan_kemasan_dari_pemasok' => $this->pemeriksaan_kemasan_dari_pemasok_model->get_all(),
            'active_nav' => 'pemeriksaan_kemasan_dari_pemasok',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_kemasan_dari_pemasok');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pemeriksaan_kemasan_dari_pemasok_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pemeriksaan_kemasan_dari_pemasok berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pemeriksaan_kemasan_dari_pemasok");
            }

            // Redirect after handling the form submission
            redirect('pemeriksaan_kemasan_dari_pemasok');
        }

        // Prepare data to load the form view
        $data = array(
            'pemeriksaan_kemasan_dari_pemasok' => $this->pemeriksaan_kemasan_dari_pemasok_model->get_all(),
            'active_nav' => 'pemeriksaan_kemasan_dari_pemasok',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_kemasan_dari_pemasok-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pemeriksaan_kemasan_dari_pemasok'] = $this->pemeriksaan_kemasan_dari_pemasok_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_kemasan_dari_pemasok-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'jenis_kemasan' => $this->input->post('jenis_kemasan'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'pemasok' => $this->input->post('pemasok'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'no_po' => $this->input->post('no_po'),
            'jumlah_barang_datang' => $this->input->post('jumlah_barang_datang'),
            'sampling' => $this->input->post('sampling'),
            'sesuai' => $this->input->post('sesuai'),
            'tidak_sesuai' => $this->input->post('tidak_sesuai'),
            'penampakan' => $this->input->post('penampakan'),
            'dimensi' => $this->input->post('dimensi'),
            'sealing' => $this->input->post('sealing'),
            'cetakan' => $this->input->post('cetakan'),
            'ketebalan' => $this->input->post('ketebalan'),
            'ok' => $this->input->post('ok'),
            'tolak' => $this->input->post('tolak'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->pemeriksaan_kemasan_dari_pemasok_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_kemasan_dari_pemasok berhasil diupdate');
            redirect('pemeriksaan_kemasan_dari_pemasok');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pemeriksaan_kemasan_dari_pemasok');
            redirect('pemeriksaan_kemasan_dari_pemasok/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pemeriksaan_kemasan_dari_pemasok_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_kemasan_dari_pemasok berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pemeriksaan_kemasan_dari_pemasok');
        }
        redirect('pemeriksaan_kemasan_dari_pemasok');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 37 Pemeriksaan Kemasan dari Pemasok.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $dateSet = false;

        $catatanArray = []; // To store concatenated catatan

        // Starting row for the main data (A11 onwards)
        $startingRow = 12;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->pemeriksaan_kemasan_dari_pemasok_model->get_by_uuid($uuid);
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
                    $sheet->setCellValue('C7', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }
                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->jenis_kemasan ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->spesifikasi ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->pemasok ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->no_po ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->jumlah_barang_datang ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->sampling ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->sesuai ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->tidak_sesuai ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->penampakan ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->dimensi ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->sealing ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->cetakan ?? '');
                $sheet->setCellValue('O' . $startingRow, $data->ketebalan ?? '');
                $sheet->setCellValue('P' . $startingRow, $data->ok ?? '');
                $sheet->setCellValue('Q' . $startingRow, $data->tolak ?? '');
                $sheet->setCellValue('R' . $startingRow, $data->keterangan ?? '');
              

                // Move to the next row for the main data
                $startingRow++;
            }


            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B58', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pemeriksaan_kemasan_dari_pemasok_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>