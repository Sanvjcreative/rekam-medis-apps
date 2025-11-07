<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;
use App\Models\Poli;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\RekamMedis;

class MasterDataSeeder extends Seeder
{
    public function run()
    {
        // Seed Petugas
        $petugas = [
            [
                'nip' => 'P001',
                'nama' => 'Dr. Ahmad',
                'email' => 'ahmad@rekammedis.com',
                'jabatan' => 'Dokter',
                'poli' => 'Umum',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Kesehatan No. 1',
                'status' => 'Aktif',
            ],
            [
                'nip' => 'P002',
                'nama' => 'Dr. Siti',
                'email' => 'siti@rekammedis.com',
                'jabatan' => 'Dokter',
                'poli' => 'Anak',
                'no_hp' => '081234567891',
                'alamat' => 'Jl. Kesehatan No. 2',
                'status' => 'Aktif',
            ],
            [
                'nip' => 'P003',
                'nama' => 'Dr. Dewi',
                'email' => 'dewi@rekammedis.com',
                'jabatan' => 'Dokter',
                'poli' => 'Gigi',
                'no_hp' => '081234567892',
                'alamat' => 'Jl. Kesehatan No. 3',
                'status' => 'Aktif',
            ],
            [
                'nip' => 'P004',
                'nama' => 'Ns. Sarah',
                'email' => 'sarah@rekammedis.com',
                'jabatan' => 'Perawat',
                'poli' => 'Umum',
                'no_hp' => '081234567893',
                'alamat' => 'Jl. Kesehatan No. 4',
                'status' => 'Aktif',
            ],
        ];

        foreach ($petugas as $p) {
            Petugas::create($p);
        }

        // Seed Poli
        $polis = [
            [
                'kode_poli' => 'PU',
                'nama_poli' => 'Poli Umum',
                'dokter' => 'Dr. Ahmad',
                'kapasitas' => 30,
                'status' => 'Aktif',
            ],
            [
                'kode_poli' => 'PA',
                'nama_poli' => 'Poli Anak',
                'dokter' => 'Dr. Siti',
                'kapasitas' => 25,
                'status' => 'Aktif',
            ],
            [
                'kode_poli' => 'PG',
                'nama_poli' => 'Poli Gigi',
                'dokter' => 'Dr. Dewi',
                'kapasitas' => 20,
                'status' => 'Aktif',
            ],
            [
                'kode_poli' => 'PM',
                'nama_poli' => 'Poli Mata',
                'dokter' => 'Dr. Budi',
                'kapasitas' => 20,
                'status' => 'Aktif',
            ],
        ];

        foreach ($polis as $p) {
            Poli::create($p);
        }

        // Seed Obat
        $obats = [
            [
                'kode_obat' => 'OBT001',
                'nama_obat' => 'Paracetamol',
                'kategori' => 'Analgesik',
                'stok' => 100,
                'satuan' => 'Tablet',
                'harga' => 5000,
                'expired' => '2026-12-31',
                'status' => 'Tersedia',
            ],
            [
                'kode_obat' => 'OBT002',
                'nama_obat' => 'Amoxicillin',
                'kategori' => 'Antibiotik',
                'stok' => 80,
                'satuan' => 'Kapsul',
                'harga' => 15000,
                'expired' => '2026-12-31',
                'status' => 'Tersedia',
            ],
            [
                'kode_obat' => 'OBT003',
                'nama_obat' => 'CTM',
                'kategori' => 'Antihistamin',
                'stok' => 150,
                'satuan' => 'Tablet',
                'harga' => 3000,
                'expired' => '2026-12-31',
                'status' => 'Tersedia',
            ],
        ];

        foreach ($obats as $o) {
            Obat::create($o);
        }

        // Seed Pasien
        $pasiens = [
            [
                'no_rm' => 'RM00001',
                'nik' => '1234567890123456',
                'nama' => 'Budi Santoso',
                'tanggal_lahir' => '1990-01-15',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Melati No. 123',
                'no_hp' => '081234567894',
                'status' => 'Aktif',
            ],
            [
                'no_rm' => 'RM00002',
                'nik' => '1234567890123457',
                'nama' => 'Ani Wulandari',
                'tanggal_lahir' => '1995-05-20',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Mawar No. 456',
                'no_hp' => '081234567895',
                'status' => 'Aktif',
            ],
        ];

        foreach ($pasiens as $p) {
            Pasien::create($p);
        }

        // Seed Rekam Medis
        $rekamMedis = [
            [
                'no_rm' => 'RM00001',
                'nama_pasien' => 'Budi Santoso',
                'tanggal' => '2025-11-01',
                'poli' => 'Poli Umum',
                'dokter' => 'Dr. Ahmad',
                'diagnosa' => 'Demam, Flu',
                'status' => 'Selesai',
            ],
            [
                'no_rm' => 'RM00002',
                'nama_pasien' => 'Ani Wulandari',
                'tanggal' => '2025-11-02',
                'poli' => 'Poli Gigi',
                'dokter' => 'Dr. Dewi',
                'diagnosa' => 'Gigi berlubang',
                'status' => 'Selesai',
            ],
        ];

        foreach ($rekamMedis as $rm) {
            RekamMedis::create($rm);
        }
    }
}