<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Masak_Noodle_model extends CI_Model
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
            'kode_produksi' => $this->input->post('kode_produksi'),
            'mixing_bahan_utama' => $this->input->post('mixing_bahan_utama'),
            'mixing_kode_produksi' => $this->input->post('mixing_kode_produksi'),
            'mixing_berat' => $this->input->post('mixing_berat'),
            'bahan_lain' => $this->input->post('bahan_lain'),
            'bahan_lain_kode_produksi' => $this->input->post('bahan_lain_kode_produksi'),
            'bahan_lain_berat' => $this->input->post('bahan_lain_berat'),
            'bahan_lain_kode_produksi_item2' => $this->input->post('bahan_lain_kode_produksi_item2'),
            'bahan_lain_berat_item2' => $this->input->post('bahan_lain_berat_item2'),
            'waktu_proses' => $this->input->post('waktu_proses'),
            'vacuum' => $this->input->post('vacuum'),
            'suhu_adonan' => $this->input->post('suhu_adonan'),
            'aging_waktu' => $this->input->post('aging_waktu'),
            'aging_rh' => $this->input->post('aging_rh'),
            'aging_suhu_ruangan' => $this->input->post('aging_suhu_ruangan'),
            'rolling_ukuran_tebal' => $this->input->post('rolling_ukuran_tebal'),
            'cutting_sampling_berat' => $this->input->post('cutting_sampling_berat'),
            'boiling_suhu_setting_water' => $this->input->post('boiling_suhu_setting_water'),
            'boiling_suhu_actual_water' => $this->input->post('boiling_suhu_actual_water'),
            'boiling_waktu' => $this->input->post('boiling_waktu'),
            'washing_suhu_setting_water' => $this->input->post('washing_suhu_setting_water'),
            'washing_suhu_actual_water' => $this->input->post('washing_suhu_actual_water'),
            'washing_waktu' => $this->input->post('washing_waktu'),
            'cooling_suhu_setting_water' => $this->input->post('cooling_suhu_setting_water'),
            'cooling_suhu_actual_water' => $this->input->post('cooling_suhu_actual_water'),
            'cooling_waktu' => $this->input->post('cooling_waktu'),
            'lama_proses_jam_mulai' => $this->input->post('lama_proses_jam_mulai'),
            'lama_proses_jam_selesai' => $this->input->post('lama_proses_jam_selesai'),
            'sensori_suhu_produk_akhir' => $this->input->post('sensori_suhu_produk_akhir'),
            'sensori_suhu_produk_setelah' => $this->input->post('sensori_suhu_produk_setelah'),
            'sensori_rasa' => $this->input->post('sensori_rasa'),
            'sensori_kekenyalan' => $this->input->post('sensori_kekenyalan'),
            'sensori_warna' => $this->input->post('sensori_warna'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('pem_masak_noodle', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pem_masak_noodle.created_at', 'DESC');
        $query = $this->db->get('pem_masak_noodle');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_masak_noodle', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_masak_noodle');

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
        $this->db->delete('pem_masak_noodle');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}