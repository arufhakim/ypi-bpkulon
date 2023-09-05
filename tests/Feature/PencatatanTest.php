<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Pencatatan;
use App\User;

class PencatatanTest extends TestCase
{
    use RefreshDatabase;    

    public function testBasicTest()
    {
        $response = $this->post('/umum/simpanpencatatan',[
            'saldo_id' => 1,
            'kategori_id' => 1,
            'anakasuh_id' => 0,
            'donatur_id' => 0,
            'santri_id' => 0,
            'guru_id' => 0,
            'namaPencatatan' => 'Pemberian Bantuan Bencana Alam',
            'tanggalPencatatan' => '2020-12-11',
            'jenisPencatatan' => 'Pengeluaran',
            'jumlah' => 500000,
            'keterangan' => 'Lunas',
            'oleh' => 'Muhammad Oni'
        ]);
        $this->assertCount(0, Pencatatan::all());
    }
}
