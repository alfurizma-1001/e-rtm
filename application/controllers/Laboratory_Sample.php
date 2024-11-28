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
class laboratory_sample extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laboratory_sample_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'laboratory_sample' => $this->laboratory_sample_model->get_all(),
            'active_nav' => 'laboratory_sample',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/laboratory_sample');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->laboratory_sample_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data laboratory_sample berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data laboratory_sample");
            }

            // Redirect after handling the form submission
            redirect('laboratory_sample');
        }

        // Prepare data to load the form view
        $data = array(
            'laboratory_sample' => $this->laboratory_sample_model->get_all(),
            'active_nav' => 'laboratory_sample',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/laboratory_sample-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['laboratory_sample'] = $this->laboratory_sample_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('warehouse/laboratory_sample-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'plant' => $this->input->post('plant'),
            'sample_type' => $this->input->post('sample_type'),
            'date' => $this->input->post('date'),
            'sample_storage_frozen' => $this->input->post('sample_storage_frozen'),
            'sample_storage_chilled' => $this->input->post('sample_storage_chilled'),
            'sample_storage_other' => $this->input->post('sample_storage_other'),
            'microbiological' => $this->input->post('microbiological'),
            'Antibiotic_residues' => $this->input->post('Antibiotic_residues'),
            'Enterococcus' => $this->input->post('Enterococcus'),
            'TPC' => $this->input->post('TPC'),
            'Salmonella' => $this->input->post('Salmonella'),
            'Coliform' => $this->input->post('Coliform'),
            'Yeast' => $this->input->post('Yeast'),
            'coli' => $this->input->post('coli'),
            'Clostridium' => $this->input->post('Clostridium'),
            'aureus' => $this->input->post('aureus'),
            'Other' => $this->input->post('Other'),
            'Chemical' => $this->input->post('Chemical'),
            'Pesticide' => $this->input->post('Pesticide'),
            'Peroxide' => $this->input->post('Peroxide'),
            'pH' => $this->input->post('pH'),
            'Ash' => $this->input->post('Ash'),
            'Fatty' => $this->input->post('Fatty'),
            'Salinity' => $this->input->post('Salinity'),
            'Protein' => $this->input->post('Protein'),
            'Moisture' => $this->input->post('Moisture'),
            'Other2' => $this->input->post('Other2'),
            'description' => $this->input->post('description'),
            'production_code' => $this->input->post('production_code'),
            'best_before' => $this->input->post('best_before'),
            'quantity' => $this->input->post('quantity'),
            'remarks' => $this->input->post('remarks'),
            'sample_checking_correct' => $this->input->post('sample_checking_correct'),
            'sample_checking_incorrect' => $this->input->post('sample_checking_incorrect')
        );

        $update = $this->laboratory_sample_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data laboratory_sample berhasil diupdate');
            redirect('laboratory_sample');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data laboratory_sample');
            redirect('laboratory_sample/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->laboratory_sample_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data laboratory_sample berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data laboratory_sample');
        }
        redirect('laboratory_sample');
    }

    public function print_multiple_excel()
    {
        // Get the selected UUIDs from the query string (GET request)
        $selected_uuids = $this->input->get('uuids');

        // Explode the UUIDs into an array
        $selected_uuids = explode(',', $selected_uuids);

        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/LM LB 01 Lab Sample Submission Report.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Starting row for the main data (A11 onwards)
        $startingRow = 22;

        // Check if there are selected UUIDs
        if (!empty($selected_uuids)) {
            $allData = [];

            // Collect the data for each UUID
            foreach ($selected_uuids as $uuid) {
                $data = $this->laboratory_sample_model->get_by_uuid($uuid);
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
                $plantSet = false;
                if (!$plantSet || !empty($data->plant)) {
                    $sheet->setCellValue('D6', $data->plant ?? '');
                    $plantSet = true;
                }

                $sample_typeSet = false;
                if (!$sample_typeSet || !empty($data->sample_type)) {
                    $sheet->setCellValue('D7', $data->sample_type ?? '');
                    $sample_typeSet = true;
                }

                $dateSet = false;
                if (!$dateSet || !empty($data->date)) {
                    $sheet->setCellValue('D8', $data->date ?? '');
                    $dateSet = true;
                }

                $sample_storage_frozenSet = false;
                if (!$sample_storage_frozenSet || !empty($data->sample_storage_frozen)) {
                    $sheet->setCellValue('E10', $data->sample_storage_frozen ?? '');
                    $sample_storage_frozenSet = true;
                }

                $sample_storage_chilledSet = false;
                if (!$sample_storage_chilledSet || !empty($data->sample_storage_chilled)) {
                    $sheet->setCellValue('H10', $data->sample_storage_chilled ?? '');
                    $sample_storage_chilledSet = true;
                }

                $sample_storage_otherSet = false;
                if (!$sample_storage_otherSet || !empty($data->sample_storage_other)) {
                    $sheet->setCellValue('J10', $data->sample_storage_other ?? '');
                    $sample_storage_otherSet = true;
                }

                $microbiologicalSet = false;
                if (!$microbiologicalSet || !empty($data->microbiological)) {
                    $sheet->setCellValue('A14', $data->microbiological ?? '');
                    $microbiologicalSet = true;
                }

                $antibiotic_residuesSet = false;
                if (!$antibiotic_residuesSet || !empty($data->Antibiotic_residues)) {
                    $sheet->setCellValue('C14', $data->Antibiotic_residues ?? '');
                    $antibiotic_residuesSet = true;
                }

                $enterococcusSet = false;
                if (!$enterococcusSet || !empty($data->Enterococcus)) {
                    $sheet->setCellValue('C15', $data->Enterococcus ?? '');
                    $enterococcusSet = true;
                }

                $tpcSet = false;
                if (!$tpcSet || !empty($data->TPC)) {
                    $sheet->setCellValue('E14', $data->TPC ?? '');
                    $tpcSet = true;
                }

                $salmonellaSet = false;
                if (!$salmonellaSet || !empty($data->Salmonella)) {
                    $sheet->setCellValue('E15', $data->Salmonella ?? '');
                    $salmonellaSet = true;
                }

                $coliformSet = false;
                if (!$coliformSet || !empty($data->Coliform)) {
                    $sheet->setCellValue('G14', $data->Coliform ?? '');
                    $coliformSet = true;
                }

                $yeastSet = false;
                if (!$yeastSet || !empty($data->Yeast)) {
                    $sheet->setCellValue('G15', $data->Yeast ?? '');
                    $yeastSet = true;
                }

                $coliSet = false;
                if (!$coliSet || !empty($data->coli)) {
                    $sheet->setCellValue('J14', $data->coli ?? '');
                    $coliSet = true;
                }

                $clostridiumSet = false;
                if (!$clostridiumSet || !empty($data->Clostridium)) {
                    $sheet->setCellValue('J15', $data->Clostridium ?? '');
                    $clostridiumSet = true;
                }

                $aureusSet = false;
                if (!$aureusSet || !empty($data->aureus)) {
                    $sheet->setCellValue('L14', $data->aureus ?? '');
                    $aureusSet = true;
                }

                $otherSet = false;
                if (!$otherSet || !empty($data->Other)) {
                    $sheet->setCellValue('L15', $data->Other ?? '');
                    $otherSet = true;
                }

                $chemicalSet = false;
                if (!$chemicalSet || !empty($data->Chemical)) {
                    $sheet->setCellValue('A17', $data->Chemical ?? '');
                    $chemicalSet = true;
                }

                $pesticideSet = false;
                if (!$pesticideSet || !empty($data->Pesticide)) {
                    $sheet->setCellValue('C17', $data->Pesticide ?? '');
                    $pesticideSet = true;
                }

                $peroxideSet = false;
                if (!$peroxideSet || !empty($data->Peroxide)) {
                    $sheet->setCellValue('C18', $data->Peroxide ?? '');
                    $peroxideSet = true;
                }

                $pHSet = false;
                if (!$pHSet || !empty($data->pH)) {
                    $sheet->setCellValue('E17', $data->pH ?? '');
                    $pHSet = true;
                }

                $ashSet = false;
                if (!$ashSet || !empty($data->Ash)) {
                    $sheet->setCellValue('E18', $data->Ash ?? '');
                    $ashSet = true;
                }

                $fattySet = false;
                if (!$fattySet || !empty($data->Fatty)) {
                    $sheet->setCellValue('G17', $data->Fatty ?? '');
                    $fattySet = true;
                }

                $salinitySet = false;
                if (!$salinitySet || !empty($data->Salinity)) {
                    $sheet->setCellValue('G18', $data->Salinity ?? '');
                    $salinitySet = true;
                }

                $proteinSet = false;
                if (!$proteinSet || !empty($data->Protein)) {
                    $sheet->setCellValue('J17', $data->Protein ?? '');
                    $proteinSet = true;
                }

                $moistureSet = false;
                if (!$moistureSet || !empty($data->Moisture)) {
                    $sheet->setCellValue('L17', $data->Moisture ?? '');
                    $moistureSet = true;
                }

                $other2Set = false;
                if (!$other2Set || !empty($data->Other2)) {
                    $sheet->setCellValue('J18', $data->Other2 ?? '');
                    $other2Set = true;
                }



                $sample_checking_correctSet = false;
                if (!$sample_checking_correctSet || !empty($data->sample_checking_correct)) {
                    $sheet->setCellValue('C52', $data->sample_checking_correct ?? '');
                    $sample_checking_correctSet = true;
                }

                $sample_checking_incorrectSet = false;
                if (!$sample_checking_incorrectSet || !empty($data->sample_checking_incorrect)) {
                    $sheet->setCellValue('E52', $data->sample_checking_incorrect ?? '');
                    $sample_checking_incorrectSet = true;
                }



                // Fill the sheet with the main data starting at the current row
                $sheet->setCellValue('A' . $startingRow, $no++);

                if (!function_exists('setCellValueWithCommas')) {
                    function setCellValueWithCommas($sheet, $column, $startingRow, $data)
                    {
                        if (!empty($data)) {
                            // Ensure there is no leading/trailing space in the input
                            $data = trim($data);
                            // Split data by commas and trim each part
                            $values = array_map('trim', explode(',', $data));

                            // Handle the splitting into multiple rows
                            foreach ($values as $index => $value) {
                                // Ensure $startingRow is incremented for each value
                                if ($value !== '') {
                                    $sheet->setCellValue($column . ($startingRow + $index), $value); // Use $startingRow + $index
                                }
                            }
                        }
                    }
                }

                // Example usage with your specific data
                setCellValueWithCommas($sheet, 'B', $startingRow, $data->description ?? '');
                setCellValueWithCommas($sheet, 'E', $startingRow, $data->production_code ?? '');
                setCellValueWithCommas($sheet, 'G', $startingRow, $data->best_before ?? '');
                setCellValueWithCommas($sheet, 'I', $startingRow, $data->quantity ?? '');
                setCellValueWithCommas($sheet, 'K', $startingRow, $data->remarks ?? '');




                // Move to the next row for the main data
                $startingRow++;
            }



        }

        // Set the writer to Xls and output the file
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        // Set headers to trigger download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="laboratory_sample_Multiple_Report.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file to the output
        $writer->save('php://output');
    }

    public function print_excel($uuid)
    {
        // Correct the path to point to the local template on your server
        $filePath = FCPATH . 'assets/excel/LM LB 01 Lab Sample Submission Report.xlsx'; // Path to your template

        // Load your Excel template
        $spreadsheet = IOFactory::load($filePath);

        // Get active sheet from the loaded template
        $sheet = $spreadsheet->getActiveSheet();

        // Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
        $sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

        // Variables to track if date and shift have already been set
        $catatanArray = []; // To store concatenated catatan

        // Starting row for the main data (A11 onwards)
        $startingRow = 22;

        // Get the data for the selected UUID
        $data = $this->laboratory_sample_model->get_by_uuid($uuid);

        if (!empty($data)) {
            $no = 1; // Set a counter for numbering rows

            // Process the data
            $plantSet = false;
            if (!$plantSet || !empty($data->plant)) {
                $sheet->setCellValue('D6', $data->plant ?? '');
                $plantSet = true;
            }

            $sample_typeSet = false;
            if (!$sample_typeSet || !empty($data->sample_type)) {
                $sheet->setCellValue('D7', $data->sample_type ?? '');
                $sample_typeSet = true;
            }

            $dateSet = false;
            if (!$dateSet || !empty($data->date)) {
                $sheet->setCellValue('D8', $data->date ?? '');
                $dateSet = true;
            }

            $sample_storage_frozenSet = false;
            if (!$sample_storage_frozenSet || !empty($data->sample_storage_frozen)) {
                $sheet->setCellValue('E10', $data->sample_storage_frozen ?? '');
                $sample_storage_frozenSet = true;
            }

            $sample_storage_chilledSet = false;
            if (!$sample_storage_chilledSet || !empty($data->sample_storage_chilled)) {
                $sheet->setCellValue('H10', $data->sample_storage_chilled ?? '');
                $sample_storage_chilledSet = true;
            }

            $sample_storage_otherSet = false;
            if (!$sample_storage_otherSet || !empty($data->sample_storage_other)) {
                $sheet->setCellValue('J10', $data->sample_storage_other ?? '');
                $sample_storage_otherSet = true;
            }

            $microbiologicalSet = false;
            if (!$microbiologicalSet || !empty($data->microbiological)) {
                $sheet->setCellValue('A14', $data->microbiological ?? '');
                $microbiologicalSet = true;
            }

            $antibiotic_residuesSet = false;
            if (!$antibiotic_residuesSet || !empty($data->Antibiotic_residues)) {
                $sheet->setCellValue('C14', $data->Antibiotic_residues ?? '');
                $antibiotic_residuesSet = true;
            }

            $enterococcusSet = false;
            if (!$enterococcusSet || !empty($data->Enterococcus)) {
                $sheet->setCellValue('C15', $data->Enterococcus ?? '');
                $enterococcusSet = true;
            }

            $tpcSet = false;
            if (!$tpcSet || !empty($data->TPC)) {
                $sheet->setCellValue('E14', $data->TPC ?? '');
                $tpcSet = true;
            }

            $salmonellaSet = false;
            if (!$salmonellaSet || !empty($data->Salmonella)) {
                $sheet->setCellValue('E15', $data->Salmonella ?? '');
                $salmonellaSet = true;
            }

            $coliformSet = false;
            if (!$coliformSet || !empty($data->Coliform)) {
                $sheet->setCellValue('G14', $data->Coliform ?? '');
                $coliformSet = true;
            }

            $yeastSet = false;
            if (!$yeastSet || !empty($data->Yeast)) {
                $sheet->setCellValue('G15', $data->Yeast ?? '');
                $yeastSet = true;
            }

            $coliSet = false;
            if (!$coliSet || !empty($data->coli)) {
                $sheet->setCellValue('J14', $data->coli ?? '');
                $coliSet = true;
            }

            $clostridiumSet = false;
            if (!$clostridiumSet || !empty($data->Clostridium)) {
                $sheet->setCellValue('J15', $data->Clostridium ?? '');
                $clostridiumSet = true;
            }

            $aureusSet = false;
            if (!$aureusSet || !empty($data->aureus)) {
                $sheet->setCellValue('L14', $data->aureus ?? '');
                $aureusSet = true;
            }

            $otherSet = false;
            if (!$otherSet || !empty($data->Other)) {
                $sheet->setCellValue('L15', $data->Other ?? '');
                $otherSet = true;
            }

            $chemicalSet = false;
            if (!$chemicalSet || !empty($data->Chemical)) {
                $sheet->setCellValue('A17', $data->Chemical ?? '');
                $chemicalSet = true;
            }

            $pesticideSet = false;
            if (!$pesticideSet || !empty($data->Pesticide)) {
                $sheet->setCellValue('C17', $data->Pesticide ?? '');
                $pesticideSet = true;
            }

            $peroxideSet = false;
            if (!$peroxideSet || !empty($data->Peroxide)) {
                $sheet->setCellValue('C18', $data->Peroxide ?? '');
                $peroxideSet = true;
            }

            $pHSet = false;
            if (!$pHSet || !empty($data->pH)) {
                $sheet->setCellValue('E17', $data->pH ?? '');
                $pHSet = true;
            }

            $ashSet = false;
            if (!$ashSet || !empty($data->Ash)) {
                $sheet->setCellValue('E18', $data->Ash ?? '');
                $ashSet = true;
            }

            $fattySet = false;
            if (!$fattySet || !empty($data->Fatty)) {
                $sheet->setCellValue('G17', $data->Fatty ?? '');
                $fattySet = true;
            }

            $salinitySet = false;
            if (!$salinitySet || !empty($data->Salinity)) {
                $sheet->setCellValue('G18', $data->Salinity ?? '');
                $salinitySet = true;
            }

            $proteinSet = false;
            if (!$proteinSet || !empty($data->Protein)) {
                $sheet->setCellValue('J17', $data->Protein ?? '');
                $proteinSet = true;
            }

            $moistureSet = false;
            if (!$moistureSet || !empty($data->Moisture)) {
                $sheet->setCellValue('L17', $data->Moisture ?? '');
                $moistureSet = true;
            }

            $other2Set = false;
            if (!$other2Set || !empty($data->Other2)) {
                $sheet->setCellValue('J18', $data->Other2 ?? '');
                $other2Set = true;
            }

            $sample_checking_correctSet = false;
            if (!$sample_checking_correctSet || !empty($data->sample_checking_correct)) {
                $sheet->setCellValue('C52', $data->sample_checking_correct ?? '');
                $sample_checking_correctSet = true;
            }

            $sample_checking_incorrectSet = false;
            if (!$sample_checking_incorrectSet || !empty($data->sample_checking_incorrect)) {
                $sheet->setCellValue('E52', $data->sample_checking_incorrect ?? '');
                $sample_checking_incorrectSet = true;
            }

            // Fill the sheet with the main data starting at the current row
            $sheet->setCellValue('A' . $startingRow, $no++);

            if (!function_exists('setCellValueWithCommas')) {
                function setCellValueWithCommas($sheet, $column, $startingRow, $data)
                {
                    if (!empty($data)) {
                        // Ensure there is no leading/trailing space in the input
                        $data = trim($data);
                        // Split data by commas and trim each part
                        $values = array_map('trim', explode(',', $data));

                        // Handle the splitting into multiple rows
                        foreach ($values as $index => $value) {
                            // Ensure $startingRow is incremented for each value
                            if ($value !== '') {
                                $sheet->setCellValue($column . ($startingRow + $index), $value); // Use $startingRow + $index
                            }
                        }
                    }
                }
            }

            // Example usage with your specific data
            setCellValueWithCommas($sheet, 'B', $startingRow, $data->description ?? '');
            setCellValueWithCommas($sheet, 'E', $startingRow, $data->production_code ?? '');
            setCellValueWithCommas($sheet, 'G', $startingRow, $data->best_before ?? '');
            setCellValueWithCommas($sheet, 'I', $startingRow, $data->quantity ?? '');
            setCellValueWithCommas($sheet, 'K', $startingRow, $data->remarks ?? '');

            // Set the writer to Xls and output the file
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

            // Set headers to trigger download
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="laboratory_sample_Single_Report.xlsx"');
            header('Cache-Control: max-age=0');

            // Output the file to the browser
            $writer->save('php://output');
        } else {
            // Handle the case where no data is found for the provided UUID
            echo "Data not found.";
        }
    }


}
?>