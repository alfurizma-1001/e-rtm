<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Kettle_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function insert()
    {
        $uuid = Uuid::uuid4()->toString();
        $data['uuid'] = $uuid;
        $data['date'] = $this->input->post('date');
        $data['shift'] = $this->input->post('shift');
        $data['nama_produk'] = $this->input->post('nama_produk');
        $data['jenis_produk'] = $this->input->post('jenis_produk');
        $data['kode_produksi'] = $this->input->post('kode_produksi');
        $data['waktu_start_stop'] = $this->input->post('waktu_start_stop');
        $data['mesin'] = $this->input->post('mesin');
        $data['waktu'] = $this->input->post('waktu');
        $data['tahapan_proses'] = $this->input->post('tahapan_proses');
        $data['formulasike'] = $this->input->post('formulasike');
        $data['jenis_bahan'] = $this->input->post('jenis_bahan');
        $data['jumlah_standar'] = $this->input->post('jumlah_standar');
        $data['jumlah_aktual'] = $this->input->post('jumlah_aktual');
        $data['sensori'] = $this->input->post('sensori');
        $data['lama_proses'] = $this->input->post('lama_proses');
        $data['mixing_paddle_on'] = $this->input->post('mixing_paddle_on');
        $data['mixing_paddle_off'] = $this->input->post('mixing_paddle_off');
        $data['pressure'] = $this->input->post('pressure');
        $data['temperature'] = $this->input->post('temperature');
        $data['target_temperature'] = $this->input->post('target_temperature');
        $data['actual_temperature'] = $this->input->post('actual_temperature');
        $data['suhu_pusat_produk'] = $this->input->post('suhu_pusat_produk');
        $data['organoleptik_warna'] = $this->input->post('organoleptik_warna');
        $data['organoleptik_aroma'] = $this->input->post('organoleptik_aroma');
        $data['organoleptik_rasa'] = $this->input->post('organoleptik_rasa');
        $data['organoleptik_tekstur'] = $this->input->post('organoleptik_tekstur');
        $data['catatan'] = $this->input->post('catatan');
        // Insert into the database
        $this->db->insert('pem_kettle', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_all()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('pem_kettle');
        return $query->result();
    }
    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_kettle', $data);
        // Log the last query for debugging
        log_message('debug', 'Last Query: ' . $this->db->last_query());
        $affectedRows = $this->db->affected_rows();
        log_message('debug', 'Affected Rows: ' . $affectedRows);
        return ($affectedRows > 0) ? $affectedRows : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_kettle');
        return $query->row();
    }
    public function delete($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->delete('pem_kettle');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_date_and_shift($tanggal, $shift)
    {
        $this->db->where('date', $tanggal)->where('shift', $shift)->order_by('date', 'asc');
        return $this->db->get('pem_kettle')->result();
    }
    public function get_by_date($tanggal)
    {
        $this->db->where('date', $tanggal);
        $this->db->select('pem_kettle.*, pegawai.nama as nama_pegawai');
        $this->db->join('pegawai', 'pegawai.uuid = pem_kettle.qc', 'left');
        $query = $this->db->get('pem_kettle');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
