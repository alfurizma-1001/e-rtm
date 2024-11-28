<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Par_Yoshinoya_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function rules() {
		return [
			
			[
				'field' => 'shift',
				'label' => 'Shift',
				'rules' => 'required'
			],
			[
				'field' => 'saus',
				'label' => 'Saus',
				'rules' => 'required'
			],
			[
				'field' => 'tanggal_produksi',
				'label' => 'Tanggal Produksi',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Kode Produksi',
				'rules' => 'required'
			],
			[
				'field' => 'suhu_pengukuran',
				'label' => 'Suhu Pengukuran',
				'rules' => 'required'
			],
			[
				'field' => 'brix',
				'label' => 'Brix',
				'rules' => 'required'
			],
			[
				'field' => 'salt',
				'label' => 'Salt',
				'rules' => 'required'
			],
			[
				'field' => 'viscositas',
				'label' => 'Viscositas',
				'rules' => 'required'
			],
			[
				'field' => 'brookfield',
				'label' => 'Brookfield',
				'rules' => 'required'
			],
			[
				'field' => 'brookfield_setelah_frozen',
				'label' => 'Brookfield Setelah Frozen',
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

		

		$data = array(
			'uuid' => $uuid,
	
			'shift' => $this->input->post('shift'),
			'saus' => $this->input->post('saus'),
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
		

		$this->db->insert('par_yoshinoya', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}
    public function get_all(){
		$this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('par_yoshinoya');
        return $query->result();
    }

	public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('par_yoshinoya', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('par_yoshinoya');
        return $query->row();
    }

    public function delete($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->delete('par_yoshinoya');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
	public function get_by_date($tanggal)
    {
        $this->db->where('date', $tanggal);
        return $this->db->get('par_yoshinoya')->result();
    }

}