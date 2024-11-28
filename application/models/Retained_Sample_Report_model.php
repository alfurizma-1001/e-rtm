<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Retained_Sample_Report_model extends CI_Model
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
            'sample_type' => $this->input->post('sample_type'),
            'date' => $this->input->post('date'),
            'sample_storage_frozen' => $this->input->post('sample_storage_frozen'),
            'sample_storage_chilled' => $this->input->post('sample_storage_chilled'),
            'sample_storage_other' => $this->input->post('sample_storage_other'),
            'description' => $this->input->post('description'),
            'prod_date' => $this->input->post('prod_date'),
            'best_before' => $this->input->post('best_before'),
            'quantity' => $this->input->post('quantity'),
            'remarks' => $this->input->post('remarks'),
   
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('retained_sample_report', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('retained_sample_report.created_at', 'DESC');
        $query = $this->db->get('retained_sample_report');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('retained_sample_report', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('retained_sample_report');

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
        $this->db->delete('retained_sample_report');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}