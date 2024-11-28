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
class Kontaminasi_benda_Asing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kontaminasi_benda_asing_model');
        $this->load->library('form_validation');
        $this->load->model('login_model');
        if (!$this->login_model->current_user()) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = array(
            'kontaminasi_benda_asing' => $this->kontaminasi_benda_asing_model->get_all(),
            'active_nav' => 'kontaminasi_benda_asing',
        );

        $this->load->view('partials/head', $data);
        $this->load->view('packing/kontaminasi_benda_asing');
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        // Check if the form was submitted (via POST request)
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Only attempt to insert data after the form is submitted
            $insert = $this->kontaminasi_benda_asing_model->insert();
            if ($insert) {
                $this->session->set_flashdata('success_msg', "Data kontaminasi_benda_asing berhasil disimpan");
            } else {
                $this->session->set_flashdata('error_msg', "Gagal menyimpan data kontaminasi_benda_asing");
            }

            // Redirect after handling the form submission
            redirect('kontaminasi_benda_asing');
        }

        // Prepare data to load the form view
        $data = array(
            'kontaminasi_benda_asing' => $this->kontaminasi_benda_asing_model->get_all(),
            'active_nav' => 'kontaminasi_benda_asing',
        );

        // Load the view with the prepared data (display form)
        $this->load->view('partials/head', $data);
        $this->load->view('packing/kontaminasi_benda_asing-tambah', $data);
        $this->load->view('partials/footer');
    }

    public function edit($uuid)
    {
        $data['kontaminasi_benda_asing'] = $this->kontaminasi_benda_asing_model->get_by_uuid($uuid);

        $this->load->view('partials/head', $data);
        $this->load->view('packing/kontaminasi_benda_asing-edit', $data);
        $this->load->view('partials/footer');
    }

    public function update()
    {
        $uuid = $this->input->post('uuid');

        $data = array(
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'pukul' => $this->input->post('pukul'),
            'jenis_kontaminasi_benda_asing' => $this->input->post('jenis_kontaminasi_benda_asing'),
            'bukti' => $this->input->post('bukti'),
            'produk' => $this->input->post('produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'tahapan' => $this->input->post('tahapan'),
            'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
            'catatan' => $this->input->post('catatan')
        );

        $update = $this->kontaminasi_benda_asing_model->update($uuid, $data);
        if ($update) {
            $this->session->set_flashdata('success_msg', 'Data kontaminasi_benda_asing berhasil diupdate');
            redirect('kontaminasi_benda_asing');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal mengupdate data kontaminasi_benda_asing');
            redirect('kontaminasi_benda_asing/edit/' . $uuid);
        }
    }


    public function hapus($uuid)
    {
        $delete = $this->kontaminasi_benda_asing_model->delete($uuid);
        if ($delete) {
            $this->session->set_flashdata('success_msg', 'Data kontaminasi_benda_asing berhasil dihapus');
        } else {
            $this->session->set_flashdata('error_msg', 'Gagal menghapus data kontaminasi_benda_asing');
        }
        redirect('kontaminasi_benda_asing');
    }

    public function print_multiple_excel()
	{
		// Get the selected UUIDs from the query string (GET request)
		$selected_uuids = $this->input->get('uuids');

		// Explode the UUIDs into an array
		$selected_uuids = explode(',', $selected_uuids);

		// Correct the path to point to the local template on your server
		$filePath = FCPATH . 'assets/excel/QR 10 Kontaminasi Benda Asing.xls'; // Path to your template

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
		$startingRow = 10;

		// Check if there are selected UUIDs
		if (!empty($selected_uuids)) {
			$allData = [];

			// Collect the data for each UUID
			foreach ($selected_uuids as $uuid) {
				$data = $this->kontaminasi_benda_asing_model->get_by_uuid($uuid);
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

				// Fill the sheet with the main data starting at the current row
				$sheet->setCellValue('A' . $startingRow, $data->pukul ?? '');
				$sheet->setCellValue('B' . $startingRow, $data->jenis_kontaminasi_benda_asing ?? '');
				$sheet->setCellValue('E' . $startingRow, $data->bukti ?? '');
				$sheet->setCellValue('H' . $startingRow, $data->produk ?? '');
				$sheet->setCellValue('K' . $startingRow, $data->kode_produksi ?? '');
                $sheet->setCellValue('L' . $startingRow, $data->tahapan ?? '');
                $sheet->setCellValue('M' . $startingRow, $data->tindakan_koreksi ?? '');

				// Move to the next row for the main data
				$startingRow++;
			}

			// After processing all data, concatenate unique shift values and set them in the sheet
			$uniqueShifts = array_unique($shiftArray); // Remove duplicate shifts
			$sheet->setCellValue('I5', implode(', ', $uniqueShifts)); // Set concatenated shifts in B6

			// Concatenate all catatan values and set them in the sheet
			$sheet->setCellValue('C21', implode(', ', $catatanArray)); // Set concatenated catatan in B22
		}

		// Set the writer to Xls and output the file
		$writer = IOFactory::createWriter($spreadsheet, 'Xls');

		// Set headers to trigger download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Kontaminasi_Benda_Asing_Multiple_Report.xls"');
		header('Cache-Control: max-age=0');

		// Write the file to the output
		$writer->save('php://output');
	}

}
?>