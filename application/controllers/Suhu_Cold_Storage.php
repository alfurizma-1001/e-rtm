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
class Suhu_Cold_Storage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('suhu_cold_storage_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'suhu_cold_storage' => $this->suhu_cold_storage_model->get_all(),
            'active_nav' => 'suhu_cold_storage',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/suhu_cold_storage');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->suhu_cold_storage_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data suhu_cold_storage berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data suhu_cold_storage");
            }

            // Redirect after handling the form submission
            redirect('suhu_cold_storage');
        }

        // Prepare data to load the form view
        $data = array(
            'suhu_cold_storage' => $this->suhu_cold_storage_model->get_all(),
            'active_nav' => 'suhu_cold_storage',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/suhu_cold_storage-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['suhu_cold_storage'] = $this->suhu_cold_storage_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/suhu_cold_storage-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'pukul' => $this->input->post('pukul'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'suhu_cs' => $this->input->post('suhu_cs'),
            'suhu_dics1' => $this->input->post('suhu_dics1'),
            'suhu_dics2' => $this->input->post('suhu_dics2'),
            'suhu_dics3' => $this->input->post('suhu_dics3'),
            'suhu_dics4' => $this->input->post('suhu_dics4'),
            'suhu_dics5' => $this->input->post('suhu_dics5'),
            'rata' => $this->input->post('rata'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->suhu_cold_storage_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data suhu_cold_storage berhasil diupdate');
            redirect('suhu_cold_storage');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data suhu_cold_storage');
            redirect('suhu_cold_storage/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->suhu_cold_storage_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data suhu_cold_storage berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data suhu_cold_storage');
        }
        redirect('suhu_cold_storage');
    }


    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 33 Pemantauan Suhu Produk Di CS.xls'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date has already been set
        $dateSet = false;
        $shiftArray = []; // Array to hold unique shift values
        $catatanString = ''; // Initialize catatan string to hold concatenated values

        // Array to store the data for sorting later
        $allData = [];

        // Define a mapping for 'pukul' values to rows (adjust row numbers as needed)
        $pukulRowMapping = [
            '24:00' => 13,
            '02:00' => 15,
            '04:00' => 17,
            '06:00' => 19,
            '08:00' => 21,
            '10:00' => 23,
            '12:00' => 25,
            '14:00' => 27,
            '16:00' => 29,
            '18:00' => 31,
            '20:00' => 33,
            '22:00' => 35

            // Add more mappings if needed for other times
        ];

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            // Loop through each selected UUID and collect data
            foreach ($selected_uuids as $uuid) {
                $data = $this->suhu_cold_storage_model->get_by_uuid($uuid);
                if (!empty($data)) {
                    $allData[] = $data; // Collect the data in an array
                }
            }

            // Sort the collected data by 'created_at'
            usort($allData, function ($a, $b) {
                return strtotime($a->created_at) - strtotime($b->created_at);
            });

            // Now loop through the sorted data and process it
            foreach ($allData as $data) {
                // Set date once, or replace if new data is provided
                if (!$dateSet || !empty($data->date)) {
                    $sheet->setCellValue('D8', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }



                // Get the row number for the current 'pukul'
                $startingRow = $pukulRowMapping[$data->pukul] ?? null; // Use the mapping array

                if ($startingRow !== null) {
                    // Fill the sheet with the main data starting at the mapped row for the current 'pukul'

                    $sheet->setCellValue('B' . $startingRow, $data->pukul ?? '');
                    $sheet->setCellValue('C' . $startingRow, $data->shift ?? '');
                    $sheet->setCellValue('D' . $startingRow, $data->nama_produk ?? '');
                    $sheet->setCellValue('E' . $startingRow, $data->suhu_cs ?? '');
                    $sheet->setCellValue('F' . $startingRow, $data->suhu_dics1 ?? '');
                    $sheet->setCellValue('G' . $startingRow, $data->suhu_dics2 ?? '');
                    $sheet->setCellValue('H' . $startingRow, $data->suhu_dics3 ?? '');
                    $sheet->setCellValue('I' . $startingRow, $data->suhu_dics4 ?? '');
                    $sheet->setCellValue('J' . $startingRow, $data->suhu_dics5 ?? '');
                    $sheet->setCellValue('K' . $startingRow, $data->rata ?? '');
                    $sheet->setCellValue('L' . $startingRow, $data->keterangan ?? '');


                    // Concatenate all catatan values into one string with a comma
                    if (!empty($data->catatan)) {
                        if (!empty($catatanString)) {
                            $catatanString .= ', '; // Add comma if catatanString already has content
                        }
                        $catatanString .= $data->catatan; // Append the catatan value
                    }
                }
            }

            // After the loop, set the final unique shift values and concatenated catatan strings in the cells

            $sheet->setCellValue('C41', $catatanString); // For concatenated catatan in cell B23
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="suhu_cold_storage_Multiple_Report.xls"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }


}
?>