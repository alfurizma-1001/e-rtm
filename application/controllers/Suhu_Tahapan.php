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
class Suhu_Tahapan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('suhu_tahapan_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'suhu_tahapan' => $this->suhu_tahapan_model->get_all(),
            'active_nav' => 'suhu_tahapan',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/suhu_tahapan');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->suhu_tahapan_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data suhu_tahapan berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data suhu_tahapan");
            }

            // Redirect after handling the form submission
            redirect('suhu_tahapan');
        }

        // Prepare data to load the form view
        $data = array(
            'suhu_tahapan' => $this->suhu_tahapan_model->get_all(),
            'active_nav' => 'suhu_tahapan',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/suhu_tahapan-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['suhu_tahapan'] = $this->suhu_tahapan_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/suhu_tahapan-edit', $data);
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
            'filling_portioning' => $this->input->post('filling_portioning'),
            'iqf' => $this->input->post('iqf'),
            'top_sealer' => $this->input->post('top_sealer'),
            'x_ray' => $this->input->post('x_ray'),
            'sticker' => $this->input->post('sticker'),
            'shrink' => $this->input->post('shrink'),
            'packing_box' => $this->input->post('packing_box'),
            'cold_storage' => $this->input->post('cold_storage'),
            'filling' => $this->input->post('filling'),
            'masuk_iqf' => $this->input->post('masuk_iqf'),
            'keluar_aktual' => $this->input->post('keluar_aktual'),
            'suhu_top_sealer' => $this->input->post('suhu_top_sealer'),
            'suhu_x_ray' => $this->input->post('suhu_x_ray'),
            'suhu_sticker' => $this->input->post('suhu_sticker'),
            'suhu_shrink' => $this->input->post('suhu_shrink'),
            'down_time' => $this->input->post('down_time'),
            'cold_aktual' => $this->input->post('cold_aktual'),
            'catatan_kanan' => $this->input->post('catatan_kanan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->suhu_tahapan_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data suhu_tahapan berhasil diupdate');
            redirect('suhu_tahapan');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data suhu_tahapan');
            redirect('suhu_tahapan/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->suhu_tahapan_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data suhu_tahapan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data suhu_tahapan');
        }
        redirect('suhu_tahapan');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 16 Pengecekan Suhu Produk Setiap Tahapan Proses.xlsx'; // Path to your template

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
        $startingRow = 12;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->suhu_tahapan_model->get_by_uuid($uuid);
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

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->nama_produk ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('R' . $startingRow, $data->filling_portioning ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->iqf ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->top_sealer ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->x_ray ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->sticker ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->shrink ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->packing_box ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->cold_storage ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->filling ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->masuk_iqf ?? '');
                $sheet->setCellValue('P' . $startingRow, $data->keluar_aktual ?? '');
                $sheet->setCellValue('Q' . $startingRow, $data->suhu_top_sealer ?? '');
                $sheet->setCellValue('R' . $startingRow, $data->suhu_x_ray ?? '');
                $sheet->setCellValue('S' . $startingRow, $data->suhu_sticker ?? '');
                $sheet->setCellValue('T' . $startingRow, $data->suhu_shrink ?? '');
                $sheet->setCellValue('U' . $startingRow, $data->down_time ?? '');
                $sheet->setCellValue('W' . $startingRow, $data->cold_aktual ?? '');
                $sheet->setCellValue('X' . $startingRow, $data->catatan_kanan ?? '');


                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('C7', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('C28', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="suhu_tahapan_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>