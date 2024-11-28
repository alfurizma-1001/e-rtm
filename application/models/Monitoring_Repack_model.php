<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Monitoring_Repack_model extends CI_Model
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
            'produk' => $this->input->post('produk'),
            'karton' => $this->input->post('karton'),
            'jumlah' => $this->input->post('jumlah'),
            'exp_date' => $this->input->post('exp_date'),
            'kodefikasi' => $this->input->post('kodefikasi'),
            'content' => $this->input->post('content'),
            'kerapihan' => $this->input->post('kerapihan'),
            'lain_lain' => $this->input->post('lain_lain'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('monitoring_repack', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('monitoring_repack.created_at', 'DESC');
        $query = $this->db->get('monitoring_repack');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('monitoring_repack', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('monitoring_repack');

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
        $this->db->delete('monitoring_repack');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}