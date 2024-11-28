<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Suhu_Cold_Storage_model extends CI_Model
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
            'pukul' => $this->input->post('pukul'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'suhu_cs' => $this->input->post('suhu_cs'),
            'suhu_dics1' => $this->input->post('suhu_dics1'),
            'suhu_dics2' => $this->input->post('suhu_dics2'),
            'suhu_dics3' => $this->input->post('suhu_dics3'),
            'suhu_dics4' => $this->input->post('suhu_dics4'),
            'suhu_dics5' => $this->input->post('suhu_dics5'),
            'rata' => $this->input->post('rata'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('suhu_cold_storage', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('suhu_cold_storage.created_at', 'DESC');
        $query = $this->db->get('suhu_cold_storage');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('suhu_cold_storage', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('suhu_cold_storage');

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
        $this->db->delete('suhu_cold_storage');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}