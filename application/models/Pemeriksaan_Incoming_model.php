<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaan_Incoming_model extends CI_Model
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
            'nama_supllier' => $this->input->post('nama_supllier'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jenis_mobil' => $this->input->post('jenis_mobil'),
            'no_polisi' => $this->input->post('no_polisi'),
            'identitas_pengantar' => $this->input->post('identitas_pengantar'),
            'segel' => $this->input->post('segel'),
            'kebersihaan' => $this->input->post('kebersihaan'),
            'tertutup' => $this->input->post('tertutup'),
            'hama' => $this->input->post('hama'),
            'jam_datang' => $this->input->post('jam_datang'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );
        $this->db->insert('pemeriksaan_incoming', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pemeriksaan_incoming.created_at', 'DESC');
        $query = $this->db->get('pemeriksaan_incoming');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pemeriksaan_incoming', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pemeriksaan_incoming');

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
        $this->db->delete('pemeriksaan_incoming');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}