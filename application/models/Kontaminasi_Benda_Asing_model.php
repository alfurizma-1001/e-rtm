<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Kontaminasi_Benda_Asing_model extends CI_Model
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
            'jenis_kontaminasi_benda_asing' => $this->input->post('jenis_kontaminasi_benda_asing'),
            'bukti' => $this->input->post('bukti'),
            'produk' => $this->input->post('produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'tahapan' => $this->input->post('tahapan'),
            'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('kontaminasi_benda_asing', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('kontaminasi_benda_asing.created_at', 'DESC');
        $query = $this->db->get('kontaminasi_benda_asing');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('kontaminasi_benda_asing', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('kontaminasi_benda_asing');

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
        $this->db->delete('kontaminasi_benda_asing');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}