<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Halaman Beranda.
     */
    public function home()
    {
        $profil = [
            'nama'     => 'Dafa Kumara Sahasika',
            'nrp'      => '5025241112',
            'jurusan'  => 'Teknik Informatika',
            'fakultas' => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
            'kampus'   => 'Institut Teknologi Sepuluh Nopember (ITS)',
        ];

        return view('home', compact('profil'));
    }

    /**
     * Halaman Profil Mahasiswa.
     * Membaca ?status= untuk alert interaktif.
     */
    public function profile(Request $request)
    {
        $status = $request->query('status');

        $mahasiswa = [
            'nama'      => 'Dafa Kumara Sahasika',
            'nrp'       => '5025241112',
            'prodi'     => 'Teknik Informatika',
            'fakultas'  => 'Fakultas Teknologi Elektro dan Informatika Cerdas',
            'kampus'    => 'Institut Teknologi Sepuluh Nopember (ITS)',
            'angkatan'  => 2024,
            'semester'  => 5,
            'email'     => '5025241112@student.its.ac.id',
            'minat'     => 'Data Science, Artificial Intelligence',
            'deskripsi' => 'Mahasiswa Teknik Informatika ITS angkatan 2024 dengan minat di bidang Data Science dan Artificial Intelligence.',
            'matakuliah' => [
                'Pemrograman Berbasis Kerangka Kerja',
                'Rekayasa Kebutuhan',
                'Tata Kelola Teknologi Informasi',
                'Rekayasa Sistem Berbasis Pengetahuan',
                'Grafika Komputer',
                'Permodelan dan Simulasi',
                'Keamanan Informasi',
            ],
        ];

        return view('profil-mahasiswa', compact('mahasiswa', 'status'));
    }

    /**
     * Halaman Ide Agentic AI.
     */
    public function agent()
    {
        $idea = [
            'nama'       => 'AI Gmail Inbox Manager',
            'masalah'    => 'Mahasiswa memiliki banyak email akademik, notifikasi, newsletter, dan promosi yang menumpuk sehingga email penting sulit ditemukan dan pengelolaan manual membutuhkan waktu.',
            'tujuan'     => 'Membangun agent AI yang menganalisis dan mengelompokkan email serta memberikan rekomendasi pengelolaan dengan persetujuan pengguna.',
            'solusi'     => 'Konsep solusi yang diajukan adalah memanfaatkan Gmail API untuk membaca email yang diizinkan oleh pengguna, menganalisis sender, subject, content, dan timestamp, mengklasifikasikan email, lalu merekomendasikan tindakan Keep, Label, Archive, atau Trash.',
            'cara_kerja' => 'User menghubungkan Gmail → Agent mengambil email yang diizinkan → Analyze → Classify → Recommend → User Review → Label/Archive/Trash.',
            'teknologi'  => ['Python', 'LangGraph', 'Gemini', 'Gmail API', 'Google OAuth 2.0', 'Gmail Labels'],
            'target'     => 'Prototype agent Gmail yang dapat menganalisis inbox, memberikan rekomendasi, dan menjalankan tindakan setelah user approval.',
        ];

        return view('ide-agent', compact('idea'));
    }
}
