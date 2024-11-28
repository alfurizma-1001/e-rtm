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
class Sanitasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sanitasi_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'sanitasi' => $this->sanitasi_model->get_all(),
            'active_nav' => 'sanitasi',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('sanitasi/sanitasi');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $rules = $this->sanitasi_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $insert = $this->sanitasi_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data Sanitasi Kebersihan ruangan berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data Sanitasi Kebersihan ruangan");
            }
            redirect('sanitasi');
        }

        $data = array(
            'sanitasi' => $this->sanitasi_model->get_all(),
            'active_nav' => 'sanitasi',
        );
       

        $this->load->view('partials/head', $data);
        $this->load->view('sanitasi/sanitasi-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['sanitasi'] = $this->sanitasi_model->get_by_uuid($uuid);
        
        $this->load->view('partials/head', $data);
        $this->load->view('sanitasi/sanitasi-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        // Form validation rules
        $rules = $this->sanitasi_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {

            

            $this->load->view('partials/head');
            $this->load->view('sanitasi/sanitasi-edit');
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
                'keterangan' => $this->input->post('keterangan'),
                'produksi' => $this->input->post('produksi'),
                'catatan' => $this->input->post('catatan')
            );

            $update = $this->sanitasi_model->update($uuid, $data);

            if ($update) {
                $this->session->set_flashdata('success_msg', 'Data sanitasi berhasil diupdate');
                redirect('sanitasi');
            } else {
                $this->session->set_flashdata('error_msg', 'Gagal mengupdate data sanitasi');
                redirect('sanitasi/edit/' . $uuid);
            }
        }
    }

    public function hapus($uuid)
    {
        $delete = $this->sanitasi_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data sanitasi berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data sanitasi');
        }
        redirect('sanitasi');
    }

    

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/QR 01 Kebersihan Ruangan, Mesin dan Peralatan Produksi.xls'; // Path to your template

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

        // Area row mappings
        $areaRowMappings = [
            'CHILLROOM RM' => 11,
            'COLD STORAGE 1 RM' => 21,
            'COLD STORAGE 2 RM' => 31,
            'SEASONING' => 41,
            'PREPARATION ROOM' => 53,
            'COOKING' => 65,
            'FILLING-ROOM' => 79,
            'RICE COOKING & NOODLE BOILING ROOM' => 110,
            'NOODLE MAKING ROOM' => 123,
            'TOPPING AREA' => 135,
            'PACKING' => 144,
            'IQF' => 159,
            'COLD STORAGE FG' => 165,
            'DRY STORE' => 175
            // Add more area mappings here as needed
        ];

        // Area-specific keys for conditions, problems, and corrective actions
        $areaKeys = [
            'CHILLROOM RM' => ['Lantai', 'Dinding', 'Kurtain', 'Pintu', 'Langit-langit', 'AC', 'RakPenampungProduk', 'LampudanCover'],
            'COLD STORAGE 1 RM' => ['Lantai', 'Dinding', 'Kurtain', 'Pintu', 'Langit-langit', 'AC', 'RakPenampungProduk', 'LampudanCover'],
            'COLD STORAGE 2 RM' => ['Lantai', 'Dinding', 'Kurtain', 'Pintu', 'Langit-langit', 'AC', 'RakPenampungProduk', 'LampudanCover'],
            'SEASONING' => ["Lantai", "Dinding", "Kurtain", "Pintu", "Langit-langit", "AC", "RakPenampungProduk", "LampudanCover", "PemisahanAlergenDanNon", "TerdapatTagging"],
            'PREPARATION ROOM' => ["Lantai", "Dinding", "Pintu", "Langit-langit", "SaluranAirBuangan", "LampudanCover", "VegetableWashingMachine", "Slicer", "PeelingMachine", "VacuumTumbler"],
            'COOKING' => ["Lantai","Dinding","Pintu","Langit-langit","SaluranAirBuangan","LampudanCover","AlcoCookingMixer","TitingKettle","Exhaust","StirFryer","Steamer","BowlCutter"],
            'FILLING-ROOM' => ["Lantai", "Dinding", "Pintu", "Langit-langit", "AC", "SaluranAirBuangan", "LampudanCover", "FillingMachine", "VacummCoolingMachine", "Sealer1", "Sealer2", "FillerManual1", "FM2"],
            'RICE COOKING & NOODLE BOILING ROOM' => ["Lantai", "Dinding", "Pintu", "Langit-langit", "SaluranAirBuangan", "LampudanCover", "RiceWasher", "RiceFillingMachine", "RiceCooker", "LineConveyor", "BWCS-Machine"],
            'NOODLE MAKING ROOM' => ["Lantai", "Dinding", "Pintu", "Langit-langit", "SaluranAirBuangan", "LampudanCover", "Vacuum-Mixer", "Aging-Machine", "Roller-Machine", "Cutting-Sitting"],
            'TOPPING AREA' => ["Lantai", "Dinding", "Pintu", "Langit-langit", "AC", "SaluranAirBuangan", "LampudanCover"],
            'PACKING' => ["Lantai", "Dinding", "Pintu", "Langit-langit", "AC", "SaluranAirBuangan", "LampudanCover", "PackingMachine", "TraySealer", "Metal-Rejector", "Xray-Rejector", "Line-Conveyor", "PrinterPlastik"],
            'IQF' => ["DindingLuar", "DindingDalam", "RuangdalamIqf", "ConveyorIQF"],
            'COLD STORAGE FG' => ["Lantai", "Dinding","Kurtain", "Pintu", "Langit-langit", "AC", "RakPenampungProduk", "LampudanCover"],
            'DRY STORE' => ["Lantai", "Dinding", "Kurtan", "Pintu", "Langit-langit", "AC", "RakPenampungProduk", "TerdapatTagging", "LampudanCover"],

            // Add other areas with their specific keys
        ];

        // Array to store the data for sorting later
        $allData = [];

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            // Loop through each selected UUID and collect data
            foreach ($selected_uuids as $uuid) {
                $data = $this->sanitasi_model->get_by_uuid($uuid);
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
                    // Set date in both C7 and C106
                    $sheet->setCellValue('C7', $data->date ?? '');
                    $sheet->setCellValue('C106', $data->date ?? '');
                    $dateSet = true; // Mark date as set
                }

                // Append unique shift values to the shift array if not already added
                if (!empty($data->shift) && !in_array($data->shift, $shiftArray)) {
                    $shiftArray[] = $data->shift; // Only add unique shift values
                }

                // Decode JSON data from 'kondisi', 'masalah', and 'tindakan_koreksi'
                $kondisi = json_decode($data->kondisi, true);
                $masalah = json_decode($data->masalah, true);
                $tindakan_koreksi = json_decode($data->tindakan_koreksi, true);

                // Determine the starting row based on the area
                $startingRow = $areaRowMappings[$data->area] ?? 11; // Default to 11 if area not found
                $keys = $areaKeys[$data->area] ?? []; // Get the specific keys for the area

                // Insert decoded 'kondisi' values (vertically)
                foreach ($keys as $index => $key) {
                    $value = $kondisi[$key] ?? '';
                    // Place in column D if "Oke", column E if "Tidak"
                    if ($value === 'Oke') {
                        $sheet->setCellValue('D' . ($startingRow + $index), $value);
                    } elseif ($value === 'Tidak') {
                        $sheet->setCellValue('E' . ($startingRow + $index), $value);
                    }
                }

                // Insert decoded 'masalah' values (vertically)
                foreach ($keys as $index => $key) {
                    $sheet->setCellValue('F' . ($startingRow + $index), $masalah[$key] ?? '');
                }

                // Insert decoded 'tindakan_koreksi' values (vertically)
                foreach ($keys as $index => $key) {
                    $sheet->setCellValue('G' . ($startingRow + $index), $tindakan_koreksi[$key] ?? '');
                }

                // Concatenate all catatan values into one string with a comma
                if (!empty($data->catatan)) {
                    if (!empty($catatanString)) {
                        $catatanString .= ', '; // Add comma if catatanString already has content
                    }
                    $catatanString .= $data->catatan; // Append the catatan value
                }
            }

            // After the loop, set the final unique shift values and concatenated catatan strings in the cells
            $sheet->setCellValue('D192', $catatanString); // For concatenated catatan in cell B23
         

        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Sanitasi_Multiple_Report.xls"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

}
?>