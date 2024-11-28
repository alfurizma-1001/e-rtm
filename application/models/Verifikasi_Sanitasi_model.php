<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Verifikasi_Sanitasi_model extends CI_Model
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
            'pukul' => $this->input->post('pukul'),
            'area' => $this->input->post('area'),
            'mesin' => $this->input->post('mesin'),
            'cleaning_agents' => $this->input->post('cleaning_agents'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan'),

        );
        $this->db->insert('verifikasi_sanitasi', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('verifikasi_sanitasi.created_at', 'DESC');
        $query = $this->db->get('verifikasi_sanitasi');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('verifikasi_sanitasi', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('verifikasi_sanitasi');

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
        $this->db->delete('verifikasi_sanitasi');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}