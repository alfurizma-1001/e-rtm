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
class pem_masak_rice_cooker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_masak_rice_cooker_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_masak_rice_cooker' => $this->pem_masak_rice_cooker_model->get_all(),
            'active_nav' => 'pem_masak_rice_cooker',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pem_masak_rice_cooker');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pem_masak_rice_cooker_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pem_masak_rice_cooker berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pem_masak_rice_cooker");
            }

            // Redirect after handling the form submission
            redirect('pem_masak_rice_cooker');
        }

        // Prepare data to load the form view
        $data = array(
            'pem_masak_rice_cooker' => $this->pem_masak_rice_cooker_model->get_all(),
            'active_nav' => 'pem_masak_rice_cooker',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pem_masak_rice_cooker-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pem_masak_rice_cooker'] = $this->pem_masak_rice_cooker_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pem_masak_rice_cooker-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_beras' => $this->input->post('kode_beras'),
            'berat' => $this->input->post('berat'),
            'kode_prod' => $this->input->post('kode_prod'),
            'basket_no' => $this->input->post('basket_no'),
            'gas' => $this->input->post('gas'),
            'waktu' => $this->input->post('waktu'),
            'suhu_produk' => $this->input->post('suhu_produk'),
            'suhu_produk_1menit' => $this->input->post('suhu_produk_1menit'),
            'suhu_aftervakum' => $this->input->post('suhu_aftervakum'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesi' => $this->input->post('jam_selesi'),
            'kematangan' => $this->input->post('kematangan'),
            'rasa' => $this->input->post('rasa'),
            'aroma' => $this->input->post('aroma'),
            'tekstur' => $this->input->post('tekstur'),
            'warna' => $this->input->post('warna'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),
        );

        $update = $this->pem_masak_rice_cooker_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pem_masak_rice_cooker berhasil diupdate');
            redirect('pem_masak_rice_cooker');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pem_masak_rice_cooker');
            redirect('pem_masak_rice_cooker/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pem_masak_rice_cooker_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_masak_rice_cooker berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_masak_rice_cooker');
        }
        redirect('pem_masak_rice_cooker');
    }

    public function print_multiple_excel()
{
    // Get the selected UUIDs from the query string (GET request)
    $selected_uuids = $this->input->get('uuids');

    // Explode the UUIDs into an array
    $selected_uuids = explode(',', $selected_uuids);

    // Correct the path to point to the local template on your server
    $filePath = FCPATH . 'assets/excel/QR 08 pemeriksaan pemasakan dengan rice cooker.xls'; // Path to your template

    // Load your Excel template
    $spreadsheet = IOFactory::load($filePath);

    // Get active sheet from the loaded template
    $sheet = $spreadsheet->getActiveSheet();

    // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
    $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

    // Variables to track if date and shift have already been set
    $dateSet = false;
    $nama_produkSet = false;
    $shiftArray = []; // To store unique shifts
    $catatanArray = []; // To store concatenated catatan

    // Starting row for the main data (B9 onwards vertically)
    $startingRow = 9;

    // Starting column for the items (B, C, D, ...)
    $startingCol = 2; // B column

    // Check if there are selected UUIDs
    if (!empty($selected_uuids)) {
        $allData = [];

        // Collect the data for each UUID
        foreach ($selected_uuids as $uuid) {
            $data = $this->pem_masak_rice_cooker_model->get_by_uuid($uuid);
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
                $sheet->setCellValue('B7', $data->date ?? '');
                $dateSet = true; // Mark date as set
            }

            if (!$nama_produkSet || !empty($data->nama_produk)) {
                $sheet->setCellValue('H7', $data->nama_produk ?? '');
                $nama_produkSet = true; // Mark date as set
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

            // Insert data for this item in the current column
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->kode_beras ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->berat ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->kode_prod ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->basket_no ?? '');
            $currentRow++;

            // Skip the empty cell after basket_no and start from B14
            $currentRow++;  // Skip the empty row (B13) and continue at B14

            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->gas ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->waktu ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->suhu_produk ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->suhu_produk_1menit ?? '');
            $currentRow++;
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->suhu_aftervakum ?? '');
            $currentRow++;
            $currentRow++;
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->jam_mulai ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->jam_selesi ?? '');
            $currentRow++;
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->kematangan ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->rasa ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->aroma ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->tekstur ?? '');
            $currentRow++;
            $sheet->setCellValue(chr(64 + $startingCol) . $currentRow, $data->warna ?? '');
            $currentRow++;

            // Move to the next column for the next item
            $startingCol++;
        }

        // After processing all data, concatenate unique shift values and set them in the sheet
        $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
        $sheet->setCellValue('E7', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

        // Concatenate all catatan values and set them in the sheet
        $sheet->setCellValue('B66', implode(', ', $catatanArray)); // Set concatenated catatan in B22
    }

    // Set the writer to Xls and output the file
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');

    // Set headers to trigger download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="pem_masak_rice_cooker_Multiple_Report.xls"');
    header('Cache-Control: max-age=0');

    // Write the file to the output
    $writer->save('php://output');
}



}
?>