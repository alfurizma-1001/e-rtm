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
class Verif_Pengemasan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('verif_pengemasan_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'verif_pengemasan' => $this->verif_pengemasan_model->get_all(),
            'active_nav' => 'verif_pengemasan',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/verif_pengemasan');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->verif_pengemasan_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data verif_pengemasan berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data verif_pengemasan");
            }

            // Redirect after handling the form submission
            redirect('verif_pengemasan');
        }

        // Prepare data to load the form view
        $data = array(
            'verif_pengemasan' => $this->verif_pengemasan_model->get_all(),
            'active_nav' => 'verif_pengemasan',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/verif_pengemasan-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['verif_pengemasan'] = $this->verif_pengemasan_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/verif_pengemasan-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'jam' => $this->input->post('jam'),
            'tnama_produk' => $this->input->post('tnama_produk'),
            'tprod_code' => $this->input->post('tprod_code'),
            'tbb' => $this->input->post('tbb'),
            'tqr_code' => $this->input->post('tqr_code'),
            'tok_tdk' => $this->input->post('tok_tdk'),
            'bnama_produk' => $this->input->post('bnama_produk'),
            'bprod_code' => $this->input->post('bprod_code'),
            'bbb' => $this->input->post('bbb'),
            'bisi' => $this->input->post('bisi'),
            'bok_tdk' => $this->input->post('bok_tdk'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->verif_pengemasan_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data verif_pengemasan berhasil diupdate');
            redirect('verif_pengemasan');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data verif_pengemasan');
            redirect('verif_pengemasan/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->verif_pengemasan_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data verif_pengemasan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data verif_pengemasan');
        }
        redirect('verif_pengemasan');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 12 Verifikasi Pengemasan.xlsx'; // Path to your template

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

        // Starting row for the main data (A11 onwards)
        $startingRow = 11;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->verif_pengemasan_model->get_by_uuid($uuid);
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
                    $sheet->setCellValue('B6', $data->date ?? '');
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

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $data->jam ?? '');

                $sheet->setCellValue('B' . $startingRow, $data->tnama_produk ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->tprod_code ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->tbb ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->tqr_code ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->tok_tdk ?? '');

                $sheet->setCellValue('G' . $startingRow, $data->bnama_produk ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->bprod_code ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->bbb ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->bisi ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->bok_tdk ?? '');

                $sheet->setCellValue('L' . $startingRow, $data->keterangan ?? '');

                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('E6', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B40', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="verif_pengemasan_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>