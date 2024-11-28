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
class Pem_Thawing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_thawing_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_thawing' => $this->pem_thawing_model->get_all(),
            'active_nav' => 'pem_thawing',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_thawing');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $rules = $this->pem_thawing_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $insert = $this->pem_thawing_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Pemeriksaan Pemasakan Dengan thawing berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Pemeriksaan Pemasakan Dengan thawing");
            }
            redirect('pem_thawing');
        }

        $data = array(
            'pem_thawing' => $this->pem_thawing_model->get_all(),
            'active_nav' => 'pem_thawing',
        );
        // var_dump($data);
        // exit();

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_thawing-tambah', $data);
        $this->load->view('partials/footer');
    }
    public function edit($uuid)
    {
        $data['pem_thawing'] = $this->pem_thawing_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_thawing-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Form validation rules
        $rules = $this->pem_thawing_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('cooking/pem_thawing-edit');
            $this->load->view('partials/footer');
        } else {
            $uuid = $this->input->post('uuid');

            $data = array(
                'date' => $this->input->post('date'),
                'shift' => $this->input->post('shift'),
                'kondisi_ruangan' => $this->input->post('kondisi_ruangan'),
                'jenis_produk' => $this->input->post('jenis_produk'),
                'jumlah' => $this->input->post('jumlah'),
                'kode_produksi' => $this->input->post('kode_produksi'),
                'sebelum_kondisi_produk' => $this->input->post('sebelum_kondisi_produk'),
                'sebelum_kondisi_produk_ket' => $this->input->post('sebelum_kondisi_produk_ket'),
                'suhu_ruangan' => $this->input->post('suhu_ruangan'),
                'mulai_thawing_pukul' => $this->input->post('mulai_thawing_pukul'),
                'selesai_thawing_pukul' => $this->input->post('selesai_thawing_pukul'),
                'setelah_kondisi_produk' => $this->input->post('setelah_kondisi_produk'),
                'setelah_kondisi_produk_ket' => $this->input->post('setelah_kondisi_produk_ket'),
                'setelah_kondisi_produk_jumlah' => $this->input->post('setelah_kondisi_produk_jumlah'),
                'suhu_produk' => $this->input->post('suhu_produk'),
                'catatan' => $this->input->post('catatan')
            );

            $update = $this->pem_thawing_model->update($uuid, $data);
            if ($update) {
                $this->session->set_flashdata('success_msg', 'Data sortasi cooking berhasil diupdate');
                redirect('pem_thawing');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal mengupdate data sortasi cooking');
                redirect('pem_thawing/edit/' . $uuid);
            }
        }
    }

    public function hapus($uuid)
    {
        $delete = $this->pem_thawing_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_thawing berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_thawing');
        }
        redirect('pem_thawing');
    }

    public function print_pdf()
    {
        $tanggal = $this->input->post('tanggal');
        require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

        $pem_thawing = $this->pem_thawing_model->get_by_date($tanggal);

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Alfurizma Ramadhani');
        $pdf->SetTitle('Pemeriksaan Pemaskan Dengan Streamer');
        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 10);
        // $logo = base_url('assets\img\cpi-logo.png');
        // $pdf->Image($logo, 15, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->SetFont('helvetica', '', 5);
        $pdf->Cell(0, 10, 'PT CHAROEN POKPHAND INDONESIA - FOOD DIVISION', 0, 1, 'L');
        ;

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'PEMERIKSAAN PEMASAKAN DENGAN thawing', 0, 1, 'C');
        $pdf->Ln();
        $pdf->SetFont('helvetica', 11);
        $pdf->Cell(0, 10, 'Tanggal: ' . $tanggal, 0, 1, 'L');
        if (!empty($pem_thawing)) {
            $pdf->Cell(0, 10, 'Shift: ' . $pem_thawing[0]->shift, 0, 1, 'L');
        }

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont('helvetica', 'B');
        $pdf->Cell(10, 20, 'NO', 1, 0, 'C', 1);
        $pdf->Cell(60, 20, 'NAMA PREMIX', 1, 0, 'C', 1);
        $pdf->Cell(50, 20, 'KODE PRODUKSI', 1, 0, 'C', 1);
        $pdf->Cell(50, 20, 'SENSORI', 1, 0, 'C', 1);
        $pdf->Cell(60, 20, 'TINDAKAN KOREKSI', 1, 1, 'C', 1);

        $pdf->SetFont('helvetica', '');
        $row = 1;
        foreach ($pem_thawing as $row_data) {
            $pdf->Cell(10, 10, $row++, 1, 0, 'C');
            $pdf->Cell(60, 10, $row_data->nama_premix, 1, 0, 'C');
            $pdf->Cell(50, 10, $row_data->kode_produksi, 1, 0, 'C');
            $pdf->Cell(50, 10, $row_data->sensori, 1, 0, 'C');
            $pdf->Cell(60, 10, $row_data->tindakan_koreksi, 1, 1, 'C');
        }

        $pdf->Cell(0, 10, 'Keterangan:', 0, 1, 'L');
        $pdf->Cell(0, 2, '- Sensori : Tidak ada yang mengumpal, warna dan aroma normal', 0, 1, 'L');
        $pdf->Cell(0, 2, '- Tindakan koreksi diisi jika sensori tidak sesuai atau terdapat kontaminasi benda asing', 0, 1, 'L');
        $pdf->Ln();

        $pdf->Cell(55, 10, 'Diperiksa oleh', 0, 0, 'R');
        $pdf->Cell(55, 10, 'Diketahui oleh', 0, 0, 'R');
        $pdf->Cell(55, 10, 'Disetujui oleh', 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(55, 10, '.............................', 0, 0, 'R');
        $pdf->Cell(55, 10, '.............................', 0, 0, 'R');
        $pdf->Cell(55, 10, '.............................', 0, 0, 'R');
        $pdf->Ln();
        $pdf->Cell(55, 10, 'QC', 0, 0, 'R');
        $pdf->Cell(55, 10, 'Produksi', 0, 0, 'R');
        $pdf->Cell(55, 10, 'SPV QC', 0, 0, 'R');
        $pdf->Ln();

        $pdf->Output('Pemeriksaan Pemaskan Dengan Streamer' . $tanggal . '.pdf', 'I');
    }


    public function print_excel($uuid)
    {
        // Load the data based on UUID (from your database or other source)
        $data = $this->pem_thawing_model->get_by_uuid($uuid);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 20 Pemeriksaan Proses Thawing.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Check if data is available
        if (!empty($data)) {
            // Start at row 11
            $startingRow = 11;
            $currentRow = $startingRow;

            // Initialize the number counter
            $number = 1;

            // Fill the sheet with the data and insert the number in column A
            $sheet->setCellValue('A' . $currentRow, $number); // Insert the number in column A
            $sheet->setCellValue('C6', $data->date ?? '');
            $sheet->setCellValue('B' . $currentRow, $data->kondisi_ruangan ?? '');
            $sheet->setCellValue('C' . $currentRow, $data->jenis_produk ?? '');
            $sheet->setCellValue('D' . $currentRow, $data->jumlah ?? '');
            $sheet->setCellValue('E' . $currentRow, $data->kode_produksi ?? '');
            $sheet->setCellValue('H' . $currentRow, $data->suhu_ruangan ?? '');
            $sheet->setCellValue('I' . $currentRow, $data->mulai_thawing_pukul ?? '');
            $sheet->setCellValue('J' . $currentRow, $data->selesai_thawing_pukul ?? '');
            $sheet->setCellValue('N' . $currentRow, $data->suhu_produk ?? '');
            $sheet->setCellValue('B23', $data->catatan ?? ''); // Assuming this will stay in the same place

            // Increment row and number for next entry
            $currentRow++;
            $number++;
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pem_thawing_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 20 Pemeriksaan Proses Thawing.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date has already been set
        $dateSet = false;

        // Starting row for the main data (A11 onwards)
        $startingRow = 11;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            // Initialize an array to hold the data
            $dataCollection = [];

            // Loop through each selected UUID
            foreach ($selected_uuids as $uuid) {
                // Load the data for each UUID
                $data = $this->pem_thawing_model->get_by_uuid($uuid);

                if (!empty($data)) {
                    // Store the data with the uuid as a key for later processing
                    $dataCollection[$uuid] = $data;
                }
            }

            // Sort the data by created_at
            usort($dataCollection, function ($a, $b) {
                return strtotime($a->created_at) - strtotime($b->created_at);
            });

            // Variables to track catatan
            $catatanCollection = [];

            // Loop through the sorted data
            foreach ($dataCollection as $uuid => $data) {
                // Set date once
                if (!$dateSet || !empty($data->date)) {
                    $sheet->setCellValue('C6', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }

                // Add the number in column A
                $sheet->setCellValue('A' . $startingRow, $startingRow - 10); // Insert number in A column

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('B' . $startingRow, $data->kondisi_ruangan ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->jenis_produk ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->jumlah ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->suhu_ruangan ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->mulai_thawing_pukul ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->selesai_thawing_pukul ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->suhu_produk ?? '');

                // Collect catatan values
                if (!empty($data->catatan)) {
                    $catatanCollection[] = $data->catatan; // Store catatan in the array
                }

                // Move to the next row for the main data
                $startingRow++;
            }

            // Combine catatan values into one cell, removing duplicates
            if (!empty($catatanCollection)) {
                $catatanCollection = array_unique($catatanCollection); // Remove duplicates
                $combinedCatatan = implode(', ', $catatanCollection); // Join with commas
                $sheet->setCellValue('B24', $combinedCatatan); // Set combined catatan in the appropriate cell
            }
        }

        // Set the writer to Xlsx and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Pem_Thawing_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }


}
?>