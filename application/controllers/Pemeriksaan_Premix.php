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
class Pemeriksaan_Premix extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemeriksaan_premix_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pemeriksaan_premix' => $this->pemeriksaan_premix_model->get_all(),
            'active_nav' => 'pemeriksaan_premix',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_premix');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pemeriksaan_premix_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pemeriksaan_premix berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pemeriksaan_premix");
            }

            // Redirect after handling the form submission
            redirect('pemeriksaan_premix');
        }

        // Prepare data to load the form view
        $data = array(
            'pemeriksaan_premix' => $this->pemeriksaan_premix_model->get_all(),
            'active_nav' => 'pemeriksaan_premix',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_premix-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pemeriksaan_premix'] = $this->pemeriksaan_premix_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/pemeriksaan_premix-edit', $data);
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
            'pemasok' => $this->input->post('pemasok'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'exp_date' => $this->input->post('exp_date'),
            'jumlah_barang_datang' => $this->input->post('jumlah_barang_datang'),
            'jumlah_sample_cek' => $this->input->post('jumlah_sample_cek'),
            'sesuai' => $this->input->post('sesuai'),
            'tidak_sesuai' => $this->input->post('tidak_sesuai'),
            'berat_premix' => $this->input->post('berat_premix'),
            'kemasan' => $this->input->post('kemasan'),
            'warna' => $this->input->post('warna'),
            'jamur' => $this->input->post('jamur'),
            'aroma' => $this->input->post('aroma'),
            'ok' => $this->input->post('ok'),
            'tolak' => $this->input->post('tolak'),
            'catatan' => $this->input->post('catatan'),
            'keterangan' => $this->input->post('keterangan')
        );

        $update = $this->pemeriksaan_premix_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_premix berhasil diupdate');
            redirect('pemeriksaan_premix');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pemeriksaan_premix');
            redirect('pemeriksaan_premix/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pemeriksaan_premix_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pemeriksaan_premix berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pemeriksaan_premix');
        }
        redirect('pemeriksaan_premix');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 34 Pemeriksaan Kedatangan Premix.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $dateSet = false;
        $noMobilSet = false;
        $namaSupirSet = false;
        $shiftArray = []; // To store unique shifts
        $catatanArray = []; // To store concatenated catatan

        // Starting row for the main data (A11 onwards)
        $startingRow = 11;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->pemeriksaan_premix_model->get_by_uuid($uuid);
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
                if (!$noMobilSet || !empty($data->no_mobil)) {
                    $sheet->setCellValue('K6' , $data->no_mobil ?? '');
                    $noMobilSet = true; // Mark no_mobil as set
                }

                if (!$namaSupirSet || !empty($data->nama_supir)) {
                    $sheet->setCellValue('K7' , $data->nama_supir ?? '');
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
                $sheet->setCellValue('C' . $startingRow, $data->pemasok ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->exp_date ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->jumlah_barang_datang ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->jumlah_sample_cek ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->sesuai ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->tidak_Sesuai ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->berat_premix ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->kemasan ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->warna ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->jamur ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->aroma ?? '');
                $sheet->setCellValue('O' . $startingRow, $data->ok ?? '');
                $sheet->setCellValue('P' . $startingRow, $data->tolak ?? '');
                $sheet->setCellValue('Q' . $startingRow, $data->keterangan ?? '');




                // Move to the next row for the main data
                $startingRow++;
            }

            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('C7', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('G29', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pemeriksaan_premix_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>