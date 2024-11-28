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
class Monitoring_False extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('monitoring_false_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'monitoring_false' => $this->monitoring_false_model->get_all(),
            'active_nav' => 'monitoring_false',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/monitoring_false');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->monitoring_false_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data monitoring_false berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data monitoring_false");
            }

            // Redirect after handling the form submission
            redirect('monitoring_false');
        }

        // Prepare data to load the form view
        $data = array(
            'monitoring_false' => $this->monitoring_false_model->get_all(),
            'active_nav' => 'monitoring_false',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/monitoring_false-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['monitoring_false'] = $this->monitoring_false_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/monitoring_false-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'mesin' => $this->input->post('mesin'),
            'date' => $this->input->post('date'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'jumlah_pack_tdklolos' => $this->input->post('jumlah_pack_tdklolos'),
            'jumlah_pack_kontaminan' => $this->input->post('jumlah_pack_kontaminan'),
            'jenis_kontaminan' => $this->input->post('jenis_kontaminan'),
            'posisi_kontaminan' => $this->input->post('posisi_kontaminan'),
            'false_rejections' => $this->input->post('false_rejections'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->monitoring_false_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data monitoring_false berhasil diupdate');
            redirect('monitoring_false');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data monitoring_false');
            redirect('monitoring_false/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->monitoring_false_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data monitoring_false berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data monitoring_false');
        }
        redirect('monitoring_false');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 19 monitoring false rejections.xlsx'; // Path to your template

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
                $data = $this->monitoring_false_model->get_by_uuid($uuid);
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
                if (!$dateSet || !empty($data->mesin)) {
                    $sheet->setCellValue('B7', $data->mesin ?? '');
                    $dateSet = true; // Mark date as set
                }

                

                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data starting at the current row
             
                $sheet->setCellValue('A' . $startingRow, $data->date ?? '');
                $sheet->setCellValue('B' . $startingRow, $data->nama_produk ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->jumlah_pack_tdklolos ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->jumlah_pack_kontaminan ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->jenis_kontaminan ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->posisi_kontaminan ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->false_rejections ?? '');
               

                // Move to the next row for the main data
                $startingRow++;
            }

          
            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B30', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="monitoring_false_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>