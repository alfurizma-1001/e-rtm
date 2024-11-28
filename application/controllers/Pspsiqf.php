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
class Pspsiqf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pspsiqf_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'pspsiqf' => $this->pspsiqf_model->get_all(),
            'active_nav' => 'pspsiqf',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/pspsiqf');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->pspsiqf_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data pspsiqf berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data pspsiqf");
            }

            // Redirect after handling the form submission
            redirect('pspsiqf');
        }

        // Prepare data to load the form view
        $data = array(
            'pspsiqf' => $this->pspsiqf_model->get_all(),
            'active_nav' => 'pspsiqf',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/pspsiqf-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['pspsiqf'] = $this->pspsiqf_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/pspsiqf-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'iqf_no' => $this->input->post('iqf_no'),
            'pukul' => $this->input->post('pukul'),
            'produk' => $this->input->post('produk'),
            'batch_no' => $this->input->post('batch_no'),
            'stdct' => $this->input->post('stdct'),
            'suhu_pusat_produk_1' => $this->input->post('suhu_pusat_produk_1'),
            'suhu_pusat_produk_2' => $this->input->post('suhu_pusat_produk_2'),
            'suhu_pusat_produk_3' => $this->input->post('suhu_pusat_produk_3'),
            'suhu_pusat_produk_4' => $this->input->post('suhu_pusat_produk_4'),
            'suhu_pusat_produk_5' => $this->input->post('suhu_pusat_produk_5'),
            'suhu_pusat_produk_6' => $this->input->post('suhu_pusat_produk_6'),
            'suhu_pusat_produk_7' => $this->input->post('suhu_pusat_produk_7'),
            'suhu_pusat_produk_8' => $this->input->post('suhu_pusat_produk_8'),
            'suhu_pusat_produk_9' => $this->input->post('suhu_pusat_produk_9'),
            'suhu_pusat_produk_10' => $this->input->post('suhu_pusat_produk_10'),
            'suhu_pusat_produk_x' => $this->input->post('suhu_pusat_produk_x'),
            'problem' => $this->input->post('problem'),
            'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->pspsiqf_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data pspsiqf berhasil diupdate');
            redirect('pspsiqf');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data pspsiqf');
            redirect('pspsiqf/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->pspsiqf_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data pspsiqf berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data pspsiqf');
        }
        redirect('pspsiqf');
    }

    public function print_multiple_excel()
	{
		// Get the selected UUIDs from the query string (GET request)
		$selected_uuids = $this->input->get('uuids');

		// Explode the UUIDs into an array
		$selected_uuids = explode(',', $selected_uuids);

		// Correct the path to point to the local template on your server
		$filePath = FCPATH . 'assets/excel/QR 11 Pemeriksaan Suhu Produk setelah IQF.xlsx'; // Path to your template

		// Load your Excel template
		$spreadsheet = IOFactory::load($filePath);

		// Get active sheet from the loaded template
		$sheet = $spreadsheet->getActiveSheet();

		// Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
		$sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

		// Variables to track if date and shift have already been set
		$dateSet = false;
		$shiftArray = []; // To store unique shifts
        $iqf_noArray = [];
		$catatanArray = []; // To store concatenated catatan

		// Starting row for the main data (A11 onwards)
		$startingRow = 9;

		// Check if there are selected UUIDs
		if (!empty($selected_uuids)) {
			$allData = [];

			// Collect the data for each UUID
			foreach ($selected_uuids as $uuid) {
				$data = $this->pspsiqf_model->get_by_uuid($uuid);
				if (!empty($data)) {
					$allData[] = $data;
				}
			}

			// Sort the data by 'created_at' to ensure earlier data comes first
			usort($allData, function ($a, $b) {
				return strtotime($a->created_at) - strtotime($b->created_at);
			});

			// Process the sorted data
			foreach ($allData as $data) {
				// Set date only once
				if (!$dateSet || !empty($data->date)) {
					$sheet->setCellValue('B5', $data->date ?? '');
					$dateSet = true; // Mark date as set
				}

				// Collect unique shift values into an array
				if (!empty($data->shift)) {
					$shiftArray[] = $data->shift;
				}

                if (!empty($data->iqf_no)) {
					$iqf_noArray[] = $data->iqf_no;
				}

				// Collect catatan values into an array
				if (!empty($data->catatan)) {
					$catatanArray[] = $data->catatan;
				}

				// Fill the sheet with the main data starting at the current row
				$sheet->setCellValue('A' . $startingRow, $data->pukul ?? '');
				$sheet->setCellValue('B' . $startingRow, $data->produk ?? '');
				$sheet->setCellValue('C' . $startingRow, $data->batch_no ?? '');
				$sheet->setCellValue('D' . $startingRow, $data->stdct ?? '');
                $sheet->setCellValue('E' . $startingRow, $data->suhu_pusat_produk_1 ?? '');
                $sheet->setCellValue('F' . $startingRow, $data->suhu_pusat_produk_2 ?? '');
                $sheet->setCellValue('G' . $startingRow, $data->suhu_pusat_produk_3 ?? '');
                $sheet->setCellValue('H' . $startingRow, $data->suhu_pusat_produk_4 ?? '');
                $sheet->setCellValue('I' . $startingRow, $data->suhu_pusat_produk_5 ?? '');
                $sheet->setCellValue('J' . $startingRow, $data->suhu_pusat_produk_6 ?? '');
                $sheet->setCellValue('K' . $startingRow, $data->suhu_pusat_produk_7 ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->suhu_pusat_produk_8 ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->suhu_pusat_produk_9 ?? '');
                $sheet->setCellValue('N' . $startingRow, $data->suhu_pusat_produk_10 ?? '');
                $sheet->setCellValue('O' . $startingRow, $data->suhu_pusat_produk_x ?? '');
                $sheet->setCellValue('P' . $startingRow, $data->problem ?? '');
                $sheet->setCellValue('Q' . $startingRow, $data->tindakan_koreksi ?? '');
            

				// Move to the next row for the main data
				$startingRow++;
			}

			// After processing all data, concatenate unique shift values and set them in the sheet
			$uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
			$sheet->setCellValue('D5', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

            $uniqueIqf_no = array_unique($iqf_noArray); // Remove duplicate shifts
			$sheet->setCellValue('F5', implode(', ', $uniqueIqf_no)); // Set concatenated shifts in B6

			// Concatenate all catatan values and set them in the sheet
			$sheet->setCellValue('B24', implode(', ', $catatanArray)); // Set concatenated catatan in B22
		}

		// Set the writer to Xls and output the file
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

		// Set headers to trigger download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="QR 11 Pemeriksaan Suhu Produk setelah IQF_Multiple_Report.xlsx"');
		header('Cache-Control: max-age=0');

		// Write the file to the output
		$writer->save('php://output');
	}

}
?>