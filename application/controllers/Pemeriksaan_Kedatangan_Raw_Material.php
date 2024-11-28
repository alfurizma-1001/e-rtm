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
class Pemeriksaan_Kedatangan_Raw_Material extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_kedatangan_raw_material_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pemeriksaan_kedatangan_raw_material' => $this->pemeriksaan_kedatangan_raw_material_model->get_all(),
            'active_nav' => 'pemeriksaan_kedatangan_raw_material',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_kedatangan_raw_material');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pemeriksaan_kedatangan_raw_material_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pemeriksaan_kedatangan_raw_material berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pemeriksaan_kedatangan_raw_material");
            }

            // Redirect after handling the form submission
            redirect('pemeriksaan_kedatangan_raw_material');
        }

        // Prepare data to load the form view
        $data = array(
            'pemeriksaan_kedatangan_raw_material' => $this->pemeriksaan_kedatangan_raw_material_model->get_all(),
            'active_nav' => 'pemeriksaan_kedatangan_raw_material',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_kedatangan_raw_material-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pemeriksaan_kedatangan_raw_material'] = $this->pemeriksaan_kedatangan_raw_material_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_kedatangan_raw_material-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'jenis_raw_material' => $this->input->post('jenis_raw_material'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'pemasok' => $this->input->post('pemasok'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'exp_date' => $this->input->post('exp_date'),
            'jumlah_barang_datang' => $this->input->post('jumlah_barang_datang'),
            'sampel' => $this->input->post('sampel'),
            'sesuai' => $this->input->post('sesuai'),
            'tidak_sesuai' => $this->input->post('tidak_sesuai'),
            'kemasan' => $this->input->post('kemasan'),
            'warna' => $this->input->post('warna'),
            'kotoran' => $this->input->post('kotoran'),
            'aroma' => $this->input->post('aroma'),
            'suhu' => $this->input->post('suhu'),
            'ada' => $this->input->post('ada'),
            'tdk_ada' => $this->input->post('tdk_ada'),
            'negara_asal' => $this->input->post('negara_asal'),
            'ok' => $this->input->post('ok'),
            'tolak' => $this->input->post('tolak'),
            'berlaku' => $this->input->post('berlaku'),
            'tidak_berlaku' => $this->input->post('tidak_berlaku'),
            'coa' => $this->input->post('coa'),
            'A' => $this->input->post('A'),
            'NA' => $this->input->post('NA'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->pemeriksaan_kedatangan_raw_material_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_kedatangan_raw_material berhasil diupdate');
            redirect('pemeriksaan_kedatangan_raw_material');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pemeriksaan_kedatangan_raw_material');
            redirect('pemeriksaan_kedatangan_raw_material/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pemeriksaan_kedatangan_raw_material_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_kedatangan_raw_material berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pemeriksaan_kedatangan_raw_material');
        }
        redirect('pemeriksaan_kedatangan_raw_material');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 17 Pemeriksaan Kedatangan Raw Material.xlsx'; // Path to your template

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
        $startingRow = 10;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->pemeriksaan_kedatangan_raw_material_model->get_by_uuid($uuid);
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
                    $sheet->setCellValue('D5', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }
                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->jenis_raw_material ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->spesifikasi ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->pemasok ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->exp_date ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->jumlah_barang_datang ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->sampel ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->sesuai ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->tidak_sesuai ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->kemasan ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->warna ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->kotoran ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->aroma ?? '');
                $sheet->setCellValue('O' . $startingRow, $data->suhu ?? '');
                $sheet->setCellValue('P' . $startingRow, $data->ada ?? '');
                $sheet->setCellValue('Q' . $startingRow, $data->tdk_ada ?? '');
                $sheet->setCellValue('R' . $startingRow, $data->negara_asal ?? '');
                $sheet->setCellValue('S' . $startingRow, $data->ok ?? '');
                $sheet->setCellValue('T' . $startingRow, $data->tolak ?? '');
                $sheet->setCellValue('U' . $startingRow, $data->berlaku ?? '');
                $sheet->setCellValue('V' . $startingRow, $data->tidak_berlaku ?? '');
                $sheet->setCellValue('W' . $startingRow, $data->coa ?? '');
                $sheet->setCellValue('X' . $startingRow, $data->A ?? '');
                $sheet->setCellValue('Y' . $startingRow, $data->NA ?? '');
                $sheet->setCellValue('Z' . $startingRow, $data->keterangan ?? '');

                // Move to the next row for the main data
                $startingRow++;
            }


            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('C41', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pemeriksaan_kedatangan_raw_material_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>