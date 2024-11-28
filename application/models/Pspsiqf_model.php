<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pspsiqf_model extends CI_Model
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
            'iqf_no' => $this->input->post('iqf_no'),
            'pukul' => $this->input->post('pukul'),
            'produk' => $this->input->post('produk'),
            'batch_no' => $this->input->post('batch_no'),
            'stdct' => $this->input->post('stdct'),
            'suhu_pusat_produk_1' => $this->input->post('suhu_pusat_produk_1'),
            'suhu_pusat_produk_2' => $this->input->post('suhu_pusat_produk_2'),
            'suhu_pusat_produk_3' => $this->input->post('suhu_pusat_produk_3'),
            'suhu_pusat_produk_4' => $this->input->post('suhu_pusat_produk_4'),
            'suhu_pusat_produk_5' => $this->input->post('suhu_pusat_produk_5'),
            'suhu_pusat_produk_6' => $this->input->post('suhu_pusat_produk_6'),
            'suhu_pusat_produk_7' => $this->input->post('suhu_pusat_produk_7'),
            'suhu_pusat_produk_8' => $this->input->post('suhu_pusat_produk_8'),
            'suhu_pusat_produk_9' => $this->input->post('suhu_pusat_produk_9'),
            'suhu_pusat_produk_10' => $this->input->post('suhu_pusat_produk_10'),
            'suhu_pusat_produk_x' => $this->input->post('suhu_pusat_produk_x'),
            'problem' => $this->input->post('problem'),
            'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('pspsiqf', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pspsiqf.created_at', 'DESC');
        $query = $this->db->get('pspsiqf');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pspsiqf', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pspsiqf');

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
        $this->db->delete('pspsiqf');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}