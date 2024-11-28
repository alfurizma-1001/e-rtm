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
class pemeriksaan_retur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_retur_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pemeriksaan_retur' => $this->pemeriksaan_retur_model->get_all(),
            'active_nav' => 'pemeriksaan_retur',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_retur');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pemeriksaan_retur_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pemeriksaan_retur berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pemeriksaan_retur");
            }

            // Redirect after handling the form submission
            redirect('pemeriksaan_retur');
        }

        // Prepare data to load the form view
        $data = array(
            'pemeriksaan_retur' => $this->pemeriksaan_retur_model->get_all(),
            'active_nav' => 'pemeriksaan_retur',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_retur-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pemeriksaan_retur'] = $this->pemeriksaan_retur_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_retur-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'no_mobil' => $this->input->post('no_mobil'),
            'nama_supir' => $this->input->post('nama_supir'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'exp_date' => $this->input->post('exp_date'),
            'jumlah' => $this->input->post('jumlah'),
            'bocor' => $this->input->post('bocor'),
            'isi_kurang' => $this->input->post('isi_kurang'),
            'lain' => $this->input->post('lain'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),
        );

        $update = $this->pemeriksaan_retur_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_retur berhasil diupdate');
            redirect('pemeriksaan_retur');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pemeriksaan_retur');
            redirect('pemeriksaan_retur/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pemeriksaan_retur_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_retur berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pemeriksaan_retur');
        }
        redirect('pemeriksaan_retur');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 23 Pemeriksaan Produk Retur.xlsx'; // Path to your template

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
                $data = $this->pemeriksaan_retur_model->get_by_uuid($uuid);
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
                $noMobilSet = false;
                if (!$noMobilSet || !empty($data->no_mobil)) {
                    $sheet->setCellValue('F6' , $data->no_mobil ?? '');
                    $noMobilSet = true; // Mark no_mobil as set
                }

                $namaSupirSet = false;
                if (!$namaSupirSet || !empty($data->nama_supir)) {
                    $sheet->setCellValue('F7' , $data->nama_supir ?? '');
                    $namaSupirSet = true; // Mark nama_supir as set
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
                $sheet->setCellValue('C' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->exp_date ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->jumlah ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->bocor ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->isi_kurang ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->lain ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->keterangan ?? '');




                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('B7', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B31', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pemeriksaan_retur_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>