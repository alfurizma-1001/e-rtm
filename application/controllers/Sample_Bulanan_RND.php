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
class sample_bulanan_rnd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sample_bulanan_rnd_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'sample_bulanan_rnd' => $this->sample_bulanan_rnd_model->get_all(),
            'active_nav' => 'sample_bulanan_rnd',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/sample_bulanan_rnd');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->sample_bulanan_rnd_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data sample_bulanan_rnd berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data sample_bulanan_rnd");
            }

            // Redirect after handling the form submission
            redirect('sample_bulanan_rnd');
        }

        // Prepare data to load the form view
        $data = array(
            'sample_bulanan_rnd' => $this->sample_bulanan_rnd_model->get_all(),
            'active_nav' => 'sample_bulanan_rnd',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/sample_bulanan_rnd-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['sample_bulanan_rnd'] = $this->sample_bulanan_rnd_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/sample_bulanan_rnd-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'plant' => $this->input->post('plant'),
            'sample_bulan' => $this->input->post('sample_bulan'),
            'date' => $this->input->post('date'),
            'sample_storage_frozen' => $this->input->post('sample_storage_frozen'),
            'sample_storage_chilled' => $this->input->post('sample_storage_chilled'),
            'sample_storage_other' => $this->input->post('sample_storage_other'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'best_before' => $this->input->post('best_before'),
            'quantity' => $this->input->post('quantity'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->sample_bulanan_rnd_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data sample_bulanan_rnd berhasil diupdate');
            redirect('sample_bulanan_rnd');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data sample_bulanan_rnd');
            redirect('sample_bulanan_rnd/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->sample_bulanan_rnd_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data sample_bulanan_rnd berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data sample_bulanan_rnd');
        }
        redirect('sample_bulanan_rnd');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 25 Sample Bulanan RND.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $dateSet = false;
        $plantSet = false;
        $sample_bulanSet = false;
        $sample_storage_frozenSet = false;
        $sample_storage_chilledSet = false;
        $sample_storage_otherSet = false;
        
        $catatanArray = []; // To store concatenated catatan

        // Starting row for the main data (A11 onwards)
        $startingRow = 13;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->sample_bulanan_rnd_model->get_by_uuid($uuid);
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
                if (!$plantSet || !empty($data->plant)) {
                    $sheet->setCellValue('D5', $data->plant ?? '');
                    $plantSet = true; // Mark date as set
                }
                if (!$sample_bulanSet || !empty($data->sample_bulan)) {
                    $sheet->setCellValue('D6', $data->sample_bulan ?? '');
                    $sample_bulanSet = true; // Mark date as set
                }
                if (!$dateSet || !empty($data->date)) {
                    $sheet->setCellValue('D7', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }
                if (!$sample_storage_frozenSet || !empty($data->sample_storage_frozen)) {
                    $sheet->setCellValue('C9', $data->sample_storage_frozen ?? '');
                    $sample_storage_frozenSet = true; // Mark date as set
                }
                if (!$sample_storage_chilledSet || !empty($data->sample_storage_chilled)) {
                    $sheet->setCellValue('E9', $data->sample_storage_chilled ?? '');
                    $sample_storage_chilledSet = true; // Mark date as set
                }
                if (!$sample_storage_otherSet || !empty($data->sample_storage_other)) {
                    $sheet->setCellValue('H9', $data->sample_storage_other ?? '');
                    $sample_storage_otherSet = true; // Mark date as set
                }

            
                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
              
                $sheet->setCellValue('B' . $startingRow, $data->nama_produk ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->best_before ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->quantity ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->keterangan ?? '');
               


                // Move to the next row for the main data
                $startingRow++;
            }

         
            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B50', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="sample_bulanan_rnd_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }


}
?>