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
class Suhu_Ruangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('suhu_ruangan_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'suhu_ruangan' => $this->suhu_ruangan_model->get_all(),
            'active_nav' => 'suhu_ruangan',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('suhu_ruangan/suhu_ruangan');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $rules = $this->suhu_ruangan_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $insert = $this->suhu_ruangan_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Suhu Ruangan berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Suhu Ruangan");
            }
            redirect('suhu_ruangan');
        }

        $data = array(
            'suhu_ruangan' => $this->suhu_ruangan_model->get_all(),
            'active_nav' => 'suhu_ruangan',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('suhu_ruangan/suhu_ruangan-tambah', $data);
        $this->load->view('partials/footer');
    }
    public function edit($uuid)
    {
        $data['suhu_ruangan'] = $this->suhu_ruangan_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('suhu_ruangan/suhu_ruangan-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Form validation rules
        $rules = $this->suhu_ruangan_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {

            // $errors = validation_errors();

            // $data['errors'] = $errors;

            // var_dump($errors);
            // exit();

            $this->load->view('partials/head');
            $this->load->view('suhu_ruangan/suhu_ruangan-edit');
            $this->load->view('partials/footer');
        } else {
            $uuid = $this->input->post('uuid');

            $data = array(
                'date' => $this->input->post('date'),
                'shift' => $this->input->post('shift'),
                'pukul' => $this->input->post('pukul'),
                'chill_room' => $this->input->post('chill_room'),
                'cold_stor1' => $this->input->post('cold_stor1'),
                'cold_stor2' => $this->input->post('cold_stor2'),
                'anteroom' => $this->input->post('anteroom'),
                'sea_T' => $this->input->post('sea_T'),
                'sea_RH' => $this->input->post('sea_RH'),
                'prep_room' => $this->input->post('prep_room'),
                'cooking_room' => $this->input->post('cooking_room'),
                'filling_room' => $this->input->post('filling_room'),
                'rice_room' => $this->input->post('rice_room'),
                'noodle_room' => $this->input->post('noodle_room'),
                'topping_area' => $this->input->post('topping_area'),
                'packing_karton' => $this->input->post('packing_karton'),
                'dry_T' => $this->input->post('dry_T'),
                'dry_RH' => $this->input->post('dry_RH'),
                'cold_fg' => $this->input->post('cold_fg'),
                'anteroom_fg' => $this->input->post('anteroom_fg'),
                'keterangan' => $this->input->post('keterangan'),
                'catatan' => $this->input->post('catatan')
            );

            $update = $this->suhu_ruangan_model->update($uuid, $data);

            if ($update) {
                $this->session->set_flashdata('success_msg', 'Data suhu_ruangan berhasil diupdate');
                redirect('suhu_ruangan');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal mengupdate data suhu_ruangan');
                redirect('suhu_ruangan/edit/' . $uuid);
            }
        }
    }

    public function hapus($uuid)
    {
        $delete = $this->suhu_ruangan_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data suhu_ruangan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data suhu_ruangan');
        }
        redirect('suhu_ruangan');
    }

    public function print_pdf()
    {
        $tanggal = $this->input->post('tanggal');
        $shift = $this->input->post('shift');

        require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

        $suhu_ruangan = $this->suhu_ruangan_model->get_by_date_and_shift($tanggal, $shift);

        if (empty($suhu_ruangan)) {
            echo '<script type="text/javascript">
                    $(document).ready(function(){
                        $("#noDataModal").modal("show");
                    });
                  </script>';
            return;
        }

        $pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Alfurizma Ramadhani');
        $pdf->SetTitle('Suhu Ruangan');
        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 5);
        $pdf->Cell(0, 10, 'PT CHAROEN POKPHAND INDONESIA - FOOD DIVISION', 0, 1, 'L');
        ;

        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Cell(0, 10, 'PEMERIKSAAN SUHU RUANGAN', 0, 1, 'C');
        $pdf->SetFont('helvetica', '', 10);

        $pdf->SetFont('helvetica', 10);
        $pdf->Cell(0, 6, 'Tanggal: ' . $tanggal, 0, 1, 'L');
        if (!empty($suhu_ruangan)) {
            $pdf->Cell(0, 6, 'Shift: ' . $suhu_ruangan[0]->shift, 0, 1, 'L');
        }
        $pdf->SetFont('helvetica', '', 8);

        $html = '<table border="1">
                    <thead>
                    <tr>
                        <th colspan="20" style="text-align:center;">Ruangan &deg;Celcius</th>
                    </tr>
                    <tr style="text-align:center; width:100%">
                        <th>Pukul</th>
                        <th>Chill Room</th>
                        <th>Cold Storage 1</th>
                        <th>Cold Storage 2</th>
                        <th>Anteroom</th>
                        <th>T(&deg;C)</th>
                        <th>RH(%)</th>
                        <th>Prep Room</th>
                        <th>Cooking Room</th>
                        <th>Filling Room</th>
                        <th>Rice Room</th>
                        <th>Noodle Room</th>
                        <th>Topping Area</th>
                        <th>Packing(karton)</th>
                        <th>T(&deg;C)</th>
                        <th>RH(%)</th>
                        <th>Cold Storage FG</th>
                        <th>Anteroom FG</th>
                        <th>Keterangan</th>
                        <th>QC</th>
                        <th>Produksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="text-align:center;">
                        <td>STD (&deg;C)</td>
                        <td>0 - 4</td>
                        <td style="font-family: DejaVu Sans;">-20≠2</td>
                        <td style="font-family: DejaVu Sans;">-20≠2</td>
                        <td>8 - 10</td>
                        <td>22 - 20</td>
                        <td> &lt; 75 </td>
                        <td>8 - 12</td>
                        <td>20 - 30</td>
                        <td>8 - 12</td>
                        <td>20 - 30</td>
                        <td>20 - 30</td>
                        <td>8 - 12</td>
                        <td>8 - 12</td>
                        <td>20 - 30</td>
                        <td> &lt; 75 </td>
                        <td style="font-family: DejaVu Sans;">-19≠1</td>
                        <td style="font-family: DejaVu Sans;">-19≠1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';

        foreach ($suhu_ruangan as $data) {
            $html .= '<tr style="text-align:center;">
                        <td>' . $data->pukul . '</td>
                        <td>' . $data->chill_room . '</td>
                        <td>' . $data->cold_stor1 . '</td>
                        <td>' . $data->cold_stor2 . '</td>
                        <td>' . $data->anteroom . '</td>
                        <td>' . $data->sea_T . '</td>
                        <td>' . $data->sea_RH . '</td>
                        <td>' . $data->prep_room . '</td>
                        <td>' . $data->cooking_room . '</td>
                        <td>' . $data->filling_room . '</td>
                        <td>' . $data->rice_room . '</td>
                        <td>' . $data->noodle_room . '</td>
                        <td>' . $data->topping_area . '</td>
                        <td>' . $data->packing_karton . '</td>
                        <td>' . $data->dry_T . '</td>
                        <td>' . $data->dry_RH . '</td>
                        <td>' . $data->cold_fg . '</td>
                        <td>' . $data->anteroom_fg . '</td>
                        <td>' . $data->keterangan . '</td>
                        <td>' . $data->nama_pegawai . '</td>
                        <td>' . $data->produksi . '</td>
                    </tr>';
        }

        $html .= '</tbody></table>';
        $pdf->writeHTML($html, true, false, false, false, '');
        $lebar1 = 260;
        $lebar2 = 0;

        $pdf->Cell($lebar1 - $lebar2, 10, '', 0, 0);
        $pdf->Cell($lebar2, 0, 'QR 02/03', 0, 1, 'L');

        $pdf->Cell(0, 6, 'Catatan: ' . $data->catatan, 0, 1, 'L');
        $pdf->Ln();

        $pdf->Cell(55, 10, 'Diperiksa oleh_______________', 0, 0, 'R');
        $lebar_halaman = 210;
        $lebar_sel = 55;

        $pdf->Cell($lebar_halaman - $lebar_sel, 10, '', 0, 0);
        $pdf->Cell($lebar_sel, 10, 'Disetujui oleh_______________', 0, 1, 'L');

        $pdf->Output('Suhu_Ruangan.pdf', 'I');
    }



    public function print_multiple_excel()
{
    // Get the selected UUIDs from the query string (GET request)
    $selected_uuids = $this->input->get('uuids');

    // Explode the UUIDs into an array
    $selected_uuids = explode(',', $selected_uuids);

    // Correct the path to point to the local template on your server
    $filePath = FCPATH . 'assets/excel/QR 02 pemeriksaan suhu ruangan.xls'; // Path to your template

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

    // Define a mapping for 'pukul' values to rows (adjust row numbers as needed)
    $pukulRowMapping = [
        '01:00' => 12,
        '02:00' => 13,
        '03:00' => 14,
        '04:00' => 15,
        '05:00' => 16,
        '06:00' => 17,
        '07:00' => 18,
        '08:00' => 19,
        '09:00' => 20,
        '10:00' => 21,
        '11:00' => 22,
        '12:00' => 23,
        '13:00' => 24,
        '14:00' => 25,
        '15:00' => 26,
        '16:00' => 27,
        '17:00' => 28,
        '18:00' => 29,
        '19:00' => 30,
        '20:00' => 31,
        '21:00' => 32,
        '22:00' => 33,
        '23:00' => 34,
        '00:00' => 11
        // Add more mappings if needed for other times
    ];

    // Check if there are selected UUIDs
    if (!empty($selected_uuids)) {
        // Loop through each selected UUID and collect data
        foreach ($selected_uuids as $uuid) {
            $data = $this->suhu_ruangan_model->get_by_uuid($uuid);
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

            // Get the row number for the current 'pukul'
            $startingRow = $pukulRowMapping[$data->pukul] ?? null; // Use the mapping array
            
            if ($startingRow !== null) {
                // Fill the sheet with the main data starting at the mapped row for the current 'pukul'
                $sheet->setCellValue('A' . $startingRow, $data->pukul ?? '');
                $sheet->setCellValue('B' . $startingRow, $data->chill_room ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->cold_stor1 ?? '');
                $sheet->setCellValue('D' . $startingRow, $data->cold_stor2 ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->anteroom ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->sea_T ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->sea_RH ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->prep_room ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->cooking_room ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->filling_room ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->rice_room ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->noodle_room ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->topping_area ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->packing_karton ?? '');
                $sheet->setCellValue('O' . $startingRow, $data->dry_T ?? '');
                $sheet->setCellValue('P' . $startingRow, $data->dry_RH ?? '');
                $sheet->setCellValue('Q' . $startingRow, $data->cold_fg ?? '');
                $sheet->setCellValue('R' . $startingRow, $data->anteroom_fg ?? '');
                $sheet->setCellValue('S' . $startingRow, $data->keterangan ?? '');

                // Concatenate all catatan values into one string with a comma
                if (!empty($data->catatan)) {
                    if (!empty($catatanString)) {
                        $catatanString .= ', '; // Add comma if catatanString already has content
                    }
                    $catatanString .= $data->catatan; // Append the catatan value
                }
            }
        }

        // After the loop, set the final unique shift values and concatenated catatan strings in the cells
        $sheet->setCellValue('F5', implode(', ', $shiftArray)); // For unique shifts, joined by commas
        $sheet->setCellValue('B36', $catatanString); // For concatenated catatan in cell B23
    }
    
    // Set the writer to Xls and output the file
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');

    // Set headers to trigger download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Suhu_Ruangan_Multiple_Report.xls"');
    header('Cache-Control: max-age=0');

    // Write the file to the output
    $writer->save('php://output');
}


}
?>