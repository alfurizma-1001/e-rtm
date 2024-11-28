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
class Pem_Sanitasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_sanitasi_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_sanitasi' => $this->pem_sanitasi_model->get_all(),
            'active_nav' => 'pem_sanitasi',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('sanitasi/pem_sanitasi');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $rules = $this->pem_sanitasi_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $insert = $this->pem_sanitasi_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Pemeriksaan Sanitasi berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Pemeriksaan Sanitasi");
            }
            redirect('pem_sanitasi');
        }

        $data = array(
            'pem_sanitasi' => $this->pem_sanitasi_model->get_all(),
            'active_nav' => 'pem_sanitasi',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('sanitasi/pem_sanitasi-tambah', $data);
        $this->load->view('partials/footer');
    }
    public function edit($uuid)
    {
        $data['pem_sanitasi'] = $this->pem_sanitasi_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('sanitasi/pem_sanitasi-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Form validation rules
        $rules = $this->pem_sanitasi_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('partials/head');
            $this->load->view('sanitasi/pem_sanitasi-edit');
            $this->load->view('partials/footer');
        } else {
            $uuid = $this->input->post('uuid');

            $data = array(
                'uuid' => $uuid,
                'date' => $this->input->post('date'),
                'shift' => $this->input->post('shift'),
                'pukul' => $this->input->post('pukul'),
                'foot_basin' => $this->input->post('foot_basin'),
                'hand_basin' => $this->input->post('hand_basin'),
                'keterangan' => $this->input->post('keterangan'),
                'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
    
                'catatan' => $this->input->post('catatan')
            );

            $update = $this->pem_sanitasi_model->update($uuid, $data);

            if ($update) {
                $this->session->set_flashdata('success_msg', 'Data pem_sanitasi berhasil diupdate');
                redirect('pem_sanitasi');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pem_sanitasi');
                redirect('pem_sanitasi/edit/' . $uuid);
            }
        }
    }

    public function hapus($uuid)
    {
        $delete = $this->pem_sanitasi_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_sanitasi berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_sanitasi');
        }
        redirect('pem_sanitasi');
    }

    public function print_pdf()
    {
        $tanggal = $this->input->post('tanggal');
        $shift = $this->input->post('shift');

        require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

        $pem_sanitasi = $this->pem_sanitasi_model->get_by_date_and_shift($tanggal, $shift);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Alfurizma Ramadhani');
        $pdf->SetTitle('Pemeriksaan Sanitasi');
        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 5);
        $pdf->Cell(0, 10, 'PT CHAROEN POKPHAND INDONESIA - FOOD DIVISION', 0, 1, 'L');
        ;

        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'PEMERIKSAAN SANITASI', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 10);

        $pdf->SetFont('helvetica', 10);
        $pdf->Cell(0, 6, 'Tanggal: ' . $tanggal, 0, 1, 'L');
        if (!empty($pem_sanitasi)) {
            $pdf->Cell(0, 6, 'Shift: ' . $pem_sanitasi[0]->shift, 0, 1, 'L');
        }
        $pdf->SetFont('helvetica', '', 9);

        $html = '<table border="1">
                    <thead>
                    <tr style="text-align:center; width:100%">
                        <th>Pukul</th>
                        <th>Foot Basin</th>
                        <th>Hand Basin</th>
                        <th>Keterangan</th>
                        <th>Tindakan Koreksi</th>
                        <th>QC</th>
                        <th>Produksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="text-align:center;">
                        <td>Standar</td>
                        <td>200 ppm</td>
                        <td>500 ppm</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';

        foreach ($pem_sanitasi as $data) {
            $html .= '<tr style="text-align:center;">
                        <td>' . $data->pukul . '</td>
                        <td>' . $data->foot_basin . '</td>
                        <td>' . $data->hand_basin . '</td>
                        <td>' . $data->keterangan . '</td>
                        <td>' . $data->tindakan_koreksi . '</td>
                        <td>' . $data->nama_pegawai . '</td>
                        <td>' . $data->produksi . '</td>
                    </tr>';
        }

        $html .= '</tbody></table>';
        $pdf->writeHTML($html, true, false, false, false, '');
        $lebar1 = 175;
        $lebar2 = 0;

        $pdf->Cell($lebar1 - $lebar2, 10, '', 0, 0);
        $pdf->Cell($lebar2, 0, 'QR 03/01', 0, 1, 'L');

        $pdf->Cell(0, 6, 'Catatan: ' . $data->catatan, 0, 1, 'L');
        $pdf->Ln();

        $pdf->Cell(55, 10, 'Diperiksa oleh_______________', 0, 0, 'R');
        $pdf->Cell(130, 10, 'Disetujui oleh_______________', 0, 0, 'R');

        $pdf->Output('Pemeriksaan Sanitasi.pdf', 'I');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 03 pemeriksaan sanitasi.xls'; // Path to your template

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
        $startingRow = 13;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            // Loop through each selected UUID and collect data
            foreach ($selected_uuids as $uuid) {
                $data = $this->pem_sanitasi_model->get_by_uuid($uuid);
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
                    $sheet->setCellValue('B8', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }

                // Append unique shift values to the shift array if not already added
                if (!empty($data->shift) && !in_array($data->shift, $shiftArray)) {
                    $shiftArray[] = $data->shift; // Only add unique shift values
                }

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $data->foot_basin ?? '');  // Replacing 'kode_termo' with 'foot_basin'
                $sheet->setCellValue('B' . $startingRow, $data->hand_basin ?? '');  // Adding 'hand_basin' to column B
                $sheet->setCellValue('C' . $startingRow, $data->pukul ?? '');       // Keeping 'pukul' in column D
                $sheet->setCellValue('D' . $startingRow, $data->keterangan ?? '');  // Replacing 'hasil_tera' with 'keterangan'
                $sheet->setCellValue('E' . $startingRow, $data->tindakan_koreksi ?? '');  // Replacing 'tindakan' with 'tindakan_koreksi'
                  

                // Move to the next row for the main data
                $startingRow++;

                // Concatenate all catatan values into one string with a comma
                if (!empty($data->catatan)) {
                    if (!empty($catatanString)) {
                        $catatanString .= ', '; // Add comma if catatanString already has content
                    }
                    $catatanString .= $data->catatan; // Append the catatan value
                }
            }

            // After the loop, set the final unique shift values and concatenated catatan strings in the cells
            $sheet->setCellValue('D8', implode(', ', $shiftArray)); // For unique shifts, joined by commas
            $sheet->setCellValue('B32', $catatanString); // For concatenated catatan in cell B23
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Pem_Sanitasi_Multiple_Report.xls"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>