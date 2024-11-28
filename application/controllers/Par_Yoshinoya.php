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
class Par_Yoshinoya extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('par_yoshinoya_model');
		$this->load->library('form_validation');
		$this->load->model('login_model');
		if (!$this->login_model->current_user()) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'par_yoshinoya' => $this->par_yoshinoya_model->get_all(),
			// 'tanggal' => date('Y-m-d'),
			'active_nav' => 'par_yoshinoya',
		);

		$this->load->view('partials/head', $data);
		$this->load->view('cooking/par_yoshinoya');
		$this->load->view('partials/footer');
	}

	public function tambah()
	{
		$rules = $this->par_yoshinoya_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->par_yoshinoya_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', "Data Parameter Produk Saus Yoshinoya berhasil disimpan");
			} else {
				$this->session->set_flashdata('error_msg', "Gagal menyimpan data Parameter Produk Saus Yoshinoya");
			}
			redirect('par_yoshinoya');
		}

		$data = array(
			'par_yoshinoya' => $this->par_yoshinoya_model->get_all(),
			'active_nav' => 'par_yoshinoya',
		);

		$this->load->view('partials/head', $data);
		$this->load->view('cooking/par_yoshinoya-tambah', $data);
		$this->load->view('partials/footer');
	}
	public function edit($uuid)
	{
		$data['par_yoshinoya'] = $this->par_yoshinoya_model->get_by_uuid($uuid);

		$this->load->view('partials/head', $data);
		$this->load->view('cooking/par_yoshinoya-edit', $data);
		$this->load->view('partials/footer');
	}

	public function update()
	{
		// Form validation rules
		$rules = $this->par_yoshinoya_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('partials/head');
			$this->load->view('cooking/par_yoshinoya-edit');
			$this->load->view('partials/footer');
		} else {
			$uuid = $this->input->post('uuid');

			$data = array(
				'shift' => $this->input->post('shift'),
				'tanggal_produksi' => $this->input->post('tanggal_produksi'),
				'kode_produksi' => $this->input->post('kode_produksi'),
				'suhu_pengukuran' => $this->input->post('suhu_pengukuran'),
				'brix' => $this->input->post('brix'),
				'salt' => $this->input->post('salt'),
				'viscositas' => $this->input->post('viscositas'),
				'brookfield' => $this->input->post('brookfield'),
				'brookfield_setelah_frozen' => $this->input->post('brookfield_setelah_frozen'),
				'catatan' => $this->input->post('catatan')
			);


			$update = $this->par_yoshinoya_model->update($uuid, $data);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data par_yoshinoya berhasil diupdate');
				redirect('par_yoshinoya');
			} else {
				$this->session->set_flashdata('error_msg', 'Gagal mengupdate data par_yoshinoya');
				redirect('par_yoshinoya/edit/' . $uuid);
			}
		}
	}

	public function hapus($uuid)
	{
		$delete = $this->par_yoshinoya_model->delete($uuid);
		if ($delete) {
			$this->session->set_flashdata('success_msg', 'Data par_yoshinoya berhasil dihapus');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data par_yoshinoya');
		}
		redirect('par_yoshinoya');
	}

	public function print_excel($uuid)
	{
		// Load the data based on UUID (from your database or other source)
		$data = $this->par_yoshinoya_model->get_by_uuid($uuid);

		// Correct the path to point to the local template on your server
		$filePath = FCPATH . 'assets/excel/QR 24 parameter saus yoshinoya.xlsx'; // Path to your template

		// Load your Excel template
		$spreadsheet = IOFactory::load($filePath);

		// Get active sheet from the loaded template
		$sheet = $spreadsheet->getActiveSheet();

		// Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
		$sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

		// Check if data is available
		if (!empty($data)) {
			// Fill the sheet with the data
			$sheet->setCellValue('B5', $data->saus ?? '');
			$sheet->setCellValue('E5', $data->shift ?? '');
			$sheet->setCellValue('A9', $data->tanggal_produksi ?? '');
			$sheet->setCellValue('B9', $data->kode_produksi ?? '');
			$sheet->setCellValue('C9', $data->suhu_pengukuran ?? '');
			$sheet->setCellValue('D9', $data->brix ?? '');
			$sheet->setCellValue('E9', $data->salt ?? '');
			$sheet->setCellValue('F9', $data->viscositas ?? '');
			$sheet->setCellValue('G9', $data->brookfield ?? '');
			$sheet->setCellValue('H9', $data->brookfield_setelah_frozen ?? '');
			$sheet->setCellValue('B70', $data->catatan ?? '');

		}

		// Set the writer to Xls and output the file
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

		// Set headers to trigger download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="par_yoshinoya_Report.xlsX"');
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
		$filePath = FCPATH . 'assets/excel/QR 24 parameter saus yoshinoya.xlsx'; // Path to your template

		// Load your Excel template
		$spreadsheet = IOFactory::load($filePath);

		// Get active sheet from the loaded template
		$sheet = $spreadsheet->getActiveSheet();

		// Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
		$sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

		// Variables to track if date has already been set
		$sausSet = false;
		$shiftArray = []; // Array to hold unique shift values
		$catatanString = ''; // Initialize catatan string to hold concatenated values

		// Array to store the data for sorting later
		$allData = [];

		// Starting row for the main data (A11 onwards)
		$startingRow = 9;

		// Check if there are selected UUIDs
		if (!empty($selected_uuids)) {
			// Loop through each selected UUID and collect data
			foreach ($selected_uuids as $uuid) {
				$data = $this->par_yoshinoya_model->get_by_uuid($uuid);
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
				if (!$sausSet || !empty($data->saus)) {
					$sheet->setCellValue('B5', $data->saus ?? '');
					$sausSet = true; // Mark date as set
				}

				// Append unique shift values to the shift array if not already added
				if (!empty($data->shift) && !in_array($data->shift, $shiftArray)) {
					$shiftArray[] = $data->shift; // Only add unique shift values
				}

				// Fill the sheet with the main data starting at the current row
				$sheet->setCellValue('A' . $startingRow, $data->tanggal_produksi ?? '');
				$sheet->setCellValue('B' . $startingRow, $data->kode_produksi ?? '');
				$sheet->setCellValue('C' . $startingRow, $data->suhu_pengukuran ?? '');
				$sheet->setCellValue('D' . $startingRow, $data->brix ?? '');
				$sheet->setCellValue('E' . $startingRow, $data->salt ?? '');
				$sheet->setCellValue('F' . $startingRow, $data->viscositas ?? '');
				$sheet->setCellValue('G' . $startingRow, $data->brookfield ?? '');
				$sheet->setCellValue('H' . $startingRow, $data->brookfield_setelah_frozen ?? '');


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
			$sheet->setCellValue('E5', implode(', ', $shiftArray)); // For unique shifts, joined by commas
			$sheet->setCellValue('B70', $catatanString); // For concatenated catatan in cell B23
		}

		// Set the writer to Xls and output the file
		$writer = IOFactory::createWriter($spreadsheet, 'Xls');

		// Set headers to trigger download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Par_Yoshinoya_Multiple_Report.xls"');
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
		$filePath = FCPATH . 'assets/excel/QR 24 parameter saus yoshinoya.xlsx'; // Path to your template

		// Load your Excel template
		$spreadsheet = IOFactory::load($filePath);

		// Get active sheet from the loaded template
		$sheet = $spreadsheet->getActiveSheet();

		// Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
		$sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

		// Variables to track if date and shift have already been set
		$sausSet = false;
		$shiftSet = false;

		// Starting row for the main data (A11 onwards)
		$startingRow = 9;

		// Starting row for the catatan field (B22 onwards)
		$catatanStartingRow = 70;

		// Check if there are selected UUIDs
		if (!empty($selected_uuids)) {
			// Loop through each selected UUID
			$dataCollection = [];
			foreach ($selected_uuids as $uuid) {
				// Load the data for each UUID
				$data = $this->par_yoshinoya_model->get_by_uuid($uuid);

				if (!empty($data)) {
					// Set date and saus once, or replace if new data is provided
					if (!$sausSet || !empty($data->saus)) {
						$sheet->setCellValue('B5', $data->saus ?? '');
						$sausSet = true; // Mark saus as set
					}

					if (!$shiftSet || !empty($data->shift)) {
						$sheet->setCellValue('E5', $data->shift ?? '');
						$shiftSet = true; // Mark shift as set
					}

					// Fill the sheet with the main data starting at the current row
					$sheet->setCellValue('A' . $startingRow, $data->tanggal_produksi ?? '');
					$sheet->setCellValue('B' . $startingRow, $data->kode_produksi ?? '');
					$sheet->setCellValue('C' . $startingRow, $data->suhu_pengukuran ?? '');
					$sheet->setCellValue('D' . $startingRow, $data->brix ?? '');
					$sheet->setCellValue('E' . $startingRow, $data->salt ?? '');
					$sheet->setCellValue('F' . $startingRow, $data->viscositas ?? '');
					$sheet->setCellValue('G' . $startingRow, $data->brookfield ?? '');
					$sheet->setCellValue('H' . $startingRow, $data->brookfield_setelah_frozen ?? '');

					// Move to the next row for the main data
					$startingRow++;

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
		header('Content-Disposition: attachment;filename="Par_Yoshinoya_Multiple_Report.xlsx"');
		header('Cache-Control: max-age=0');

		// Write the file to the output
		$writer->save('php://output');
	}

}
?>