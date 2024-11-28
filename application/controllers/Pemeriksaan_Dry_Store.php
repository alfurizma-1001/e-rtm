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
class pemeriksaan_dry_store extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_dry_store_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pemeriksaan_dry_store' => $this->pemeriksaan_dry_store_model->get_all(),
            'active_nav' => 'pemeriksaan_dry_store',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_dry_store');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pemeriksaan_dry_store_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pemeriksaan_dry_store berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pemeriksaan_dry_store");
            }

            // Redirect after handling the form submission
            redirect('pemeriksaan_dry_store');
        }

        // Prepare data to load the form view
        $data = array(
            'pemeriksaan_dry_store' => $this->pemeriksaan_dry_store_model->get_all(),
            'active_nav' => 'pemeriksaan_dry_store',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_dry_store-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pemeriksaan_dry_store'] = $this->pemeriksaan_dry_store_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_dry_store-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama_barang' => $this->input->post('nama_barang'),
            'mobil' => $this->input->post('mobil'),
            'no_polisi' => $this->input->post('no_polisi'),
            'identitas_pengantar' => $this->input->post('identitas_pengantar'),
            'segel' => $this->input->post('segel'),
            'kebersihaan' => $this->input->post('kebersihaan'),
            'hama' => $this->input->post('hama'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_keluar' => $this->input->post('jam_keluar'),
            'mulai_dicek' => $this->input->post('mulai_dicek'),
            'selesai_dicek' => $this->input->post('selesai_dicek'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->pemeriksaan_dry_store_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_dry_store berhasil diupdate');
            redirect('pemeriksaan_dry_store');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pemeriksaan_dry_store');
            redirect('pemeriksaan_dry_store/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pemeriksaan_dry_store_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_dry_store berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pemeriksaan_dry_store');
        }
        redirect('pemeriksaan_dry_store');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 35 Pemeriksaan Pengiriman Dry Store.xlsx'; // Path to your template

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
        $startingRow = 9;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->pemeriksaan_dry_store_model->get_by_uuid($uuid);
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
                    $sheet->setCellValue('C5', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }



                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->nama_supplier ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->nama_barang ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->mobil ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->no_polisi ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->identitas_pengantar ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->segel ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->kebersihaan ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->hama ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->jam_masuk ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->jam_keluar ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->mulai_dicek ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->selesai_dicek ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->keterangan ?? '');
              



                // Move to the next row for the main data
                $startingRow++;
            }


            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('C36', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pemeriksaan_dry_store_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>