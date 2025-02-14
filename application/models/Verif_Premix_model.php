<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Verif_Premix_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function rules(){
		return [
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'shift',
				'label' => 'Shift',
				'rules' => 'required'
			],
            [
				'field' => 'nama_premix',
				'label' => 'Nama Premix',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Kode Produksi',
				'rules' => 'required'
			],
			[
				'field' => 'sensori',
				'label' => 'Sensori',
				'rules' => 'required'
			],
			[
				'field' => 'tindakan_koreksi',
				'label' => 'Tindakan Koreksi',
				'rules' => 'required'
			],
			[
				'field' => 'catatan',
				'label' => 'Catatan'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$nama_premix = $this->input->post('nama_premix');
		$kode_produksi = $this->input->post('kode_produksi');
		$sensori = $this->input->post('sensori');
		$tindakan_koreksi = $this->input->post('tindakan_koreksi');
		$catatan = $this->input->post('catatan');

		$data = array(
			'uuid' => $uuid,
			'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_premix' => $this->input->post('nama_premix'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'sensori' => $this->input->post('sensori'),
            'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
            'catatan' => $this->input->post('catatan')
		);

		$this->db->insert('verifikasi_premix', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}
    public function get_all(){
		$this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('verifikasi_premix');
        return $query->result();
    }

	public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('verifikasi_premix', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('verifikasi_premix');
        return $query->row();
    }

    public function delete($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->delete('verifikasi_premix');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
	public function get_by_date($tanggal)
    {
        $this->db->where('date', $tanggal);
        return $this->db->get('verifikasi_premix')->result();
    }

}