<?php

namespace App\Exports;

use App\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SantrisExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	return Santri::select('nis', 'nama_depan', 'nama_belakang', 'jenis_kl', 'tempat_lahir', 'tgl_lahir', 'alamat', 'agama', 'no_tlp', 'nama_ayah', 'pekerjaan_ayah', 'nama_ibu', 'pekerjaan_ibu')->get();
    }

    public function headings(): array
    {
        return [
            'NIS',
            'NAMA DEPAN',
            'NAMA BELAKANG',
            'JENIS KELAMIN',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'ALAMAT',
            'AGAMA',
            'NOMOR TELEPON',
            'NAMA AYAH',
            'PEKERJAAN AYAH',
            'NAMA IBU',
            'PEKERJAAN IBU'
        ];
    }
}
