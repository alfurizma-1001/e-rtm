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
class Termo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('termo_model');
		$this->load->library('form_validation');
		$this->load->model('login_model');
		if (!$this->login_model->current_user()) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'termo' => $this->termo_model->get_all(),
			// 'tanggal' => date('Y-m-d'),
			'active_nav' => 'termo',
		);

		$this->load->view('partials/head', $data);
		$this->load->view('cooking/termo');
		$this->load->view('partials/footer');
	}

	public function tambah()
	{
		$rules = $this->termo_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->termo_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', "Data Peneraan Termo berhasil disimpan");
			} else {
				$this->session->set_flashdata('error_msg', "Gagal menyimpan data Peneraan Termo");
			}
			redirect('termo');
		}

		$data = array(
			'termo' => $this->termo_model->get_all(),
			'active_nav' => 'termo',
		);

		$this->load->view('partials/head', $data);
		$this->load->view('cooking/termo-tambah', $data);
		$this->load->view('partials/footer');
	}
	public function edit($uuid)
	{
		$data['termo'] = $this->termo_model->get_by_uuid($uuid);

		$this->load->view('partials/head', $data);
		$this->load->view('cooking/termo-edit', $data);
		$this->load->view('partials/footer');
	}

	public function update()
	{
		// Form validation rules
		$rules = $this->termo_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('partials/head');
			$this->load->view('cooking/termo-edit');
			$this->load->view('partials/footer');
		} else {
			$uuid = $this->input->post('uuid');

			$data = array(
				'date' => $this->input->post('date'),
				'shift' => $this->input->post('shift'),
				'kode_termo' => $this->input->post('kode_termo'),
				'pukul' => $this->input->post('pukul'),
				'hasil_tera' => $this->input->post('hasil_tera'),
				'tindakan' => $this->input->post('tindakan'),
				'catatan' => $this->input->post('catatan')
			);

			$update = $this->termo_model->update($uuid, $data);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data peneraan termo berhasil diupdate');
				redirect('termo');
			} else {
				$this->session->set_flashdata('error_msg', 'Gagal mengupdate data peneraan termo');
				redirect('termo/edit/' . $uuid);
			}
		}
	}

	public function hapus($uuid)
	{
		$delete = $this->termo_model->delete($uuid);
		if ($delete) {
			$this->session->set_flashdata('success_msg', 'Data peneraan termo berhasil dihapus');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data peneraan termo');
		}
		redirect('termo');
	}
	
	//NGAMBIL PERTANGGAL
	public function print_pdf()
	{
		$tanggal = $this->input->post('tanggal');
		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$termo = $this->termo_model->get_by_date($tanggal);

		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Alfurizma Ramadhani');
		$pdf->SetTitle('Peneraan Termometer');
		$pdf->AddPage();

		$pdf->SetFont('helvetica', '', 10);
		// $logo = base_url('assets\img\cpi-logo.png');
		// $pdf->Image($logo, 15, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$pdf->SetFont('helvetica', '', 5);
		$pdf->Cell(0, 10, 'PT CHAROEN POKPHAND INDONESIA - FOOD DIVISION', 0, 1, 'L');
		;

		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->Cell(0, 10, 'PENERAAN TERMOMETER', 0, 1, 'C');
		$pdf->Ln();
		$pdf->SetFont('helvetica', 11);
		$pdf->Cell(0, 10, 'Tanggal: ' . $tanggal, 0, 1, 'L');
		if (!empty($termo)) {
			$pdf->Cell(0, 10, 'Shift: ' . $termo[0]->shift, 0, 1, 'L');
		}

		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetFont('helvetica', 'B');
		$pdf->Cell(10, 20, 'NO', 1, 0, 'C', 1);
		$pdf->Cell(60, 20, 'KODE TERMOMETER/AREA', 1, 0, 'C', 1);
		$pdf->Cell(30, 20, 'STANDAR', 1, 0, 'C', 1);
		$pdf->Cell(30, 20, 'PUKUL', 1, 0, 'C', 1);
		$pdf->Cell(30, 20, 'HASIL TERA', 1, 0, 'C', 1);
		$pdf->Cell(60, 20, 'TINDAKAN KOREKSI', 1, 1, 'C', 1);

		$pdf->SetFont('helvetica', '');
		$row = 1;
		foreach ($termo as $row_data) {
			$pdf->Cell(10, 10, $row++, 1, 0, 'C');
			$pdf->Cell(60, 10, $row_data->kode_termo, 1, 0, 'C');
			$pdf->Cell(30, 10, '(0,0 C)', 1, 0, 'C');
			$pdf->Cell(30, 10, $row_data->pukul, 1, 0, 'C');
			$pdf->Cell(30, 10, $row_data->hasil_tera, 1, 0, 'C');
			$pdf->Cell(60, 10, $row_data->tindakan, 1, 1, 'C');
		}

		$pdf->Cell(0, 10, 'Keterangan:', 0, 1, 'L');
		$pdf->Cell(0, 2, '- Tera termometer dilakukan setiap awal produksi', 0, 1, 'L');
		$pdf->Cell(0, 2, '- Termometer ditera dengan memasukan sensor es(0 C)', 0, 1, 'L');
		$pdf->Cell(0, 2, '- Jika ada selisih angka display suhu dengan suhu standar es, beri keterangan (+)', 0, 1, 'L');
		$pdf->Cell(0, 2, '- atau(-) angka selisih (faktor koreksi)', 0, 1, 'L');
		$pdf->Cell(0, 2, '- Jika faktor koreksi > 0,4 C, thermometer perlu perbaikan', 0, 1, 'L');
		$pdf->Ln();

		$pdf->Cell(55, 10, 'Diketahui oleh', 0, 0, 'R');
		$pdf->Cell(55, 10, 'Disetujui oleh', 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(55, 10, '.............................', 0, 0, 'R');
		$pdf->Cell(55, 10, '.............................', 0, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(55, 10, 'Qc Inspector', 0, 0, 'R');
		$pdf->Cell(55, 10, 'SPV Qc', 0, 0, 'R');
		$pdf->Ln();

		$pdf->Output('Peneraan_Termometer_' . $tanggal . '.pdf', 'I');
	}
	public function print_pdf_by_uuid($uuid)
	{
		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		// Get data by the provided UUID
		$termo = $this->termo_model->get_by_uuid($uuid);

		$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Alfurizma Ramadhani');
		$pdf->SetTitle('Peneraan Termometer');
		$pdf->AddPage();

		$pdf->SetFont('helvetica', '', 10);
		$pdf->SetFont('helvetica', '', 5);
		$pdf->Cell(0, 10, 'PT CHAROEN POKPHAND INDONESIA - FOOD DIVISION', 0, 1, 'L');

		$pdf->SetFont('helvetica', 'B', 12);
		$pdf->Cell(0, 10, 'PENERAAN TERMOMETER', 0, 1, 'C');
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 11);

		if (!empty($termo)) {
			$pdf->Cell(0, 10, 'Tanggal: ' . $termo->date, 0, 1, 'L');
			$pdf->Cell(0, 10, 'Shift: ' . $termo->shift, 0, 1, 'L');

			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetFont('helvetica', 'B');
			$pdf->Cell(10, 20, 'NO', 1, 0, 'C', 1);
			$pdf->Cell(60, 20, 'KODE TERMOMETER/AREA', 1, 0, 'C', 1);
			$pdf->Cell(30, 20, 'STANDAR', 1, 0, 'C', 1);
			$pdf->Cell(30, 20, 'PUKUL', 1, 0, 'C', 1);
			$pdf->Cell(30, 20, 'HASIL TERA', 1, 0, 'C', 1);
			$pdf->Cell(60, 20, 'TINDAKAN KOREKSI', 1, 1, 'C', 1);

			$pdf->SetFont('helvetica', '');
			$pdf->Cell(10, 10, '1', 1, 0, 'C');
			$pdf->Cell(60, 10, $termo->kode_termo, 1, 0, 'C');
			$pdf->Cell(30, 10, '(0,0 C)', 1, 0, 'C');
			$pdf->Cell(30, 10, $termo->pukul, 1, 0, 'C');
			$pdf->Cell(30, 10, $termo->hasil_tera, 1, 0, 'C');
			$pdf->Cell(60, 10, $termo->tindakan, 1, 1, 'C');

			// Footer with additional info
			$pdf->Cell(0, 10, 'Keterangan:', 0, 1, 'L');
			$pdf->Cell(0, 2, '- Tera termometer dilakukan setiap awal produksi', 0, 1, 'L');
			$pdf->Cell(0, 2, '- Termometer ditera dengan memasukan sensor es(0 C)', 0, 1, 'L');
			$pdf->Cell(0, 2, '- Jika ada selisih angka display suhu dengan suhu standar es, beri keterangan (+)', 0, 1, 'L');
			$pdf->Cell(0, 2, '- atau(-) angka selisih (faktor koreksi)', 0, 1, 'L');
			$pdf->Cell(0, 2, '- Jika faktor koreksi > 0,4 C, thermometer perlu perbaikan', 0, 1, 'L');
			$pdf->Ln();

			$pdf->Cell(55, 10, 'Diketahui oleh', 0, 0, 'R');
			$pdf->Cell(55, 10, 'Disetujui oleh', 0, 0, 'R');
			$pdf->Ln();
			$pdf->Cell(55, 10, '.............................', 0, 0, 'R');
			$pdf->Cell(55, 10, '.............................', 0, 0, 'R');
			$pdf->Ln();
			$pdf->Cell(55, 10, 'Qc Inspector', 0, 0, 'R');
			$pdf->Cell(55, 10, 'SPV Qc', 0, 0, 'R');
		} else {
			$pdf->Cell(0, 10, 'No data found for this UUID.', 0, 1, 'C');
		}

		$pdf->Output('Peneraan_Termometer_' . $termo->date . '.pdf', 'I');
	}


	public function print_excel($uuid)
	{
		// Load the data based on UUID (from your database or other source)
		$data = $this->termo_model->get_by_uuid($uuid);

		// Correct the path to point to the local template on your server
		$filePath = FCPATH . 'assets/excel/QR 04 Peneraan Thermometer.xls'; // Path to your template

		// Load your Excel template
		$spreadsheet = IOFactory::load($filePath);

		// Get active sheet from the loaded template
		$sheet = $spreadsheet->getActiveSheet();

		// Insert the company name "PT Charoen Pokphand Indonesia" into cell A1
		$sheet->setCellValue('A1', 'PT Charoen Pokphand Indonesia');

		// Check if data is available
		if (!empty($data)) {
			// Fill the sheet with the data
			$sheet->setCellValue('B5', $data->date ?? '');
			$sheet->setCellValue('B6', $data->shift ?? '');
			$sheet->setCellValue('A11', $data->kode_termo ?? '');
			$sheet->setCellValue('D11', $data->pukul ?? '');
			$sheet->setCellValue('E11', $data->hasil_tera ?? '');
			$sheet->setCellValue('F11', $data->tindakan ?? '');
			$sheet->setCellValue('B23', $data->catatan ?? '');

		}

		// Set the writer to Xls and output the file
		$writer = IOFactory::createWriter($spreadsheet, 'Xls');

		// Set headers to trigger download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="termo_Report.xls"');
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
		$filePath = FCPATH . 'assets/excel/QR 04 Peneraan Thermometer.xls'; // Path to your template

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
		$startingRow = 11;

		// Check if there are selected UUIDs
		if (!empty($selected_uuids)) {
			// Loop through each selected UUID and collect data
			foreach ($selected_uuids as $uuid) {
				$data = $this->termo_model->get_by_uuid($uuid);
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
					$sheet->setCellValue('B5', $data->date ?? '');
					$dateSet = true; // Mark date as set
				}

				// Append unique shift values to the shift array if not already added
				if (!empty($data->shift) && !in_array($data->shift, $shiftArray)) {
					$shiftArray[] = $data->shift; // Only add unique shift values
				}

				// Fill the sheet with the main data starting at the current row
				$sheet->setCellValue('A' . $startingRow, $data->kode_termo ?? '');
				$sheet->setCellValue('D' . $startingRow, $data->pukul ?? '');
				$sheet->setCellValue('E' . $startingRow, $data->hasil_tera ?? '');
				$sheet->setCellValue('F' . $startingRow, $data->tindakan ?? '');

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
			$sheet->setCellValue('B6', implode(', ', $shiftArray)); // For unique shifts, joined by commas
			$sheet->setCellValue('B23', $catatanString); // For concatenated catatan in cell B23
		}

		// Set the writer to Xls and output the file
		$writer = IOFactory::createWriter($spreadsheet, 'Xls');

		// Set headers to trigger download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Termo_Multiple_Report.xls"');
		header('Cache-Control: max-age=0');

		// Write the file to the output
		$writer->save('php://output');
	}





}
