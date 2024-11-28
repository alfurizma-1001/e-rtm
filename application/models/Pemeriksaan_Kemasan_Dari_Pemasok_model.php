<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaan_Kemasan_Dari_Pemasok_model extends CI_Model
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
            'jenis_kemasan' => $this->input->post('jenis_kemasan'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'pemasok' => $this->input->post('pemasok'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'no_po' => $this->input->post('no_po'),
            'jumlah_barang_datang' => $this->input->post('jumlah_barang_datang'),
            'sampling' => $this->input->post('sampling'),
            'sesuai' => $this->input->post('sesuai'),
            'tidak_sesuai' => $this->input->post('tidak_sesuai'),
            'penampakan' => $this->input->post('penampakan'),
            'dimensi' => $this->input->post('dimensi'),
            'sealing' => $this->input->post('sealing'),
            'cetakan' => $this->input->post('cetakan'),
            'ketebalan' => $this->input->post('ketebalan'),
            'ok' => $this->input->post('ok'),
            'tolak' => $this->input->post('tolak'),
            'keterangan' => $this->input->post('keterangan'),
            'catatan' => $this->input->post('catatan')
        );
        $this->db->insert('pemeriksaan_kemasan_dari_pemasok', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('pemeriksaan_kemasan_dari_pemasok.created_at', 'DESC');
        $query = $this->db->get('pemeriksaan_kemasan_dari_pemasok');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('pemeriksaan_kemasan_dari_pemasok', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pemeriksaan_kemasan_dari_pemasok');

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
        $this->db->delete('pemeriksaan_kemasan_dari_pemasok');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}