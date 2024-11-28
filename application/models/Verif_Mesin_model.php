<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Verif_Mesin_model extends CI_Model
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
            'nama_mesin' => $this->input->post('nama_mesin'),
            'standar_setting' => $this->input->post('standar_setting'),
            'aktual' => $this->input->post('aktual'),
            'tindakan' => $this->input->post('tindakan'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('verif_mesin', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('verif_mesin.created_at', 'DESC');
        $query = $this->db->get('verif_mesin');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('verif_mesin', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('verif_mesin');

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
        $this->db->delete('verif_mesin');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}