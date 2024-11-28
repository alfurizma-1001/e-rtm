<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaan_Kedatangan_Raw_Material_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }


    public function insert()
    {
        $uuid = Uuid::uuid4()->toString();

        $data = array(
            'uuid' => $uuid,
            'date' => $this->input->post('date'),
            'jenis_raw_material' => $this->input->post('jenis_raw_material'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'pemasok' => $this->input->post('pemasok'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'exp_date' => $this->input->post('exp_date'),
            'jumlah_barang_datang' => $this->input->post('jumlah_barang_datang'),
            'sampel' => $this->input->post('sampel'),
            'sesuai' => $this->input->post('sesuai'),
            'tidak_sesuai' => $this->input->post('tidak_sesuai'),
            'kemasan' => $this->input->post('kemasan'),
            'warna' => $this->input->post('warna'),
            'kotoran' => $this->input->post('kotoran'),
            'aroma' => $this->input->post('aroma'),
            'suhu' => $this->input->post('suhu'),
            'ada' => $this->input->post('ada'),
            'tdk_ada' => $this->input->post('tdk_ada'),
            'negara_asal' => $this->input->post('negara_asal'),
            'ok' => $this->input->post('ok'),
            'tolak' => $this->input->post('tolak'),
            'berlaku' => $this->input->post('berlaku'),
            'tidak_berlaku' => $this->input->post('tidak_berlaku'),
            'coa' => $this->input->post('coa'),
            'A' => $this->input->post('A'),
            'NA' => $this->input->post('NA'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );
        $this->db->insert('pemeriksaan_kedatangan_raw_material', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pemeriksaan_kedatangan_raw_material.created_at', 'DESC');
        $query = $this->db->get('pemeriksaan_kedatangan_raw_material');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pemeriksaan_kedatangan_raw_material', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pemeriksaan_kedatangan_raw_material');

        // Debugging: check if the query returns any result
        if ($query->num_rows() === 0) {
            log_message('error', "No record found for UUID: {$uuid}");
            return null;
        }

        return $query->row();
    }

    public function delete($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->delete('pemeriksaan_kedatangan_raw_material');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}