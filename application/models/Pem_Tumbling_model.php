<?php
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pem_Tumbling_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
    }
    public function rules()
    {

        return [
            ['field' => 'date', 'label' => 'Date', 'rules' => 'required|valid_date'],
            ['field' => 'shift', 'label' => 'Shift', 'rules' => 'required'],
            ['field' => 'nama_produk', 'label' => 'Nama Produk', 'rules' => 'required'],
            ['field' => 'batch_no', 'label' => 'Batch No', 'rules' => 'required'],
            ['field' => 'identifikasi_daging', 'label' => 'Identifikasi Daging', 'rules' => 'required'],
            ['field' => 'asal', 'label' => 'Asal', 'rules' => 'required'],
            ['field' => 'tanggal_produksi_kode', 'label' => 'Tanggal Produksi Kode', 'rules' => ''],
            ['field' => 'tanggal_produksi_kode2', 'label' => 'Tanggal Produksi Kode 2', 'rules' => ''],
            ['field' => 'berat_daging', 'label' => 'Berat Daging', 'rules' => '|numeric'],
            ['field' => 'suhu_daging', 'label' => 'Suhu Daging', 'rules' => '|numeric'],
            ['field' => 'suhu_daging2', 'label' => 'Suhu Daging 2', 'rules' => 'numeric'],
            ['field' => 'suhu_daging3', 'label' => 'Suhu Daging 3', 'rules' => 'numeric'],
            ['field' => 'suhu_daging4', 'label' => 'Suhu Daging 4', 'rules' => 'numeric'],
            ['field' => 'berat_daging2', 'label' => 'Berat Daging 2', 'rules' => 'numeric'],
            ['field' => 'suhu_daging5', 'label' => 'Suhu Daging 5', 'rules' => 'numeric'],
            ['field' => 'suhu_daging6', 'label' => 'Suhu Daging 6', 'rules' => 'numeric'],
            ['field' => 'suhu_daging7', 'label' => 'Suhu Daging 7', 'rules' => 'numeric'],
            ['field' => 'suhu_daging8', 'label' => 'Suhu Daging 8', 'rules' => 'numeric'],
            ['field' => 'rataratadaging', 'label' => 'Rata-rata Daging', 'rules' => 'numeric'],
            ['field' => 'rataratadaging2', 'label' => 'Rata-rata Daging 2', 'rules' => 'numeric'],
            ['field' => 'kondisi_daging', 'label' => 'Kondisi Daging', 'rules' => ''],
            ['field' => 'bahan_utama', 'label' => 'Bahan Utama', 'rules' => ''],
            ['field' => 'bahan_utama2', 'label' => 'Bahan Utama 2', 'rules' => ''],
            ['field' => 'bahan_utama3', 'label' => 'Bahan Utama 3', 'rules' => ''],
            ['field' => 'kode_marinade1', 'label' => 'Kode Marinade 1', 'rules' => ''],
            ['field' => 'kode_marinade2', 'label' => 'Kode Marinade 2', 'rules' => ''],
            ['field' => 'kode_marinade3', 'label' => 'Kode Marinade 3', 'rules' => ''],
            ['field' => 'kode_marinade4', 'label' => 'Kode Marinade 4', 'rules' => ''],
            ['field' => 'kode_marinade5', 'label' => 'Kode Marinade 5', 'rules' => ''],
            ['field' => 'kode_marinade6', 'label' => 'Kode Marinade 6', 'rules' => ''],
            ['field' => 'berat_marinade1', 'label' => 'Berat Marinade', 'rules' => 'numeric'],
            ['field' => 'berat_marinade2', 'label' => 'Berat Marinade 2', 'rules' => 'numeric'],
            ['field' => 'berat_marinade3', 'label' => 'Berat Marinade 3', 'rules' => 'numeric'],
            ['field' => 'berat_marinade4', 'label' => 'Berat Marinade 4', 'rules' => 'numeric'],
            ['field' => 'berat_marinade5', 'label' => 'Berat Marinade 5', 'rules' => 'numeric'],
            ['field' => 'berat_marinade6', 'label' => 'Berat Marinade 6', 'rules' => 'numeric'],
            ['field' => 'bahan_lain1', 'label' => 'Bahan Lain 1', 'rules' => ''],
            ['field' => 'bahan_lain2', 'label' => 'Bahan Lain 2', 'rules' => ''],
            ['field' => 'bahan_lain3', 'label' => 'Bahan Lain 3', 'rules' => ''],
            ['field' => 'bahan_lain4', 'label' => 'Bahan Lain 4', 'rules' => ''],
            ['field' => 'bahan_lain5', 'label' => 'Bahan Lain 5', 'rules' => ''],
            ['field' => 'kode_bahan_lain1', 'label' => 'Kode Bahan Lain 1', 'rules' => ''],
            ['field' => 'kode_bahan_lain2', 'label' => 'Kode Bahan Lain 2', 'rules' => ''],
            ['field' => 'kode_bahan_lain3', 'label' => 'Kode Bahan Lain 3', 'rules' => ''],
            ['field' => 'kode_bahan_lain4', 'label' => 'Kode Bahan Lain 4', 'rules' => ''],
            ['field' => 'kode_bahan_lain5', 'label' => 'Kode Bahan Lain 5', 'rules' => ''],
            ['field' => 'berat_bahan_lain1', 'label' => 'Berat Bahan Lain 1', 'rules' => 'numeric'],
            ['field' => 'berat_bahan_lain2', 'label' => 'Berat Bahan Lain 2', 'rules' => 'numeric'],
            ['field' => 'berat_bahan_lain3', 'label' => 'Berat Bahan Lain 3', 'rules' => 'numeric'],
            ['field' => 'berat_bahan_lain4', 'label' => 'Berat Bahan Lain 4', 'rules' => 'numeric'],
            ['field' => 'berat_bahan_lain5', 'label' => 'Berat Bahan Lain 5', 'rules' => 'numeric'],
            ['field' => 'sensor_bahan_lain1', 'label' => 'Sensor Bahan Lain 1', 'rules' => ''],
            ['field' => 'sensor_bahan_lain2', 'label' => 'Sensor Bahan Lain 2', 'rules' => ''],
            ['field' => 'sensor_bahan_lain3', 'label' => 'Sensor Bahan Lain 3', 'rules' => ''],
            ['field' => 'sensor_bahan_lain4', 'label' => 'Sensor Bahan Lain 4', 'rules' => ''],
            ['field' => 'sensor_bahan_lain5', 'label' => 'Sensor Bahan Lain 5', 'rules' => ''],
            ['field' => 'air', 'label' => 'Air', 'rules' => 'numeric'],
            ['field' => 'suhu_air', 'label' => 'Suhu Air', 'rules' => 'numeric'],
            ['field' => 'suhu_marinade', 'label' => 'Suhu Marinade', 'rules' => 'numeric'],
            ['field' => 'lama_pengadukan', 'label' => 'Lama Pengadukan', 'rules' => 'numeric'],
            ['field' => 'marinade_brix', 'label' => 'Marinade Brix', 'rules' => 'numeric'],
            ['field' => 'drum_on', 'label' => 'Drum On', 'rules' => 'required'],
            ['field' => 'drum_off', 'label' => 'Drum Off', 'rules' => 'required'],
            ['field' => 'drum_speed', 'label' => 'Drum Speed', 'rules' => 'numeric'],
            ['field' => 'vacuum_time', 'label' => 'Vacuum Time', 'rules' => 'numeric'],
            ['field' => 'total_time', 'label' => 'Total Time', 'rules' => 'numeric'],
            ['field' => 'mulai', 'label' => 'Mulai', 'rules' => 'required'],
            ['field' => 'selesai', 'label' => 'Selesai', 'rules' => 'required'],
            ['field' => 'suhu_daging_tumbling1', 'label' => 'Suhu Daging Tumbling', 'rules' => 'numeric'],
            ['field' => 'suhu_daging_tumbling2', 'label' => 'Suhu Daging Tumbling 2', 'rules' => 'numeric'],
            ['field' => 'suhu_daging_tumbling3', 'label' => 'Suhu Daging Tumbling 3', 'rules' => 'numeric'],
            ['field' => 'suhu_daging_tumbling4', 'label' => 'Suhu Daging Tumbling 4', 'rules' => 'numeric'],
            ['field' => 'suhu_daging_tumbling5', 'label' => 'Suhu Daging Tumbling 5', 'rules' => 'numeric'],
            ['field' => 'suhu_daging_tumbling6', 'label' => 'Suhu Daging Tumbling 6', 'rules' => 'numeric'],
            ['field' => 'rataratatumbling', 'label' => 'Rata-rata Tumbling', 'rules' => 'numeric'],
            ['field' => 'kondisi', 'label' => 'Kondisi', 'rules' => 'required'],
            ['field' => 'catatan_kondisi', 'label' => 'Catatan Kondisi', 'rules' => ''],
            ['field' => 'catatan', 'label' => 'Catatan', 'rules' => '']
        ];
    }


    public function insert()
    {
        $uuid = Uuid::uuid4()->toString();
        $data = array(
            'uuid' => $uuid,
            'date' => $this->input->post('date'),
            'shift' => $this->input->post('shift'),
            'nama_produk' => $this->input->post('nama_produk'),
            'batch_no' => $this->input->post('batch_no'),
            'identifikasi_daging' => $this->input->post('identifikasi_daging'),
            'asal' => $this->input->post('asal'),
            'kode_item_1' => $this->input->post('kode_item_1'),
            'kode_item_2' => $this->input->post('kode_item_2'),
            'kode_item_3' => $this->input->post('kode_item_3'),
            'kode_item_4' => $this->input->post('kode_item_4'),
            'berat_item_1' => $this->input->post('berat_item_1'),
            'berat_item_2' => $this->input->post('berat_item_2'),
            'berat_item_3' => $this->input->post('berat_item_3'),
            'berat_item_4' => $this->input->post('berat_item_4'),
            'suhu_daging_item_1' => $this->input->post('suhu_daging_item_1'),
            'suhu_daging_item_2' => $this->input->post('suhu_daging_item_2'),
            'suhu_daging_item_3' => $this->input->post('suhu_daging_item_3'),
            'suhu_daging_item_4' => $this->input->post('suhu_daging_item_4'),
            'rata_rata_item_1' => $this->input->post('rata_rata_item_1'),
            'rata_rata_item_2' => $this->input->post('rata_rata_item_2'),
            'rata_rata_item_3' => $this->input->post('rata_rata_item_3'),
            'rata_rata_item_4' => $this->input->post('rata_rata_item_4'),
            'kondisi_daging' => $this->input->post('kondisi_daging'),
            'marinade_bahan_utama_1' => $this->input->post('marinade_bahan_utama_1'),
            'marinade_bahan_utama_2' => $this->input->post('marinade_bahan_utama_2'),
            'marinade_bahan_utama_3' => $this->input->post('marinade_bahan_utama_3'),
            'marinade_bahan_utama_4' => $this->input->post('marinade_bahan_utama_4'),
            'marinade_kode_1' => $this->input->post('marinade_kode_1'),
            'marinade_kode_2' => $this->input->post('marinade_kode_2'),
            'marinade_kode_3' => $this->input->post('marinade_kode_3'),
            'marinade_kode_4' => $this->input->post('marinade_kode_4'),
            'marinade_berat_1' => $this->input->post('marinade_berat_1'),
            'marinade_berat_2' => $this->input->post('marinade_berat_2'),
            'marinade_berat_3' => $this->input->post('marinade_berat_3'),
            'marinade_berat_4' => $this->input->post('marinade_berat_4'),
            'marinade_kode_next_1' => $this->input->post('marinade_kode_next_1'),
            'marinade_kode_next_2' => $this->input->post('marinade_kode_next_2'),
            'marinade_kode_next_3' => $this->input->post('marinade_kode_next_3'),
            'marinade_kode_next_4' => $this->input->post('marinade_kode_next_4'),
            'marinade_berat_next_1' => $this->input->post('marinade_berat_next_1'),
            'marinade_berat_next_2' => $this->input->post('marinade_berat_next_2'),
            'marinade_berat_next_3' => $this->input->post('marinade_berat_next_3'),
            'marinade_berat_next_4' => $this->input->post('marinade_berat_next_4'),
            'bahan_lain' => $this->input->post('bahan_lain'),
            'bahan_lain_kode_item_1' => $this->input->post('bahan_lain_kode_item_1'),
            'bahan_lain_berat_item_1' => $this->input->post('bahan_lain_berat_item_1'),
            'bahan_lain_sensori_item_1' => $this->input->post('bahan_lain_sensori_item_1'),
            'bahan_lain_kode_item_2' => $this->input->post('bahan_lain_kode_item_2'),
            'bahan_lain_berat_item_2' => $this->input->post('bahan_lain_berat_item_2'),
            'bahan_lain_sensori_item_2' => $this->input->post('bahan_lain_sensori_item_2'),
            'bahan_lain_kode_item_3' => $this->input->post('bahan_lain_kode_item_3'),
            'bahan_lain_berat_item_3' => $this->input->post('bahan_lain_berat_item_3'),
            'bahan_lain_sensori_item_3' => $this->input->post('bahan_lain_sensori_item_3'),
            'bahan_lain_kode_item_4' => $this->input->post('bahan_lain_kode_item_4'),
            'bahan_lain_berat_item_4' => $this->input->post('bahan_lain_berat_item_4'),
            'bahan_lain_sensori_item_4' => $this->input->post('bahan_lain_sensori_item_4'),
            'air' => $this->input->post('air'),
            'suhu_air' => $this->input->post('suhu_air'),
            'suhu_marinade' => $this->input->post('suhu_marinade'),
            'lama_pengadukan' => $this->input->post('lama_pengadukan'),
            'brix_salinity' => $this->input->post('brix_salinity'),
            'drum_on' => $this->input->post('drum_on'),
            'drum_off' => $this->input->post('drum_off'),
            'drum_speed' => $this->input->post('drum_speed'),
            'vacuum_time' => $this->input->post('vacuum_time'),
            'total_time' => $this->input->post('total_time'),
            'mulai_item_1' => $this->input->post('mulai_item_1'),
            'mulai_item_2' => $this->input->post('mulai_item_2'),
            'mulai_item_3' => $this->input->post('mulai_item_3'),
            'mulai_item_4' => $this->input->post('mulai_item_4'),
            'selesai_item_1' => $this->input->post('selesai_item_1'),
            'selesai_item_2' => $this->input->post('selesai_item_2'),
            'selesai_item_3' => $this->input->post('selesai_item_3'),
            'selesai_item_4' => $this->input->post('selesai_item_4'),
            'tumbling_suhu_daging_item_1' => $this->input->post('tumbling_suhu_daging_item_1'),
            'tumbling_suhu_daging_item_2' => $this->input->post('tumbling_suhu_daging_item_2'),
            'tumbling_suhu_daging_item_3' => $this->input->post('tumbling_suhu_daging_item_3'),
            'tumbling_suhu_daging_item_4' => $this->input->post('tumbling_suhu_daging_item_4'),
            'tumbling_rata_rata' => $this->input->post('tumbling_rata_rata'),
            'kondisi' => $this->input->post('kondisi'),
            'catatan_bawah' => $this->input->post('catatan_bawah'),
            'catatan' => $this->input->post('catatan')


        );

        $this->db->insert('pem_tumbling', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_all()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('pem_tumbling');
        return $query->result();
    }

    public function update($uuid, $data, $decrementFields = [])
    {
        // Start a transaction
        $this->db->trans_start();

        // If there are fields to decrement
        if (!empty($decrementFields)) {
            foreach ($decrementFields as $field => $amount) {
                // Ensure the amount is numeric and greater than 0
                if (is_numeric($amount) && $amount > 0) {
                    $this->db->set($field, "$field - $amount", FALSE);
                }
            }
        }

        // Update the other fields
        $this->db->where('uuid', $uuid);
        $this->db->update('pem_tumbling', $data);

        // Complete the transaction
        $this->db->trans_complete();

        // Check if the transaction was successful
        return ($this->db->trans_status() && $this->db->affected_rows() > 0);
    }
    public function exists($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_tumbling'); // Replace with your actual table name

        return $query->num_rows() > 0; // Returns true if a record exists
    }

    public function get_by_uuid($uuid)
    {
        $this->db->where('uuid', $uuid);
        $query = $this->db->get('pem_tumbling');
        return $query->row();
    }

    public function delete($uuid)
    {
        $this->db->where('uuid', $uuid);
        $this->db->delete('pem_tumbling');
        return ($this->db->affected_rows() > 0) ? true : false;
    }
    public function get_by_date($tanggal)
    {
        $this->db->where('date', $tanggal);
        return $this->db->get('pem_tumbling')->result();
    }

}