<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Xray_model extends CI_Model
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
            'kode_produksi' => $this->input->post('kode_produksi'),
            'no_program' => $this->input->post('no_program'),
            'glass_ball_1' => $this->input->post('glass_ball_1'),
            'glass_ball_2' => $this->input->post('glass_ball_2'),
            'ceramic_1' => $this->input->post('ceramic_1'),
            'ceramic_2' => $this->input->post('ceramic_2'),
            'sus_wire_1' => $this->input->post('sus_wire_1'),
            'sus_wire_2' => $this->input->post('sus_wire_2'),
            'sus_ball_1' => $this->input->post('sus_ball_1'),
            'sus_ball_2' => $this->input->post('sus_ball_2'),
            'keterangan' => $this->input->post('keterangan'),
            'tindakan' => $this->input->post('tindakan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('pem_xray', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pem_xray.created_at', 'DESC');
        $query = $this->db->get('pem_xray');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_xray', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_xray');

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
        $this->db->delete('pem_xray');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}