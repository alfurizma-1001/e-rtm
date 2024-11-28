<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Monitoring_False_model extends CI_Model
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
            'mesin' => $this->input->post('mesin'),
            'date' => $this->input->post('date'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'jumlah_pack_tdklolos' => $this->input->post('jumlah_pack_tdklolos'),
            'jumlah_pack_kontaminan' => $this->input->post('jumlah_pack_kontaminan'),
            'jenis_kontaminan' => $this->input->post('jenis_kontaminan'),
            'posisi_kontaminan' => $this->input->post('posisi_kontaminan'),
            'false_rejections' => $this->input->post('false_rejections'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('monitoring_false', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('monitoring_false.created_at', 'DESC');
        $query = $this->db->get('monitoring_false');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('monitoring_false', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('monitoring_false');

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
        $this->db->delete('monitoring_false');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}