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
class Pem_Kettle extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pem_kettle_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pem_kettle' => $this->pem_kettle_model->get_all(),
            'active_nav' => 'pem_kettle',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_kettle');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pem_kettle_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Pemeriksaan Pemasakan Dengan Tumbling berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Pemeriksaan Pemasakan Dengan Tumbling");
            }

            // Redirect after handling the form submission
            redirect('pem_kettle');
        }

        // Prepare data to load the form view
        $data = array(
            'pem_kettle' => $this->pem_kettle_model->get_all(),
            'active_nav' => 'pem_kettle',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_kettle-tambah', $data);
        $this->load->view('partials/footer');
    }


    public function edit($uuid)
    {
        $data['pem_kettle'] = $this->pem_kettle_model->get_by_uuid($uuid);


        $this->load->view('partials/head', $data);
        $this->load->view('cooking/pem_kettle-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        // Prepare data for update
        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'jenis_produk' => $this->input->post('jenis_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'waktu_start_stop' => $this->input->post('waktu_start_stop'),
            'mesin' => $this->input->post('mesin'),
            'waktu' => $this->input->post('waktu'),
            'tahapan_proses' => $this->input->post('tahapan_proses'),
            'formulasike' => $this->input->post('formulasike'),
            'jenis_bahan' => $this->input->post('jenis_bahan'),
            'jumlah_standar' => $this->input->post('jumlah_standar'),
            'jumlah_aktual' => $this->input->post('jumlah_aktual'),
            'sensori' => $this->input->post('sensori'),
            'lama_proses' => $this->input->post('lama_proses'),
            'mixing_paddle_on' => $this->input->post('mixing_paddle_on'),
            'mixing_paddle_off' => $this->input->post('mixing_paddle_off'),
            'pressure' => $this->input->post('pressure'),
            'temperature' => $this->input->post('temperature'),
            'target_temperature' => $this->input->post('target_temperature'),
            'actual_temperature' => $this->input->post('actual_temperature'),
            'suhu_pusat_produk' => $this->input->post('suhu_pusat_produk'),
            'organoleptik_warna' => $this->input->post('organoleptik_warna'),
            'organoleptik_aroma' => $this->input->post('organoleptik_aroma'),
            'organoleptik_rasa' => $this->input->post('organoleptik_rasa'),
            'organoleptik_tekstur' => $this->input->post('organoleptik_tekstur'),
            'catatan_kanan' => $this->input->post('catatan_kanan'),
            'catatan' => $this->input->post('catatan')
        );

        // Log the data being updated
        log_message('debug', 'Update Data: ' . print_r($data, true));

        // Perform the update
        $update = $this->pem_kettle_model->update($uuid, $data);

        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pem_kettle berhasil diupdate');
            redirect('pem_kettle');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pem_kettle');
            redirect('pem_kettle/edit/' . $uuid);
        }
    }

    private function formatJsonField($fieldData)
    {
        $formattedData = [];

        if (is_array($fieldData)) {
            foreach ($fieldData as $key => $value) {
                if (preg_match('/^JenisBahan(\d+)$/', $key, $matches)) {
                    $formattedData[$key] = htmlspecialchars($value);
                }
            }
        }

        return json_encode($formattedData, JSON_UNESCAPED_SLASHES);
    }


    public function hapus($uuid)
    {
        $delete = $this->pem_kettle_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pem_kettle berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pem_kettle');
        }
        redirect('pem_kettle');
    }

    public function print_excel($uuid)
    {
        // Load the data based on UUID (from your database or other source)
        $data = $this->pem_kettle_model->get_by_uuid($uuid);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 07 Pemeriksaan Pemasakan Steam Kettle (Update).xls'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Check if data is available
        if (!empty($data)) {
            // Fill the sheet with the data
            $sheet->setCellValue('C5', $data->date ?? '');
            $sheet->setCellValue('T5', $data->shift ?? '');
            $sheet->setCellValue('C7', $data->nama_produk ?? '');
            $sheet->setCellValue('C8', $data->jenis_produk ?? '');
            $sheet->setCellValue('C9', $data->kode_produksi ?? '');
            $sheet->setCellValue('C10', $data->waktu_start_stop ?? '');
            $sheet->setCellValue('C11', $data->mesin ?? '');
            $sheet->setCellValue('A17', $data->waktu ?? '');
            $sheet->setCellValue('B17', $data->tahapan_proses ?? '');
            $sheet->setCellValue('C17', $data->formulasike ?? '');
            $sheet->setCellValue('D17', $data->jenis_bahan ?? '');
            $sheet->setCellValue('E17', $data->jumlah_standar ?? '');
            $sheet->setCellValue('F17', $data->jumlah_aktual ?? '');
            $sheet->setCellValue('G17', $data->sensori ?? '');
            $sheet->setCellValue('H17', $data->lama_proses ?? '');
            $sheet->setCellValue('I17', $data->mixing_paddle ?? '');
            $sheet->setCellValue('J17', $data->pressure ?? '');
            $sheet->setCellValue('K17', $data->temperature ?? '');
            $sheet->setCellValue('L17', $data->target_temperature ?? '');
            $sheet->setCellValue('M17', $data->actual_temperature ?? '');
            $sheet->setCellValue('N17', $data->suhu_pusat_produk ?? '');
            $sheet->setCellValue('O17', $data->organoleptik_warna ?? '');
            $sheet->setCellValue('P17', $data->organoleptik_aroma ?? '');
            $sheet->setCellValue('Q17', $data->organoleptik_rasa ?? '');
            $sheet->setCellValue('R17', $data->organoleptik_tekstur ?? '');
            $sheet->setCellValue('T17', $data->catatan_kanan ?? '');
            $sheet->setCellValue('C46', $data->catatan ?? '');

        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pem_kettle_Report.xls"');
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
    $filePath = FCPATH . 'assets/excel/QR 07 Pemeriksaan Pemasakan Steam Kettle (Update).xls'; // Path to your template

    // Load your Excel template
    $spreadsheet = IOFactory::load($filePath);

    // Get active sheet from the loaded template
    $sheet = $spreadsheet->getActiveSheet();

    // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
    $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

    // Variables to track if date has already been set and to hold unique shift values
    $dateSet = false;
    $nama_produkSet = false;
    $jenis_produkSet = false;
    $kode_produksiSet = false;
    $waktu_start_stopSet = false;
    $mesinSet = false;
    $shiftArray = []; // Array to hold unique shift values
    $catatanString = ''; // Initialize catatan string to hold concatenated values

    // Array to store the data for sorting later
    $allData = [];

    // Starting row for the main data (A17 onwards)
    $startingRow = 17;

    // Check if there are selected UUIDs
    if (!empty($selected_uuids)) {
        // Loop through each selected UUID and collect data
        foreach ($selected_uuids as $uuid) {
            $data = $this->pem_kettle_model->get_by_uuid($uuid);
            if (!empty($data)) {
                $allData[] = $data; // Collect the data in an array for sorting later
            }
        }

        // Sort the collected data by 'created_at'
        usort($allData, function ($a, $b) {
            return strtotime($a->created_at) - strtotime($b->created_at);
        });

        $previous_formulasike = ''; // Variable to track the previous formulasike value

        // Now loop through the sorted data and process it
        foreach ($allData as $data) {
            // Set date once, or replace if new data is provided
            if (!$dateSet || !empty($data->date)) {
                $sheet->setCellValue('C5', $data->date ?? '');
                $dateSet = true; // Mark date as set
            }

            if (!$nama_produkSet || !empty($data->nama_produk)) {
                $sheet->setCellValue('C7', $data->nama_produk ?? '');
                $nama_produkSet = true; // Mark shift as set
            }

            if (!$jenis_produkSet || !empty($data->jenis_produk)) {
                $sheet->setCellValue('C8', $data->jenis_produk ?? '');
                $jenis_produkSet = true; // Mark shift as set
            }

            if (!$kode_produksiSet || !empty($data->kode_produksi)) {
                $sheet->setCellValue('C9', $data->kode_produksi ?? '');
                $kode_produksiSet = true; // Mark shift as set
            }

            if (!$waktu_start_stopSet || !empty($data->waktu_start_stop)) {
                $sheet->setCellValue('C10', $data->waktu_start_stop ?? '');
                $waktu_start_stopSet = true; // Mark shift as set
            }

            if (!$mesinSet || !empty($data->mesin)) {
                $sheet->setCellValue('C11', $data->mesin ?? '');
                $mesinSet = true; // Mark shift as set
            }

            // Append unique shift values to the shift array if not already added
            if (!empty($data->shift) && !in_array($data->shift, $shiftArray)) {
                $shiftArray[] = $data->shift; // Only add unique shift values
            }

            // Check if the current formulasike is different from the previous one
            if ($data->formulasike !== $previous_formulasike) {
                // If it is, write it to the cell above jenis_bahan
                $sheet->setCellValue('C' . $startingRow, $data->formulasike ?? ''); // Write formulasi ke
                $previous_formulasike = $data->formulasike; // Update previous_formulasike to current one
                $startingRow++; // Move to the next row for jenis bahan
            }

            // Fill the sheet with the main data starting at the current row
            $sheet->setCellValue('A' . $startingRow, $data->waktu ?? '');
            $sheet->setCellValue('B' . $startingRow, $data->tahapan_proses ?? '');
            $sheet->setCellValue('C' . $startingRow, $data->jenis_bahan ?? '');
            $sheet->setCellValue('D' . $startingRow, $data->jumlah_standar ?? '');
            $sheet->setCellValue('E' . $startingRow, $data->jumlah_aktual ?? '');
            $sheet->setCellValue('F' . $startingRow, $data->sensori ?? '');
            $sheet->setCellValue('G' . $startingRow, $data->lama_proses ?? '');
            $sheet->setCellValue('H' . $startingRow, $data->mixing_paddle_on ?? '');
            $sheet->setCellValue('I' . $startingRow, $data->mixing_paddle_off ?? '');
            $sheet->setCellValue('J' . $startingRow, $data->pressure ?? '');
            $sheet->setCellValue('K' . $startingRow, $data->temperature ?? '');
            $sheet->setCellValue('L' . $startingRow, $data->target_temperature ?? '');
            $sheet->setCellValue('M' . $startingRow, $data->actual_temperature ?? '');
            $sheet->setCellValue('N' . $startingRow, $data->suhu_pusat_produk ?? '');
            $sheet->setCellValue('O' . $startingRow, $data->organoleptik_warna ?? '');
            $sheet->setCellValue('P' . $startingRow, $data->organoleptik_aroma ?? '');
            $sheet->setCellValue('Q' . $startingRow, $data->organoleptik_rasa ?? '');
            $sheet->setCellValue('R' . $startingRow, $data->organoleptik_tekstur ?? '');
            $sheet->setCellValue('T' . $startingRow, $data->catatan_kanan ?? '');

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
        $sheet->setCellValue('T5', implode(', ', $shiftArray)); // For unique shifts, joined by commas
        $sheet->setCellValue('C46', $catatanString); // For concatenated catatan in cell C46
    }

    // Set the writer to Xls and output the file
    $writer = IOFactory::createWriter($spreadsheet, 'Xls');

    // Set headers to trigger download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Pem_Kettle_Multiple_Report.xls"');
    header('Cache-Control: max-age=0');

    // Write the file to the output
    $writer->save('php://output');
}


    
}
?>