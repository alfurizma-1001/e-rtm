<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Sample_Bulanan_RND_model extends CI_Model
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
            'plant' => $this->input->post('plant'),
            'sample_bulan' => $this->input->post('sample_bulan'),
            'date' => $this->input->post('date'),
            'sample_storage_frozen' => $this->input->post('sample_storage_frozen'),
            'sample_storage_chilled' => $this->input->post('sample_storage_chilled'),
            'sample_storage_other' => $this->input->post('sample_storage_other'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'best_before' => $this->input->post('best_before'),
            'quantity' => $this->input->post('quantity'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('sample_bulanan_rnd', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('sample_bulanan_rnd.created_at', 'DESC');
        $query = $this->db->get('sample_bulanan_rnd');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('sample_bulanan_rnd', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('sample_bulanan_rnd');

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
        $this->db->delete('sample_bulanan_rnd');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}