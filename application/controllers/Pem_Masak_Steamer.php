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
class Pem_Masak_Steamer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_masak_steamer_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_masak_steamer' => $this->pem_masak_steamer_model->get_all(),
            'active_nav' => 'pem_masak_steamer',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_masak_steamer');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $rules = $this->pem_masak_steamer_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $insert = $this->pem_masak_steamer_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Pemeriksaan Pemasakan Dengan Streamer berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Pemeriksaan Pemasakan Dengan Streamer");
            }
            redirect('pem_masak_steamer');
        }

        $data = array(
            'pem_masak_steamer' => $this->pem_masak_steamer_model->get_all(),
            'active_nav' => 'pem_masak_steamer',
        );
        // var_dump($data);
        // exit();

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_masak_steamer-tambah', $data);
        $this->load->view('partials/footer');
    }
    public function edit($uuid)
    {
        $data['pem_masak_steamer'] = $this->pem_masak_steamer_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_masak_steamer-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Form validation rules
        $rules = $this->pem_masak_steamer_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('cooking/pem_masak_steamer-edit');
            $this->load->view('partials/footer');
        } else {
            $uuid = $this->input->post('uuid');

            $data = array(
                'date' => $this->input->post('date'),
                'shift' => $this->input->post('shift'),
                'nama_produk' => $this->input->post('nama_produk'),
                'kode_produksi' => $this->input->post('kode_produksi'),
                't_raw' => $this->input->post('t_raw'),
                'jumlah_tray' => $this->input->post('jumlah_tray'),
                't_ruang' => $this->input->post('t_ruang'),
                't_produk' => $this->input->post('t_produk'),
                't_produk1menit' => $this->input->post('t_produk1menit'),
                'waktu' => $this->input->post('waktu'),
                'keterangan' => $this->input->post('keterangan'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai'),
                'kematangan' => $this->input->post('kematangan'),
                'rasa' => $this->input->post('rasa'),
                'aroma' => $this->input->post('aroma'),
                'tekstur' => $this->input->post('tekstur'),
                'warna' => $this->input->post('warna'),
                'qc' => $this->input->post('qc'),
                'produksi' => $this->input->post('produksi'),
                'ket' => $this->input->post('ket'),
                'catatan' => $this->input->post('catatan')
            );

            $update = $this->pem_masak_steamer_model->update($uuid, $data);
            if ($update) {
                $this->session->set_flashdata('success_msg', 'Data pem_masak_steamer berhasil diupdate');
                redirect('pem_masak_steamer');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pem_masak_steamer');
                redirect('pem_masak_steamer/edit/' . $uuid);
            }
        }
    }

    public function hapus($uuid)
    {
        $delete = $this->pem_masak_steamer_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_masak_steamer berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_masak_steamer');
        }
        redirect('pem_masak_steamer');
    }

    public function print_pdf()
    {
        $tanggal = $this->input->post('tanggal');
        require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

        $pem_masak_steamer = $this->pem_masak_steamer_model->get_by_date($tanggal);

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
        $pdf->Cell(0, 10, 'PEMERIKSAAN PEMASAKAN DENGAN STEAMER', 0, 1, 'C');
        $pdf->Ln();
        $pdf->SetFont('helvetica', 11);
        $pdf->Cell(0, 10, 'Tanggal: ' . $tanggal, 0, 1, 'L');
        if (!empty($pem_masak_steamer)) {
            $pdf->Cell(0, 10, 'Shift: ' . $pem_masak_steamer[0]->shift, 0, 1, 'L');
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
        foreach ($pem_masak_steamer as $row_data) {
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
        $data = $this->pem_masak_steamer_model->get_by_uuid($uuid);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 06 pemeriksaan pemasakan dengan steamer.xls'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Check if data is available
        if (!empty($data)) {
            // Fill the sheet with the data
            $sheet->setCellValue('B7', $data->date ?? '');
            $sheet->setCellValue('E7', $data->shift ?? '');
            $sheet->setCellValue('H7', $data->nama_produk ?? '');
            $sheet->setCellValue('B9', $data->kode_produksi ?? '');
            $sheet->setCellValue('B10', $data->t_raw ?? '');
            $sheet->setCellValue('B12', $data->jumlah_tray ?? '');
            $sheet->setCellValue('B15', $data->t_ruang ?? '');
            $sheet->setCellValue('B16', $data->t_produk ?? '');
            $sheet->setCellValue('B17', $data->t_produk1menit ?? '');
            $sheet->setCellValue('B19', $data->waktu ?? '');
            $sheet->setCellValue('B20', $data->keterangan ?? '');
            $sheet->setCellValue('B23', $data->jam_mulai ?? '');
            $sheet->setCellValue('B24', $data->jam_selesai ?? '');
            $sheet->setCellValue('B27', $data->kematangan ?? '');
            $sheet->setCellValue('B28', $data->rasa ?? '');
            $sheet->setCellValue('B29', $data->aroma ?? '');
            $sheet->setCellValue('B30', $data->tekstur ?? '');
            $sheet->setCellValue('B31', $data->warna ?? '');

            $sheet->setCellValue('B68', $data->catatan ?? '');

        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Pem_Masak_Steamer_Report.xls"');
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
    $filePath = FCPATH . 'assets/excel/QR 06 pemeriksaan pemasakan dengan steamer.xls'; // Path to your template

    // Load your Excel template
    $spreadsheet = IOFactory::load($filePath);

    // Get active sheet from the loaded template
    $sheet = $spreadsheet->getActiveSheet();

    // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
    $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

    // Initialize arrays to store unique shift and catatan values
    $shiftArray = [];
    $catatanString = '';

    // Define a starting column for the first set of data (after B)
    $startingColumn = 'B';

    // Check if there are selected UUIDs
    if (!empty($selected_uuids)) {
        $column = $startingColumn;

        // Loop through each selected UUID
        foreach ($selected_uuids as $uuid) {
            // Load the data for each UUID
            $data = $this->pem_masak_steamer_model->get_by_uuid($uuid);

            if (!empty($data)) {
                // Add unique shift values to the shiftArray
                if (!empty($data->shift)) {
                    $shiftArray[] = $data->shift; // Collect the shift value
                }

                // Concatenate catatan values into one string, separated by commas
                if (!empty($data->catatan)) {
                    if (!empty($catatanString)) {
                        $catatanString .= ', '; // Add a comma before appending if the string already has content
                    }
                    $catatanString .= $data->catatan; // Append the catatan value
                }

                // Fill the sheet with the data in separate columns
                $sheet->setCellValue('B7', $data->date ?? '');
                $sheet->setCellValue('H7', $data->nama_produk ?? '');
                $sheet->setCellValue($column . '9', $data->kode_produksi ?? '');
                $sheet->setCellValue($column . '10', $data->t_raw ?? '');
                $sheet->setCellValue($column . '12', $data->jumlah_tray ?? '');
                $sheet->setCellValue($column . '15', $data->t_ruang ?? '');
                $sheet->setCellValue($column . '16', $data->t_produk ?? '');
                $sheet->setCellValue($column . '17', $data->t_produk1menit ?? '');
                $sheet->setCellValue($column . '19', $data->waktu ?? '');
                $sheet->setCellValue($column . '20', $data->keterangan ?? '');
                $sheet->setCellValue($column . '23', $data->jam_mulai ?? '');
                $sheet->setCellValue($column . '24', $data->jam_selesai ?? '');
                $sheet->setCellValue($column . '27', $data->kematangan ?? '');
                $sheet->setCellValue($column . '28', $data->rasa ?? '');
                $sheet->setCellValue($column . '29', $data->aroma ?? '');
                $sheet->setCellValue($column . '30', $data->tekstur ?? '');
                $sheet->setCellValue($column . '31', $data->warna ?? '');

                // Move to the next column (C, D, etc.)
                $column++;
            }
        }

        // After processing all data, set the unique shift and concatenated catatan values in the cells
        $sheet->setCellValue('E7', implode(', ', array_unique($shiftArray))); // For unique shifts, joined by commas
        $sheet->setCellValue('B68', $catatanString); // Set the concatenated catatan string in cell B68 (or any appropriate cell)
    }

    // Set the writer to Xls and output the file
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');

    // Set headers to trigger download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Pem_Masak_Steamer_Report.xls"');
    header('Cache-Control: max-age=0');

    // Write the file to the output
    $writer->save('php://output');
}



}
