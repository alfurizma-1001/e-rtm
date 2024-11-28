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
class Monitoring_Repack extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('monitoring_repack_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'monitoring_repack' => $this->monitoring_repack_model->get_all(),
            'active_nav' => 'monitoring_repack',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/monitoring_repack');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->monitoring_repack_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data monitoring_repack berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data monitoring_repack");
            }

            // Redirect after handling the form submission
            redirect('monitoring_repack');
        }

        // Prepare data to load the form view
        $data = array(
            'monitoring_repack' => $this->monitoring_repack_model->get_all(),
            'active_nav' => 'monitoring_repack',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/monitoring_repack-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['monitoring_repack'] = $this->monitoring_repack_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/monitoring_repack-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'produk' => $this->input->post('produk'),
            'karton' => $this->input->post('karton'),
            'jumlah' => $this->input->post('jumlah'),
            'exp_date' => $this->input->post('exp_date'),
            'kodefikasi' => $this->input->post('kodefikasi'),
            'content' => $this->input->post('content'),
            'kerapihan' => $this->input->post('kerapihan'),
            'lain_lain' => $this->input->post('lain_lain'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->monitoring_repack_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data monitoring_repack berhasil diupdate');
            redirect('monitoring_repack');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data monitoring_repack');
            redirect('monitoring_repack/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->monitoring_repack_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data monitoring_repack berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data monitoring_repack');
        }
        redirect('monitoring_repack');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 22 Monitoring Repack QC.xlsx'; // Path to your template

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
                $data = $this->monitoring_repack_model->get_by_uuid($uuid);
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
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->nama_produk ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->produk ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->karton ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->jumlah ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->exp_date ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->kodefikasi ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->content ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->kerapihan ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->lain_lain ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->keterangan ?? '');
           

                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('B7', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B30', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Monitoring_Repack_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }


}
?>