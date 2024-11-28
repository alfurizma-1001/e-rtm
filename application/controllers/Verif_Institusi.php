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
class Verif_Institusi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('verif_institusi_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'verif_institusi' => $this->verif_institusi_model->get_all(),
            // 'tanggal' => date('Y-m-d'),
            'active_nav' => 'verif_institusi',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/verif_institusi');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $rules = $this->verif_institusi_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $insert = $this->verif_institusi_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Verifikasi Produk Institusi berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Verifikasi Produk Institusi");
            }
            redirect('verif_institusi');
        }

        $data = array(
            'verif_institusi' => $this->verif_institusi_model->get_all(),
            'active_nav' => 'verif_institusi',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/verif_institusi-tambah', $data);
        $this->load->view('partials/footer');
    }
    public function edit($uuid)
    {
        $data['verif_institusi'] = $this->verif_institusi_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/verif_institusi-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Form validation rules
        $rules = $this->verif_institusi_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('cooking/verif_institusi-edit');
            $this->load->view('partials/footer');
        } else {
            $uuid = $this->input->post('uuid');

            $data = array(
                'date' => $this->input->post('date'),
                'shift' => $this->input->post('shift'),
                'jenis_produk' => $this->input->post('jenis_produk'),
                'kode_produksi' => $this->input->post('kode_produksi'),
                'waktu_proses' => $this->input->post('waktu_proses'),
                'lokasi' => $this->input->post('lokasi'),
                'sebelum' => $this->input->post('sebelum'),
                'sesudah' => $this->input->post('sesudah'),
                'sensori' => $this->input->post('sensori'),
                'qc' => $this->input->post('qc'),
                'produksi' => $this->input->post('produksi'),
                'ket' => $this->input->post('ket'),
                'catatan' => $this->input->post('catatan')
            );

            $update = $this->verif_institusi_model->update($uuid, $data);

            if ($update) {
                $this->session->set_flashdata('success_msg', 'Data Verifikasi Produk Institusi berhasil diupdate');
                redirect('verif_institusi');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal mengupdate data Verifikasi Institusi');
                redirect('verif_institusi/edit/' . $uuid);
            }
        }
    }

    public function hapus($uuid)
    {
        $delete = $this->verif_institusi_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data verif_institusi berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data verif_institusi');
        }
        redirect('verif_institusi');
    }

    public function print_pdf()
    {
        $tanggal = $this->input->post('tanggal');
        require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

        $verif_institusi = $this->verif_institusi_model->get_by_date($tanggal);

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Alfurizma Ramadhani');
        $pdf->SetTitle('Verifikasi Institusi');
        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 10);
        // $logo = base_url('assets\img\cpi-logo.png');
        // $pdf->Image($logo, 15, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->SetFont('helvetica', '', 5);
        $pdf->Cell(0, 10, 'PT CHAROEN POKPHAND INDONESIA - FOOD DIVISION', 0, 1, 'L');
        ;

        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'VERIFIKASI Institusi', 0, 1, 'C');
        $pdf->Ln();
        $pdf->SetFont('helvetica', 11);
        $pdf->Cell(0, 10, 'Tanggal: ' . $tanggal, 0, 1, 'L');
        if (!empty($verif_institusi)) {
            $pdf->Cell(0, 10, 'Shift: ' . $verif_institusi[0]->shift, 0, 1, 'L');
        }

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont('helvetica', 'B');
        $pdf->Cell(10, 20, 'NO', 1, 0, 'C', 1);
        $pdf->Cell(60, 20, 'NAMA Institusi', 1, 0, 'C', 1);
        $pdf->Cell(50, 20, 'KODE PRODUKSI', 1, 0, 'C', 1);
        $pdf->Cell(50, 20, 'SENSORI', 1, 0, 'C', 1);
        $pdf->Cell(60, 20, 'TINDAKAN KOREKSI', 1, 1, 'C', 1); // Changed last parameter to 1

        $pdf->SetFont('helvetica', '');
        $row = 1;
        foreach ($verif_institusi as $row_data) {
            $pdf->Cell(10, 10, $row++, 1, 0, 'C');
            $pdf->Cell(60, 10, $row_data->nama_institusi, 1, 0, 'C');
            $pdf->Cell(50, 10, $row_data->kode_produksi, 1, 0, 'C'); // Adjusted width
            $pdf->Cell(50, 10, $row_data->sensori, 1, 0, 'C'); // Adjusted width
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

        $pdf->Output('Verifikasi Institusi' . $tanggal . '.pdf', 'I');
    }


    public function print_excel($uuid)
    {
        // Load the data based on UUID (from your database or other source)
        $data = $this->verif_institusi_model->get_by_uuid($uuid);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 31 Verifikasi Produk Institusi.xlsx'; // Path to your template

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
            $sheet->setCellValue('A8' , $number); // Insert the number in column A
            $sheet->setCellValue('C5', $data->date ?? '');
            $sheet->setCellValue('E5', $data->shift ?? '');
            $sheet->setCellValue('B8', $data->jenis_produk ?? '');
            $sheet->setCellValue('C8', $data->kode_produksi ?? '');
            $sheet->setCellValue('D8', $data->waktu_proses ?? '');
            $sheet->setCellValue('E8', $data->lokasi ?? '');
            $sheet->setCellValue('F8', $data->sebelum ?? '');
            $sheet->setCellValue('G8', $data->sesudah ?? '');
            $sheet->setCellValue('H8', $data->sensori ?? '');
            $sheet->setCellValue('I8', $data->ket ?? '');
            $sheet->setCellValue('B31', $data->catatan ?? ''); // Assuming this will stay in the same place

            // Increment row and number for next entry
            $currentRow++;
            $number++;
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Verifikasi_Produk_Institusi_Report.xlsx"');
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
        $filePath = FCPATH . 'assets/excel/QR 31 Verifikasi Produk Institusi.xlsx'; // Path to your template

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

        // Starting row for the main data (A11 onwards)
        $startingRow = 8;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            // Loop through each selected UUID and collect data
            $number = 1; // Start numbering from 1
            foreach ($selected_uuids as $uuid) {
                $data = $this->verif_institusi_model->get_by_uuid($uuid);
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
                    $sheet->setCellValue('C5', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }

                // Append unique shift values to the shift array if not already added
                if (!empty($data->shift) && !in_array($data->shift, $shiftArray)) {
                    $shiftArray[] = $data->shift; // Only add unique shift values
                }

                $sheet->setCellValue('A' . $startingRow, $number); // Insert number in A column


                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('B' . $startingRow, $data->jenis_produk ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->waktu_proses ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->lokasi ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->sebelum ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->sesudah ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->sensori ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->ket ?? '');

                // Move to the next row for the main data
                $startingRow++;

                // Increment the number for the next row
                $number++;

                // Concatenate all catatan values into one string with a comma
                if (!empty($data->catatan)) {
                    if (!empty($catatanString)) {
                        $catatanString .= ', '; // Add comma if catatanString already has content
                    }
                    $catatanString .= $data->catatan; // Append the catatan value
                }
            }

            // After the loop, set the final unique shift values and concatenated catatan strings in the cells
            $sheet->setCellValue('E5', implode(', ', $shiftArray)); // For unique shifts, joined by commas
            $sheet->setCellValue('B31', $catatanString); // For concatenated catatan in cell B23
        }

        // Set the writer to Xlsx and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Verif_Institusi_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

    public function print_multiple_excel_backup()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 31 Verifikasi Produk Institusi.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $dateSet = false;
        $shiftSet = false;

        // Starting row for the main data (A11 onwards)
        $startingRow = 8;

        // Starting row for the catatan field (B22 onwards)
        $catatanStartingRow = 31;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            // Initialize the starting row for main data and numbering
            $startingRow = 8;
            $catatanStartingRow = 31; // Assuming the catatan starts at row 22
            $number = 1; // Start numbering from 1
            $dateSet = false; // To track if the date has been set
            $shiftSet = false;
            // Loop through each selected UUID
            foreach ($selected_uuids as $uuid) {
                // Load the data for each UUID
                $data = $this->verif_institusi_model->get_by_uuid($uuid);

                if (!empty($data)) {
                    // Set date and shift once, or replace if new data is provided
                    if (!$dateSet || !empty($data->date)) {
                        $sheet->setCellValue('C5', $data->date ?? '');
                        $dateSet = true; // Mark date as set
                    }
                    if (!$shiftSet || !empty($data->shift)) {
                        $sheet->setCellValue('E5', $data->shift ?? '');
                        $shiftSet = true; // Mark date as set
                    }

                    // Add the number in column A
                    $sheet->setCellValue('A' . $startingRow, $number); // Insert number in A column

                    // Fill the sheet with the main data starting at the current row
                    $sheet->setCellValue('B' . $startingRow, $data->jenis_produk ?? '');
                    $sheet->setCellValue('C' . $startingRow, $data->kode_produksi ?? '');
                    $sheet->setCellValue('D' . $startingRow, $data->waktu_proses ?? '');
                    $sheet->setCellValue('E' . $startingRow, $data->lokasi ?? '');
                    $sheet->setCellValue('F' . $startingRow, $data->sebelum ?? '');
                    $sheet->setCellValue('G' . $startingRow, $data->sesudah ?? '');
                    $sheet->setCellValue('H' . $startingRow, $data->sensori ?? '');
                    $sheet->setCellValue('I' . $startingRow, $data->ket ?? '');

                    // Move to the next row for the main data
                    $startingRow++;

                    // Increment the number for the next row
                    $number++;

                    // Add the catatan starting from row B22, B23, etc.
                    if (!empty($data->catatan)) {
                        $sheet->setCellValue('B' . $catatanStartingRow, $data->catatan);
                        $catatanStartingRow++; // Move to the next row for catatan
                    }
                }
            }
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Verifikasi_Produk_Institusi_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }
}
?>