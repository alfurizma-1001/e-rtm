<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaan_Premix_model extends CI_Model
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
            'no_mobil' => $this->input->post('no_mobil'),
            'nama_supir' => $this->input->post('nama_supir'),
            'nama_produk' => $this->input->post('nama_produk'),
            'pemasok' => $this->input->post('pemasok'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'exp_date' => $this->input->post('exp_date'),
            'jumlah_barang_datang' => $this->input->post('jumlah_barang_datang'),
            'jumlah_sample_cek' => $this->input->post('jumlah_sample_cek'),
            'sesuai' => $this->input->post('sesuai'),
            'tidak_sesuai' => $this->input->post('tidak_sesuai'),
            'berat_premix' => $this->input->post('berat_premix'),
            'kemasan' => $this->input->post('kemasan'),
            'warna' => $this->input->post('warna'),
            'jamur' => $this->input->post('jamur'),
            'aroma' => $this->input->post('aroma'),
            'ok' => $this->input->post('ok'),
            'tolak' => $this->input->post('tolak'),
            'catatan' => $this->input->post('catatan'),
            'keterangan' => $this->input->post('keterangan')

        );
        $this->db->insert('pemeriksaan_premix', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pemeriksaan_premix.created_at', 'DESC');
        $query = $this->db->get('pemeriksaan_premix');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pemeriksaan_premix', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pemeriksaan_premix');

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
        $this->db->delete('pemeriksaan_premix');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}