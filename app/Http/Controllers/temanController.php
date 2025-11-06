<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class temanController extends Controller
{
    private $filePath;

    public function __construct()
    {
        // Lokasi file JSON
        $this->filePath = storage_path('app/private/data.json');
    }
    /**
     * Tampilkan semua data teman
     */
    public function index()
    {
        $data = $this->readData();
        return view('teman.index', compact('data'));
    }
    /**
     * Tampilkan semua data teman
     */
    public function edit($id)
    {
        $data = $this->readData();
        $dt = collect($data)->firstWhere('idbuku', (int) $id);

        if (!$dt) {
            return redirect()->route('teman.index')->with('error', "Data dengan ID $id tidak ditemukan!");
        }

        return view('teman.edit', compact('dt'));
    }
    /**
     * Update data teman
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namateman' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telp' => 'required',
            'wa' => 'required',
        ]);

        $data = $this->readData();
        $found = false;

        foreach ($data as &$item) {
            if ($item['idbuku'] == $id) {
                $item['namateman'] = $request->namateman;
                $item['alamat'] = $request->alamat;
                $item['kota'] = $request->kota;
                $item['telp'] = $request->telp;
                $item['wa'] = $request->wa;
                $found = true;
                break;
            }
        }

        if (!$found) {
            return redirect()->route('teman.index')->with('error', "Data dengan ID $id tidak ditemukan!");
        }

        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));

        return redirect()->route('teman.index')->with('success', "Data teman ID $id berhasil diperbarui!");
    }
    /**
     * Tampilkan halaman form tambah teman
     */
    public function create()
    {
        return view('teman.create');
    }

    /**
     * Simpan data baru ke file JSON
     */
    public function store(Request $request)
    {
        $request->validate([
            'namateman' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'telp' => 'required',
            'wa' => 'required',
        ]);

        $data = $this->readData();

        $new = [
            'idbuku' => count($data) ? max(array_column($data, 'idbuku')) + 1 : 1,
            'namateman' => $request->namateman,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telp' => $request->telp,
            'wa' => $request->wa,
        ];

        $data[] = $new;

        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));

        return redirect()->route('teman.index')->with('success', 'Data teman berhasil ditambahkan!');
    }

    /**
     * Hapus data teman berdasarkan id
     */
    public function destroy($id)
    {
        $data = $this->readData();

        $filtered = array_filter($data, fn($t) => $t['idbuku'] != $id);

        if (count($filtered) === count($data)) {
            return redirect()->route('teman.index')->with('error', "Data dengan ID $id tidak ditemukan!");
        }

        file_put_contents($this->filePath, json_encode(array_values($filtered), JSON_PRETTY_PRINT));

        return redirect()->route('teman.index')->with('success', "Data teman ID $id berhasil dihapus!");
    }

    /**
     * Fungsi bantu: membaca isi file JSON
     */
    private function readData()
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $json = file_get_contents($this->filePath);
        $data = json_decode($json, true);
        return $data ?: [];
    }

}
