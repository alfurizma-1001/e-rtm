<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class laboratory_sample_model extends CI_Model
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
            'microbiological' => $this->input->post('microbiological'),
            'Antibiotic_residues' => $this->input->post('Antibiotic_residues'),
            'Enterococcus' => $this->input->post('Enterococcus'),
            'TPC' => $this->input->post('TPC'),
            'Salmonella' => $this->input->post('Salmonella'),
            'Coliform' => $this->input->post('Coliform'),
            'Yeast' => $this->input->post('Yeast'),
            'coli' => $this->input->post('coli'),
            'Clostridium' => $this->input->post('Clostridium'),
            'aureus' => $this->input->post('aureus'),
            'Other' => $this->input->post('Other'),
            'Chemical' => $this->input->post('Chemical'),
            'Pesticide' => $this->input->post('Pesticide'),
            'Peroxide' => $this->input->post('Peroxide'),
            'pH' => $this->input->post('pH'),
            'Ash' => $this->input->post('Ash'),
            'Fatty' => $this->input->post('Fatty'),
            'Salinity' => $this->input->post('Salinity'),
            'Protein' => $this->input->post('Protein'),
            'Moisture' => $this->input->post('Moisture'),
            'Other2' => $this->input->post('Other2'),
            'description' => $this->input->post('description'),
            'production_code' => $this->input->post('production_code'),
            'best_before' => $this->input->post('best_before'),
            'quantity' => $this->input->post('quantity'),
            'remarks' => $this->input->post('remarks'),
            'sample_checking_correct' => $this->input->post('sample_checking_correct'),
            'sample_checking_incorrect' => $this->input->post('sample_checking_incorrect')

        );
        $this->db->insert('laboratory_sample', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('laboratory_sample.created_at', 'DESC');
        $query = $this->db->get('laboratory_sample');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('laboratory_sample', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('laboratory_sample');

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
        $this->db->delete('laboratory_sample');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}