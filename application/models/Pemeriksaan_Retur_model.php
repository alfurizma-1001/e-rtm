<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaan_Retur_model extends CI_Model
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
            'shift' => $this->input->post('shift'),
            'no_mobil' => $this->input->post('no_mobil'),
            'nama_supir' => $this->input->post('nama_supir'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'exp_date' => $this->input->post('exp_date'),
            'jumlah' => $this->input->post('jumlah'),
            'bocor' => $this->input->post('bocor'),
            'isi_kurang' => $this->input->post('isi_kurang'),
            'lain' => $this->input->post('lain'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),

        );
        $this->db->insert('pemeriksaan_retur', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pemeriksaan_retur.created_at', 'DESC');
        $query = $this->db->get('pemeriksaan_retur');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pemeriksaan_retur', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pemeriksaan_retur');

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
        $this->db->delete('pemeriksaan_retur');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}