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
class Pemeriksaan_Incoming extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_incoming_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pemeriksaan_incoming' => $this->pemeriksaan_incoming_model->get_all(),
            'active_nav' => 'pemeriksaan_incoming',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_incoming');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pemeriksaan_incoming_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pemeriksaan_incoming berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pemeriksaan_incoming");
            }

            // Redirect after handling the form submission
            redirect('pemeriksaan_incoming');
        }

        // Prepare data to load the form view
        $data = array(
            'pemeriksaan_incoming' => $this->pemeriksaan_incoming_model->get_all(),
            'active_nav' => 'pemeriksaan_incoming',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_incoming-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pemeriksaan_incoming'] = $this->pemeriksaan_incoming_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_incoming-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'nama_supllier' => $this->input->post('nama_supllier'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jenis_mobil' => $this->input->post('jenis_mobil'),
            'no_polisi' => $this->input->post('no_polisi'),
            'identitas_pengantar' => $this->input->post('identitas_pengantar'),
            'segel' => $this->input->post('segel'),
            'kebersihaan' => $this->input->post('kebersihaan'),
            'tertutup' => $this->input->post('tertutup'),
            'hama' => $this->input->post('hama'),
            'jam_datang' => $this->input->post('jam_datang'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->pemeriksaan_incoming_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_incoming berhasil diupdate');
            redirect('pemeriksaan_incoming');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pemeriksaan_incoming');
            redirect('pemeriksaan_incoming/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pemeriksaan_incoming_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_incoming berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pemeriksaan_incoming');
        }
        redirect('pemeriksaan_incoming');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 36 Pemeriksaan Kendaraan Incoming.xlsx'; // Path to your template

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
                $data = $this->pemeriksaan_incoming_model->get_by_uuid($uuid);
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



                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
           
                $sheet->setCellValue('B' . $startingRow, $data->nama_supllier ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->nama_barang ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->jenis_mobil ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->no_polisi ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->identitas_pengantar ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->segel ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->kebersihaan ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->tertutup ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->hama ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->jam_datang ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->keterangan ?? '');
        

                // Move to the next row for the main data
                $startingRow++;
            }


            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('C42', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pemeriksaan_incoming_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>