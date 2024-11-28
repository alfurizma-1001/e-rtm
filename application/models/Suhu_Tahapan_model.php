<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class suhu_tahapan_model extends CI_Model
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
            'filling_portioning' => $this->input->post('filling_portioning'),
            'iqf' => $this->input->post('iqf'),
            'top_sealer' => $this->input->post('top_sealer'),
            'x_ray' => $this->input->post('x_ray'),
            'sticker' => $this->input->post('sticker'),
            'shrink' => $this->input->post('shrink'),
            'packing_box' => $this->input->post('packing_box'),
            'cold_storage' => $this->input->post('cold_storage'),
            'filling' => $this->input->post('filling'),
            'masuk_iqf' => $this->input->post('masuk_iqf'),
            'keluar_aktual' => $this->input->post('keluar_aktual'),
            'suhu_top_sealer' => $this->input->post('suhu_top_sealer'),
            'suhu_x_ray' => $this->input->post('suhu_x_ray'),
            'suhu_sticker' => $this->input->post('suhu_sticker'),
            'suhu_shrink' => $this->input->post('suhu_shrink'),
            'down_time' => $this->input->post('down_time'),
            'cold_aktual' => $this->input->post('cold_aktual'),
            'catatan_kanan' => $this->input->post('catatan_kanan'),
            'catatan' => $this->input->post('catatan')

        );
        $this->db->insert('suhu_tahapan', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('suhu_tahapan.created_at', 'DESC');
        $query = $this->db->get('suhu_tahapan');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('suhu_tahapan', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('suhu_tahapan');

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
        $this->db->delete('suhu_tahapan');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}