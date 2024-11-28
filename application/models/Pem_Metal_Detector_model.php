<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Metal_Detector_model extends CI_Model
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
            'no_Produksi' => $this->input->post('no_Produksi'),
            'fe_1' => $this->input->post('fe_1'),
            'fe_2' => $this->input->post('fe_2'),
            'non_fe_1' => $this->input->post('non_fe_1'),
            'non_fe_2' => $this->input->post('non_fe_2'),
            'sus_1' => $this->input->post('sus_1'),
            'sus_2' => $this->input->post('sus_2'),
            'keterangan' => $this->input->post('keterangan'),
            'tindakan_koreksi' => $this->input->post('tindakan_koreksi'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('pem_metal_detector', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pem_metal_detector.created_at', 'DESC');
        $query = $this->db->get('pem_metal_detector');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_metal_detector', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_metal_detector');

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
        $this->db->delete('pem_metal_detector');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}