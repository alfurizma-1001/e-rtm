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
class Pem_Xray extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_xray_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_xray' => $this->pem_xray_model->get_all(),
            'active_nav' => 'pem_xray',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/pem_xray');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pem_xray_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pem_xray berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pem_xray");
            }

            // Redirect after handling the form submission
            redirect('pem_xray');
        }

        // Prepare data to load the form view
        $data = array(
            'pem_xray' => $this->pem_xray_model->get_all(),
            'active_nav' => 'pem_xray',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/pem_xray-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pem_xray'] = $this->pem_xray_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/pem_xray-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'pukul' => $this->input->post('pukul'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'no_program' => $this->input->post('no_program'),
            'glass_ball_1' => $this->input->post('glass_ball_1'),
            'glass_ball_2' => $this->input->post('glass_ball_2'),
            'ceramic_1' => $this->input->post('ceramic_1'),
            'ceramic_2' => $this->input->post('ceramic_2'),
            'sus_wire_1' => $this->input->post('sus_wire_1'),
            'sus_wire_2' => $this->input->post('sus_wire_2'),
            'sus_ball_1' => $this->input->post('sus_ball_1'),
            'sus_ball_2' => $this->input->post('sus_ball_2'),
            'keterangan' => $this->input->post('keterangan'),
            'tindakan' => $this->input->post('tindakan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->pem_xray_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pem_xray berhasil diupdate');
            redirect('pem_xray');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pem_xray');
            redirect('pem_xray/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pem_xray_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_xray berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_xray');
        }
        redirect('pem_xray');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 14 Pemeriksaan X-Ray.xls'; // Path to your template

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
                $data = $this->pem_xray_model->get_by_uuid($uuid);
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
                $sheet->setCellValue('A' . $startingRow, $data->pukul ?? '');
                $sheet->setCellValue('B' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->no_program ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->glass_ball_1 ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->glass_ball_2 ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->ceramic_1 ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->ceramic_2 ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->sus_wire_1 ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->sus_wire_2 ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->sus_ball_1 ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->sus_ball_2 ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->keterangan ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->tindakan ?? '');

                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('D6', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B49', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pem_xray_Multiple_Report.xls"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>