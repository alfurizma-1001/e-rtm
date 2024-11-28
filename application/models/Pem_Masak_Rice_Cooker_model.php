<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Masak_Rice_Cooker_model extends CI_Model
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
            'nama_produk' => $this->input->post('nama_produk'),
            'kode_beras' => $this->input->post('kode_beras'),
            'berat' => $this->input->post('berat'),
            'kode_prod' => $this->input->post('kode_prod'),
            'basket_no' => $this->input->post('basket_no'),
            'gas' => $this->input->post('gas'),
            'waktu' => $this->input->post('waktu'),
            'suhu_produk' => $this->input->post('suhu_produk'),
            'suhu_produk_1menit' => $this->input->post('suhu_produk_1menit'),
            'suhu_aftervakum' => $this->input->post('suhu_aftervakum'),
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesi' => $this->input->post('jam_selesi'),
            'kematangan' => $this->input->post('kematangan'),
            'rasa' => $this->input->post('rasa'),
            'aroma' => $this->input->post('aroma'),
            'tekstur' => $this->input->post('tekstur'),
            'warna' => $this->input->post('warna'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );
        $this->db->insert('pem_masak_rice_cooker', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pem_masak_rice_cooker.created_at', 'DESC');
        $query = $this->db->get('pem_masak_rice_cooker');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_masak_rice_cooker', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_masak_rice_cooker');

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
        $this->db->delete('pem_masak_rice_cooker');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}