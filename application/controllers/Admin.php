<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'adm') {
            redirect('auth/login');
        }
    }
    
    public function dashboard()
    {
        $data['title'] = 'Dashboard Admin';
        
        $data['total_mhs'] = $this->db->where('role', 'mhs')->count_all_results('users');
        $data['total_dosen'] = $this->db->where('role', 'dsn')->count_all_results('users');
        $data['total_mitra'] = $this->db->count_all_results('perusahaan');
        $data['total_loker'] = $this->db->where('tenggat_pengajuan >=', date('Y-m-d'))->count_all_results('lowongan');

        $angkatan_target = 2022; 
        
        $this->db->where('role', 'mhs');
        $this->db->where('tahun_masuk', $angkatan_target);
        $total_target_mhs = $this->db->count_all_results('users');

        $this->db->select('COUNT(DISTINCT users.id) as jumlah');
        $this->db->from('users');
        $this->db->join('riwayat_magang', 'users.id = riwayat_magang.mahasiswa_id');
        $this->db->where('users.tahun_masuk', $angkatan_target);
        $sudah_magang = $this->db->get()->row()->jumlah;

        $data['stats_magang'] = [
            'sudah' => $sudah_magang,
            'belum' => ($total_target_mhs - $sudah_magang),
            'total' => $total_target_mhs,
            'angkatan' => $angkatan_target
        ];

        $data['stats_prodi'] = $this->db->query("
            SELECT prodi, COUNT(*) as jumlah 
            FROM users 
            WHERE role = 'mhs' 
            GROUP BY prodi
        ")->result();

        $data['top_mitra'] = $this->db->query("
            SELECT p.nama_perusahaan, p.logo, COUNT(rm.id) as jumlah 
            FROM riwayat_magang rm 
            JOIN perusahaan p ON p.id = rm.perusahaan_id 
            GROUP BY rm.perusahaan_id 
            ORDER BY jumlah DESC 
            LIMIT 5
        ")->result();

        $this->db->select('rm.*, u.nama_lengkap, p.nama_perusahaan, u.id as mahasiswa_id');
        $this->db->from('riwayat_magang rm');
        $this->db->join('users u', 'u.id = rm.mahasiswa_id');
        $this->db->join('perusahaan p', 'p.id = rm.perusahaan_id');
        $this->db->order_by('rm.tgl_mulai', 'DESC');
        $this->db->limit(5);
        $data['recent_activities'] = $this->db->get()->result();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_adm'); 
        $this->load->view('admin/dashboard', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }


    public function mahasiswa()
    {
        $data['title'] = 'Kelola Mahasiswa';
        
        $this->db->select('mhs.*, dsn.nama_lengkap as nama_dosen, 
            (SELECT COUNT(*) FROM riwayat_magang rm WHERE rm.mahasiswa_id = mhs.id AND rm.status = "Aktif") as magang_aktif,
            (SELECT COUNT(*) FROM riwayat_magang rm WHERE rm.mahasiswa_id = mhs.id) as total_riwayat');
        $this->db->from('users as mhs');
        $this->db->join('users as dsn', 'dsn.id = mhs.dosen_pembimbing_id', 'left');
        $this->db->where('mhs.role', 'mhs');
        $this->db->order_by('mhs.tahun_masuk', 'DESC');
        $data['mahasiswa'] = $this->db->get()->result();

        $this->db->where('role', 'dsn');
        $this->db->order_by('id', 'ASC');
        $data['dosen_list'] = $this->db->get('users')->result();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_adm'); 
        $this->load->view('admin/mahasiswa', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function tambah_mahasiswa()
    {
        $nim = $this->input->post('nim');
        
        if ($this->db->get_where('users', ['id' => $nim])->row()) {
            $this->session->set_flashdata('error', 'Gagal! NIM ' . $nim . ' sudah terdaftar.');
            redirect('admin/mahasiswa');
            return;
        }

        $dosen_id = $this->input->post('dosen_pembimbing_id') ?: NULL;

        $data = [
            'id'                     => $nim, 
            'nama_lengkap'           => $this->input->post('nama_lengkap'),
            'prodi'                  => $this->input->post('prodi'),
            'tahun_masuk'            => $this->input->post('tahun_masuk'),
            'telepon'                => $this->input->post('telepon'),
            'alamat'                 => $this->input->post('alamat'),
            'dosen_pembimbing_id'    => $dosen_id,
            'role'                   => 'mhs', 
            'password'               => password_hash('CyberCareer25', PASSWORD_DEFAULT),
            'default_password_changed' => 0
        ];

        if($this->db->insert('users', $data)) {
            $this->session->set_flashdata('success', 'Mahasiswa baru berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyimpan data.');
        }
        redirect('admin/mahasiswa');
    }

    public function update_mahasiswa()
    {
        $id_lama = $this->input->post('id_mhs_lama');
        $dosen_id = $this->input->post('dosen_pembimbing_id') ?: NULL;

        $data = [
            'id'                  => $this->input->post('nim'),
            'nama_lengkap'        => $this->input->post('nama_lengkap'),
            'tahun_masuk'         => $this->input->post('tahun_masuk'),
            'prodi'               => $this->input->post('prodi'),
            'ipk_terakhir'        => $this->input->post('ipk_terakhir'),
            'dosen_pembimbing_id' => $dosen_id,
            'telepon'             => $this->input->post('telepon'),
            'alamat'              => $this->input->post('alamat'),
            'tentang_saya'        => $this->input->post('tentang_saya'),
            'linkedin'            => $this->input->post('linkedin'),
            'github'              => $this->input->post('github'),
            'website'             => $this->input->post('website')
        ];

        if ($this->input->post('reset_password') == '1') {
            $data['password'] = password_hash('CyberCareer25', PASSWORD_DEFAULT);
            $data['default_password_changed'] = 0; 
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->where('id', $id_lama);
        $this->db->update('users', $data);
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        $this->session->set_flashdata('success', 'Data mahasiswa berhasil diperbarui.');
        redirect('admin/mahasiswa');
    }

    public function riwayat_mahasiswa($id_mahasiswa)
    {
        $data['mhs'] = $this->db->get_where('users', ['id' => $id_mahasiswa])->row();
        if(!$data['mhs']) show_404();

        $this->db->select('riwayat_magang.*, perusahaan.nama_perusahaan, perusahaan.logo');
        $this->db->from('riwayat_magang');
        $this->db->join('perusahaan', 'perusahaan.id = riwayat_magang.perusahaan_id');
        $this->db->where('mahasiswa_id', $id_mahasiswa);
        $this->db->order_by('tgl_mulai', 'DESC');
        $data['riwayat'] = $this->db->get()->result();

        $this->db->select('logbook.*, perusahaan.nama_perusahaan');
        $this->db->from('logbook');
        $this->db->join('perusahaan', 'perusahaan.id = logbook.perusahaan_id');
        $this->db->where('logbook.mahasiswa_id', $id_mahasiswa);
        $this->db->order_by('logbook.tanggal', 'DESC');
        $data['logbooks'] = $this->db->get()->result();

        $data['title'] = 'Detail Riwayat - ' . $data['mhs']->nama_lengkap;
        
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_adm'); 
        $this->load->view('admin/mahasiswa', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function tambah_riwayat_mhs()
    {
        $id_mahasiswa = $this->input->post('id_mahasiswa');
        $nama_perusahaan = $this->input->post('nama_perusahaan'); 

        $perusahaan = $this->db->get_where('perusahaan', ['nama_perusahaan' => $nama_perusahaan])->row();

        if ($perusahaan) {
            $perusahaan_id = $perusahaan->id;
        } else {
            $data_pt = [
                'nama_perusahaan' => $nama_perusahaan,
                'alamat'          => $this->input->post('lokasi'),
                'industri'        => 'Lainnya'
            ];
            $this->db->insert('perusahaan', $data_pt);
            $perusahaan_id = $this->db->insert_id();
        }

        $data = [
            'mahasiswa_id'  => $id_mahasiswa,
            'perusahaan_id' => $perusahaan_id,
            'posisi'        => $this->input->post('posisi'),
            'lokasi'        => $this->input->post('lokasi'),
            'tgl_mulai'     => $this->input->post('tgl_mulai'),
            'tgl_selesai'   => ($this->input->post('status') == 'Aktif') ? NULL : $this->input->post('tgl_selesai'),
            'status'        => $this->input->post('status')
        ];

        $this->db->insert('riwayat_magang', $data);
        $this->session->set_flashdata('success', 'Riwayat magang berhasil ditambahkan.');
        redirect('admin/riwayat_mahasiswa/' . $id_mahasiswa);
    }
    
    public function hapus_riwayat($id)
    {
        $this->db->delete('riwayat_magang', ['id' => $id]);
        $this->session->set_flashdata('success', 'Riwayat dihapus.');
        redirect($_SERVER['HTTP_REFERER']);
    }


    public function dosen()
    {
        $data['title'] = 'Kelola Dosen';
        
        $this->db->select('u.*, (SELECT COUNT(*) FROM users mhs WHERE mhs.dosen_pembimbing_id = u.id) as jumlah_bimbingan');
        $this->db->from('users u');
        $this->db->where('u.role', 'dsn');
        $this->db->order_by('u.nama_lengkap', 'ASC');
        $data['dosen'] = $this->db->get()->result();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_adm'); 
        $this->load->view('admin/dosen', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function tambah_dosen()
    {
        $nidn = $this->input->post('nidn');
        
        if($this->db->get_where('users', ['id' => $nidn])->row()) {
            $this->session->set_flashdata('error', 'NIDN sudah terdaftar!');
            redirect('admin/dosen');
            return;
        }

        $data = [
            'id'             => $nidn,
            'nama_lengkap'   => $this->input->post('nama'),
            'prodi'          => $this->input->post('prodi'),
            'role'           => 'dsn',
            'password'       => password_hash('CyberCareer25', PASSWORD_DEFAULT),
            'default_password_changed' => 0
        ];
        
        $this->db->insert('users', $data);
        $this->session->set_flashdata('success', 'Dosen berhasil ditambahkan');
        redirect('admin/dosen');
    }

    public function update_dosen()
    {
        $id_lama = $this->input->post('id_lama');
        $data = [
            'id'           => $this->input->post('nidn'),
            'nama_lengkap' => $this->input->post('nama'),
            'prodi'        => $this->input->post('prodi')
        ];
        
        if($this->input->post('reset_password') == '1'){
            $data['password'] = password_hash('CyberCareer25', PASSWORD_DEFAULT);
            $data['default_password_changed'] = 0;
        }

        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->where('id', $id_lama);
        $this->db->update('users', $data);
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        $this->session->set_flashdata('success', 'Data Dosen diperbarui');
        redirect('admin/dosen');
    }


    public function mitra()
    {
        $data['title'] = 'Kelola Mitra Industri';
        
        $this->db->select('perusahaan.*, (SELECT COUNT(*) FROM lowongan WHERE lowongan.perusahaan_id = perusahaan.id) as jumlah_loker');
        $this->db->order_by('nama_perusahaan', 'ASC');
        $data['mitra'] = $this->db->get('perusahaan')->result();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_adm'); 
        $this->load->view('admin/mitra', $data);
        echo '</div>'; 
        $this->load->view('partials/footer');
    }

    public function detail_mitra($id_perusahaan)
    {
        $data['mitra'] = $this->db->get_where('perusahaan', ['id' => $id_perusahaan])->row();
        
        if(!$data['mitra']) show_404();

        $data['title'] = 'Kelola Lowongan - ' . $data['mitra']->nama_perusahaan;

        $this->db->where('perusahaan_id', $id_perusahaan);
        $this->db->order_by('tgl_posting', 'DESC');
        $data['lowongan'] = $this->db->get('lowongan')->result();

        $this->load->view('admin/menu', $data);
        $this->load->view('admin/detail_mitra', $data);
        $this->load->view('partials/footer_dashboard');
    }

    public function tambah_mitra()
    {
        $data = [
            'nama_perusahaan' => $this->input->post('nama'),
            'industri'        => $this->input->post('industri'),
            'alamat'          => $this->input->post('alamat'),
            'website'         => $this->input->post('website')
        ];
        $this->db->insert('perusahaan', $data);
        $this->session->set_flashdata('success', 'Mitra berhasil ditambahkan');
        redirect('admin/mitra');
    }

    public function update_mitra()
    {
        $id = $this->input->post('id_mitra');
        $data = [
            'nama_perusahaan' => $this->input->post('nama'),
            'industri'        => $this->input->post('industri'),
            'website'         => $this->input->post('website'),
            'alamat'          => $this->input->post('alamat')
        ];

        $this->db->where('id', $id);
        $this->db->update('perusahaan', $data);
        
        $this->session->set_flashdata('success', 'Data Mitra berhasil diperbarui!');
        redirect('admin/mitra');
    }

    public function hapus_mitra($id)
    {
        $this->db->delete('perusahaan', ['id' => $id]);
        $this->session->set_flashdata('success', 'Mitra dihapus');
        redirect('admin/mitra');
    }

    
    public function tambah_lowongan()
    {
        $data = [
            'perusahaan_id'     => $this->input->post('perusahaan_id'),
            'posisi'            => $this->input->post('posisi'),
            'tipe'              => $this->input->post('tipe'),
            'kuota'             => $this->input->post('kuota'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'kualifikasi'       => $this->input->post('kualifikasi'),
            'tenggat_pengajuan' => $this->input->post('tenggat_pengajuan'),
            'link_pendaftaran'  => $this->input->post('link_pendaftaran'),
            'tgl_posting'       => date('Y-m-d')
        ];

        $this->db->insert('lowongan', $data);
        $this->session->set_flashdata('success', 'Lowongan berhasil diterbitkan!');
        
        redirect($_SERVER['HTTP_REFERER']); 
    }

    public function update_lowongan()
    {
        $id = $this->input->post('id_lowongan');
        $data = [
            'posisi'            => $this->input->post('posisi'),
            'tipe'              => $this->input->post('tipe'),
            'kuota'             => $this->input->post('kuota'),
            'deskripsi'         => $this->input->post('deskripsi'),
            'kualifikasi'       => $this->input->post('kualifikasi'),
            'tenggat_pengajuan' => $this->input->post('tenggat_pengajuan'),
            'link_pendaftaran'  => $this->input->post('link_pendaftaran')
        ];

        $this->db->where('id', $id);
        $this->db->update('lowongan', $data);
        
        $this->session->set_flashdata('success', 'Lowongan berhasil diperbarui!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function hapus_lowongan($id)
    {
        $this->db->delete('lowongan', ['id' => $id]);
        $this->session->set_flashdata('success', 'Lowongan dihapus.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    
    public function get_user_detail($id)
    {
        $data = $this->db->get_where('users', ['id' => $id])->row();
        echo json_encode($data);
    }

    public function get_mitra_detail($id)
    {
        $data = $this->db->get_where('perusahaan', ['id' => $id])->row();
        echo json_encode($data);
    }
    
    public function get_loker_detail($id)
    {
        $data = $this->db->get_where('lowongan', ['id' => $id])->row();
        echo json_encode($data);
    }

    public function hapus_user($id)
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data pengguna berhasil dihapus.');
        redirect($_SERVER['HTTP_REFERER']);
    }
}