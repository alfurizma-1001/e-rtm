<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Verif_Topping_model extends CI_Model
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
            'kode_produk' => $this->input->post('kode_produk'),
            'jenis_topping' => $this->input->post('jenis_topping'),
            'standar' => $this->input->post('standar'),
            'pukul' => $this->input->post('pukul'),
            'gramasi' => $this->input->post('gramasi'),
            'p_pukul' => $this->input->post('p_pukul'),
            'p_gramasi' => $this->input->post('p_gramasi'),
            'pp_pukul' => $this->input->post('pp_pukul'),
            'pp_gramasi' => $this->input->post('pp_gramasi'),
            'tindakan' => $this->input->post('tindakan'),
            'catatan' => $this->input->post('catatan')


        );
        $this->db->insert('verif_topping', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('verif_topping.created_at', 'DESC');
        $query = $this->db->get('verif_topping');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('verif_topping', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('verif_topping');

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
        $this->db->delete('verif_topping');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}