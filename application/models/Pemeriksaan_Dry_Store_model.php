<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaan_Dry_Store_model extends CI_Model
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
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama_barang' => $this->input->post('nama_barang'),
            'mobil' => $this->input->post('mobil'),
            'no_polisi' => $this->input->post('no_polisi'),
            'identitas_pengantar' => $this->input->post('identitas_pengantar'),
            'segel' => $this->input->post('segel'),
            'kebersihaan' => $this->input->post('kebersihaan'),
            'hama' => $this->input->post('hama'),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_keluar' => $this->input->post('jam_keluar'),
            'mulai_dicek' => $this->input->post('mulai_dicek'),
            'selesai_dicek' => $this->input->post('selesai_dicek'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );
        $this->db->insert('pemeriksaan_dry_store', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pemeriksaan_dry_store.created_at', 'DESC');
        $query = $this->db->get('pemeriksaan_dry_store');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pemeriksaan_dry_store', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pemeriksaan_dry_store');

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
        $this->db->delete('pemeriksaan_dry_store');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}