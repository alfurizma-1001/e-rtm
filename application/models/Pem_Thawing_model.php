<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Thawing_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('auth_model');
	}
	public function rules() {
		return [
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
		
			[
				'field' => 'kondisi_ruangan',
				'label' => 'Kondisi Ruangan',
				'rules' => 'required'
			],
			[
				'field' => 'jenis_produk',
				'label' => 'Jenis Produk',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah',
				'label' => 'Jumlah',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Kode Produksi',
				'rules' => 'required'
			],
			
			[
				'field' => 'suhu_ruangan',
				'label' => 'Suhu Ruangan',
				'rules' => 'required'
			],
			[
				'field' => 'mulai_thawing_pukul',
				'label' => 'Mulai Thawing Pukul',
				'rules' => 'required'
			],
			[
				'field' => 'selesai_thawing_pukul',
				'label' => 'Selesai Thawing Pukul',
				'rules' => 'required'
			],
			
			[
				'field' => 'suhu_produk',
				'label' => 'Suhu Produk',
				'rules' => 'required'
			],
			[
				'field' => 'catatan',
				'label' => 'Catatan',
				'rules' => 'required'
			]
		];
	}
	

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$data = array(
			'uuid' => $uuid,
			'date' => $this->input->post('date'),		
			'kondisi_ruangan' => $this->input->post('kondisi_ruangan'),
			'jenis_produk' => $this->input->post('jenis_produk'),
			'jumlah' => $this->input->post('jumlah'),
			'kode_produksi' => $this->input->post('kode_produksi'),	
			'suhu_ruangan' => $this->input->post('suhu_ruangan'),
			'mulai_thawing_pukul' => $this->input->post('mulai_thawing_pukul'),
			'selesai_thawing_pukul' => $this->input->post('selesai_thawing_pukul'),	
			'suhu_produk' => $this->input->post('suhu_produk'),
			'catatan' => $this->input->post('catatan')
		);
		

		$this->db->insert('pem_thawing', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}
    public function get_all(){
		$this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('pem_thawing');
        return $query->result();
    }

	public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_thawing', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_thawing');
        return $query->row();
    }

    public function delete($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->delete('pem_thawing');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
	public function get_by_date($tanggal)
    {
        $this->db->where('date', $tanggal);
        return $this->db->get('pem_thawing')->result();
    }

}