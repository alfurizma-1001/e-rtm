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
class Verif_Topping extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('verif_topping_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'verif_topping' => $this->verif_topping_model->get_all(),
            'active_nav' => 'verif_topping',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/verif_topping');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->verif_topping_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data verif_topping berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data verif_topping");
            }

            // Redirect after handling the form submission
            redirect('verif_topping');
        }

        // Prepare data to load the form view
        $data = array(
            'verif_topping' => $this->verif_topping_model->get_all(),
            'active_nav' => 'verif_topping',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/verif_topping-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['verif_topping'] = $this->verif_topping_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/verif_topping-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produk' => $this->input->post('kode_produk'),
            'jenis_topping' => $this->input->post('jenis_topping'),
            'standar' => $this->input->post('standar'),
            'pukul' => $this->input->post('pukul'),
            'gramasi' => $this->input->post('gramasi'),
            'p_pukul' => $this->input->post('p_pukul'),
            'p_gramasi' => $this->input->post('p_gramasi'),
            'pp_pukul' => $this->input->post('pp_pukul'),
            'pp_gramasi' => $this->input->post('pp_gramasi'),
            'tindakan' => $this->input->post('tindakan'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->verif_topping_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data verif_topping berhasil diupdate');
            redirect('verif_topping');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data verif_topping');
            redirect('verif_topping/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->verif_topping_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data verif_topping berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data verif_topping');
        }
        redirect('verif_topping');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 26 Verifikasi Gramasi Topping.xlsx'; // Path to your template

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
        $startingRow = 8;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->verif_topping_model->get_by_uuid($uuid);
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

                // Collect unique shift values into an array
                if (!empty($data->shift)) {
                    $shiftArray[] = $data->shift;
                }

                // Collect catatan values into an array
                if (!empty($data->catatan)) {
                    $catatanArray[] = $data->catatan;
                }

                // Prepare the fields for splitting (split by commas)
                $jenisTopping = $data->jenis_topping ?? '';
                $jenisToppingItems = explode(',', $jenisTopping); // Split by commas

                $standar = $data->standar ?? '';
                $standarItems = explode(',', $standar); // Split by commas

                $gramasi = $data->gramasi ?? '';
                $gramasiItems = explode(',', $gramasi); // Split by commas

                $pGramasi = $data->p_gramasi ?? '';
                $pGramasiItems = explode(',', $pGramasi); // Split by commas

                $ppGramasi = $data->pp_gramasi ?? '';
                $ppGramasiItems = explode(',', $ppGramasi); // Split by commas

                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);
                $sheet->setCellValue('B' . $startingRow, $data->nama_produk ?? '');
                $sheet->setCellValue('C' . $startingRow, $data->kode_produk ?? '');

                // Start at the same row for all fields (jenis_topping, standar, gramasi, p_gramasi, pp_gramasi)
                $currentRow = $startingRow;

                // Loop through each item in 'jenis_topping' and place them in new rows
                foreach ($jenisToppingItems as $item) {
                    $sheet->setCellValue('D' . $currentRow, trim($item)); // Insert each item into a new row in 'D' column
                    $sheet->getStyle('D' . $currentRow)->getAlignment()->setWrapText(true); // Enable text wrapping

                    // Set row height dynamically
                    $lines = substr_count($item, "\n") + 1; // Calculate number of lines
                    $rowHeight = 15 * $lines; // Adjust the row height based on the number of lines
                    $sheet->getRowDimension($currentRow)->setRowHeight($rowHeight);

                    // Increment the row for the next item
                    $currentRow++;
                }

                // Loop through each item in 'standar' and place them in new rows starting from the same row as 'jenis_topping'
                foreach ($standarItems as $item) {
                    $sheet->setCellValue('E' . $startingRow, trim($item)); // Insert each item into the same row in 'E' column
                    $sheet->getStyle('E' . $startingRow)->getAlignment()->setWrapText(true); // Enable text wrapping

                    // Set row height dynamically
                    $lines = substr_count($item, "\n") + 1; // Calculate number of lines
                    $rowHeight = 15 * $lines; // Adjust the row height based on the number of lines
                    $sheet->getRowDimension($startingRow)->setRowHeight($rowHeight);

                    // Increment the row for the next item
                    $startingRow++;
                }

                // Now fill 'gramasi', 'p_gramasi', and 'pp_gramasi' starting from the same row as 'standar'
                $currentRow = $startingRow - count($standarItems); // Ensure 'gramasi' starts at the correct row

                // Loop through each item in 'gramasi' and place them in new rows starting from the same row as 'standar'
                foreach ($gramasiItems as $item) {
                    $sheet->setCellValue('G' . $currentRow, trim($item)); // Insert each item into the same row in 'G' column
                    $sheet->getStyle('G' . $currentRow)->getAlignment()->setWrapText(true); // Enable text wrapping

                    // Set row height dynamically
                    $lines = substr_count($item, "\n") + 1; // Calculate number of lines
                    $rowHeight = 15 * $lines; // Adjust the row height based on the number of lines
                    $sheet->getRowDimension($currentRow)->setRowHeight($rowHeight);

                    // Increment the row for the next item
                    $currentRow++;
                }
                $currentRow = $startingRow - count($standarItems);
                // Loop through each item in 'p_gramasi' and place them in new rows starting from the same row as 'standar'
                foreach ($pGramasiItems as $item) {
                    $sheet->setCellValue('I' . $currentRow, trim($item)); // Insert each item into the same row in 'I' column
                    $sheet->getStyle('I' . $currentRow)->getAlignment()->setWrapText(true); // Enable text wrapping

                    // Set row height dynamically
                    $lines = substr_count($item, "\n") + 1; // Calculate number of lines
                    $rowHeight = 15 * $lines; // Adjust the row height based on the number of lines
                    $sheet->getRowDimension($currentRow)->setRowHeight($rowHeight);

                    // Increment the row for the next item
                    $currentRow++;
                }
                $currentRow = $startingRow - count($standarItems);
                // Loop through each item in 'pp_gramasi' and place them in new rows starting from the same row as 'standar'
                foreach ($ppGramasiItems as $item) {
                    $sheet->setCellValue('K' . $currentRow, trim($item)); // Insert each item into the same row in 'K' column
                    $sheet->getStyle('K' . $currentRow)->getAlignment()->setWrapText(true); // Enable text wrapping

                    // Set row height dynamically
                    $lines = substr_count($item, "\n") + 1; // Calculate number of lines
                    $rowHeight = 15 * $lines; // Adjust the row height based on the number of lines
                    $sheet->getRowDimension($currentRow)->setRowHeight($rowHeight);

                    // Increment the row for the next item
                    $currentRow++;
                }
                $currentRow = $startingRow - count($standarItems);
                // After processing all fields, fill other columns with remaining data
                $sheet->setCellValue('F' . $currentRow, $data->pukul ?? '');
                $sheet->setCellValue('H' . $currentRow, $data->p_pukul ?? '');
                $sheet->setCellValue('J' . $currentRow, $data->pp_pukul ?? '');
                $sheet->setCellValue('L' . $currentRow, $data->tindakan ?? '');

                // Move to the next row for the main data after filling all items
                $currentRow++;
            }



            // After processing all data, concatenate unique shift values and set them in the sheet
            $uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
            $sheet->setCellValue('L5', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            // Concatenate all catatan values and set them in the sheet
            $sheet->setCellValue('B24', implode(', ', $catatanArray)); // Set concatenated catatan in B22
        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="verif_topping_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>