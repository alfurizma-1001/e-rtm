<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Verif_Pengemasan_model extends CI_Model
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
            'jam' => $this->input->post('jam'),
            'tnama_produk' => $this->input->post('tnama_produk'),
            'tprod_code' => $this->input->post('tprod_code'),
            'tbb' => $this->input->post('tbb'),
            'tqr_code' => $this->input->post('tqr_code'),
            'tok_tdk' => $this->input->post('tok_tdk'),
            'bnama_produk' => $this->input->post('bnama_produk'),
            'bprod_code' => $this->input->post('bprod_code'),
            'bbb' => $this->input->post('bbb'),
            'bisi' => $this->input->post('bisi'),
            'bok_tdk' => $this->input->post('bok_tdk'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('verifikasi_pengemasan', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('verifikasi_pengemasan.created_at', 'DESC');
        $query = $this->db->get('verifikasi_pengemasan');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('verifikasi_pengemasan', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('verifikasi_pengemasan');

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
        $this->db->delete('verifikasi_pengemasan');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}