<?php

namespace App\Exports;

use App\Staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StaffsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Staff::select('nik', 'nama_depan', 'nama_belakang', 'jenis_kl', 'tempat_lahir', 'tgl_lahir', 'alamat', 'agama', 'no_tlp', 'ijazah_terakhir', 'tahun_ijazah_trkhr', 'nuptk', 'status_kawin')->get();
    }

    public function headings(): array
    {
        return [
            'NIK',
            'NAMA DEPAN',
            'NAMA BELAKANG',
            'JENIS KELAMIN',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'ALAMAT',
            'AGAMA',
            'NOMOR TELEPON',
            'IJAZAH TERAKHIR',
            'TAHUN IJAZAH TERAKHIR',
            'NUPTK',
            'STATUS KAWIN'
        ];
    }
}
