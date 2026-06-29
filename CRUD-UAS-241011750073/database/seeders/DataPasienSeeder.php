<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pasien;

class DataPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'images/a-character-having-influenza-flat-style-illustration-vector-3896411212.jpg',
            'images/a-flat-illustration-of-a-man-experiencing-a-cold-sitting-in-bed-and-blowing-his-nose-vector-3316874420.jpg',
            'images/a-young-patient-sitting-in-a-chair-feeling-unwell-due-to-cold-and-flu-symptoms-while-resting-at-home-file-no-background-patient-with-cold-and-flu-sitting-on-a-chair-free-png-1500387541.png',
            'images/cozy-person-with-hotp-cup-in-chair-at-home-vector-604950865.jpg',
            'images/man-sick-with-thermometer-free-png-3286524837.png',
            'images/sick-boy-in-bed-thermometer-medicine-vector-1523888103.jpg',
            'images/sick-boy-in-bed-with-fever-remedies-illustration-vector-3112341621.jpg',
            'images/sick-boy-with-fever-symptom-vector-3495800981.jpg',
            'images/sick-cartoon-man-illustration-free-vector-1889386416.jpg',
            'images/sick-child-bed-toy-car-scene-vector-2475753415.jpg',
            'images/sick-little-boy-has-high-fever-flu-and-cold-lying-on-bed-with-thermometer-in-his-mouth-vector-3661674423.jpg',
            'images/sick-little-girl-has-high-fever-flu-and-cold-lying-on-bed-with-thermometer-in-her-mouth-vector-1808122461.jpg',
            'images/sick-man-in-hospital-bed-wearing-a-hospital-gown-connected-to-an-iv-drip-in-a-hospital-room-vector-3444423950.jpg',
            'images/unhealthy-boy-in-hat-scarf-lies-with-headache-fever-runny-nose-sore-throat-in-bed-sick-guy-suffering-from-cold-flu-tonsillitis-or-coronavirus-contour-line-illustration-isolated-on-blue-vector-566826689.jpg',
            'images/woman-sick-with-flu-lies-under-blanket-with-handkerchief-in-hand-near-thermometer-and-medicines-vector-1911004430.jpg',
        ];

        Pasien::insert([
            [
                'gambar' => $images[0],
                'nama_pasien' => 'Ahmad Fikri',
                'diagnosa' => 'Demam Berdarah (DBD)',
                'dokter' => 'dr. Budi Santoso, Sp.PD',
                'tanggal_kunjungan' => '2026-06-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[1],
                'nama_pasien' => 'Siti Aminah',
                'diagnosa' => 'Tifus',
                'dokter' => 'dr. Siti Nurbaya, Sp.A',
                'tanggal_kunjungan' => '2026-06-22',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[2],
                'nama_pasien' => 'Dwi Saputra',
                'diagnosa' => 'Asma Bronkial',
                'dokter' => 'dr. Andi Wijaya, Sp.P',
                'tanggal_kunjungan' => '2026-06-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[3],
                'nama_pasien' => 'Rina Melati',
                'diagnosa' => 'Gastritis Kronis',
                'dokter' => 'dr. Hendra Gunawan, Sp.PD',
                'tanggal_kunjungan' => '2026-06-26',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[4],
                'nama_pasien' => 'Agus Prasetyo',
                'diagnosa' => 'Hipertensi',
                'dokter' => 'dr. Rani Rahmawati, Sp.JP',
                'tanggal_kunjungan' => '2026-06-27',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[5],
                'nama_pasien' => 'Lestari Handayani',
                'diagnosa' => 'Diabetes Mellitus Tipe 2',
                'dokter' => 'dr. Budi Santoso, Sp.PD',
                'tanggal_kunjungan' => '2026-06-28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[6],
                'nama_pasien' => 'Maya Sari',
                'diagnosa' => 'Anemia',
                'dokter' => 'dr. Siti Nurbaya, Sp.A',
                'tanggal_kunjungan' => '2026-06-29',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[7],
                'nama_pasien' => 'Bambang Wijaya',
                'diagnosa' => 'Infeksi Saluran Pernapasan Akut (ISPA)',
                'dokter' => 'dr. Andi Wijaya, Sp.P',
                'tanggal_kunjungan' => '2026-06-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[8],
                'nama_pasien' => 'Diana Lestari',
                'diagnosa' => 'Migrain',
                'dokter' => 'dr. Hendra Gunawan, Sp.PD',
                'tanggal_kunjungan' => '2026-07-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[9],
                'nama_pasien' => 'Rizky Maulana',
                'diagnosa' => 'Dispepsia',
                'dokter' => 'dr. Budi Santoso, Sp.PD',
                'tanggal_kunjungan' => '2026-07-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[10],
                'nama_pasien' => 'Indra Gunawan',
                'diagnosa' => 'Bronkitis',
                'dokter' => 'dr. Andi Wijaya, Sp.P',
                'tanggal_kunjungan' => '2026-07-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[11],
                'nama_pasien' => 'Kartika Sari',
                'diagnosa' => 'Asam Urat',
                'dokter' => 'dr. Hendra Gunawan, Sp.PD',
                'tanggal_kunjungan' => '2026-07-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[12],
                'nama_pasien' => 'Eko Prasetyo',
                'diagnosa' => 'Radang Tenggorokan',
                'dokter' => 'dr. Rani Rahmawati, Sp.JP',
                'tanggal_kunjungan' => '2026-07-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[13],
                'nama_pasien' => 'Sinta Maharani',
                'diagnosa' => 'Konjungtivitis',
                'dokter' => 'dr. Siti Nurbaya, Sp.A',
                'tanggal_kunjungan' => '2026-07-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => $images[14],
                'nama_pasien' => 'Rudi Hartono',
                'diagnosa' => 'Gagal Ginjal Kronis',
                'dokter' => 'dr. Budi Santoso, Sp.PD',
                'tanggal_kunjungan' => '2026-07-07',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
