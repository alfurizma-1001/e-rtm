<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Loading_Lokal_model extends CI_Model
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
            'mulai_loading' => $this->input->post('mulai_loading'),
            'selesai_loading' => $this->input->post('selesai_loading'),
            'jenis_kendaraan' => $this->input->post('jenis_kendaraan'),
            'nomor_kendaraan' => $this->input->post('nomor_kendaraan'),
            'nama_ekspedisi' => $this->input->post('nama_ekspedisi'),
            'nama_supir' => $this->input->post('nama_supir'),
            'nama_pengirim' => $this->input->post('nama_pengirim'),
            'tujuan_pengiriman' => $this->input->post('tujuan_pengiriman'),
            'bersih' => $this->input->post('bersih'),
            'tidak_berdebu' => $this->input->post('tidak_berdebu'),
            'tidak_pecah' => $this->input->post('tidak_pecah'),
            'bebas_hama' => $this->input->post('bebas_hama'),
            'tidak_kondensasi' => $this->input->post('tidak_kondensasi'),
            'pecah' => $this->input->post('pecah'),
            'bebabs_produk_nonhalal' => $this->input->post('bebabs_produk_nonhalal'),
            'tidak_ada_noda' => $this->input->post('tidak_ada_noda'),
            'pallet_utuh' => $this->input->post('pallet_utuh'),
            'tidak_ada_sampah' => $this->input->post('tidak_ada_sampah'),
            'binatang' => $this->input->post('binatang'),
            'jamur' => $this->input->post('jamur'),
            'nama_produk' => $this->input->post('nama_produk'),
            'kondisi_produk' => $this->input->post('kondisi_produk'),
            'kondisi_kemasanan' => $this->input->post('kondisi_kemasanan'),
            'kode_produksi' => $this->input->post('kode_produksi'),
            'tanggal_kadaluarsa' => $this->input->post('tanggal_kadaluarsa'),
            'keterangan' => $this->input->post('keterangan'),
            'sanitasi_larutan' => $this->input->post('sanitasi_larutan'),
            'ppm_sanitasi_larutan' => $this->input->post('ppm_sanitasi_larutan'),
            'precooling' => $this->input->post('precooling'),
            'suhu_produk' => $this->input->post('suhu_produk'),
            'suhu_18' => $this->input->post('suhu_18'),
            'segel_terpasang' => $this->input->post('segel_terpasang'),
            'lama_delay' => $this->input->post('lama_delay')
        );
        $this->db->insert('loading_lokal', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_all()
    {
        $this->db->order_by('loading_lokal.created_at', 'DESC');
        $query = $this->db->get('loading_lokal');
        return $query->result();
    }

    public function update($uuid, $data)
    {
        $this->db->where('uuid', $uuid);
        $this->db->update('loading_lokal', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('loading_lokal');

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
        $this->db->delete('loading_lokal');
        return ($this->db->affected_rows() > 0) ? true : false;
    }


}