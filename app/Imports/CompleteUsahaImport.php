<?php


namespace App\Imports;


use App\Models\MediaSosial;
use App\Models\Pengusaha;
use App\Models\ProdukUnggulan;
use App\Models\Usaha;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CompleteUsahaImport implements ToCollection, WithStartRow
{
    use Importable;

    private $pengusahaId;

    /**
     * @return int
     */
    public function getPengusahaId(): int
    {
        return $this->pengusahaId;
    }

    /**
     * @param int $pengusahaId
     */
    public function setPengusahaId(int $pengusahaId): void
    {
        $this->pengusahaId = $pengusahaId;
    }

    /**
     * @return int
     */
    public function getUsahaId(): int
    {
        return $this->usahaId;
    }

    /**
     * @param int $usahaId
     */
    public function setUsahaId(int $usahaId): void
    {
        $this->usahaId = $usahaId;
    }
    private $usahaId;

    public function collection(Collection $collection)
    {
        $collection->eachSpread(function (
            $pengusahaNama,
            $usahaNib,
            $usahaBrand,
            $usahaDeskripsi,
            $usahaKategori,
            $usahaKontak,
            $usahaAlamat,
            $usahaMaps,
            $usahaKegiatan,
            $usahaProdukNama,
            $usahaProdukDeskripsi,
            $usahaSosmedLinkNamaAcc,
            $usahaSosmedVendor
        ) {
            $requiredButNullPlaceholder = 'DATA TIDAK DITEMUKAN SAAT IMPORT EXCEL, SILAHKAN KONTAK ADMIN UNTUK EDIT MANUAL';
            if (!is_null($pengusahaNama)) {
                $this->setPengusahaId(
                    Pengusaha::where('nama', 'like', '%'.$pengusahaNama.'%')->first()->id
                    ?? Pengusaha::create(['nama' => $pengusahaNama])->id
                );
            }
            if (!is_null($usahaNib)) {
                $cacheUsaha = Usaha::where('nib', '=', $usahaNib)->first();
                if ($cacheUsaha instanceof Usaha) {
                    $this->setUsahaId($cacheUsaha->id);
                } else {
                    $newUsaha = new Usaha([
                        'nib' => $usahaNib,
                        'brand' => $usahaBrand ?? $requiredButNullPlaceholder,
                        'pengusaha_id' => $this->getPengusahaId(),
                        'deskripsi' => $usahaDeskripsi ?? $requiredButNullPlaceholder,
                        'kategori' => $usahaKategori ?? $requiredButNullPlaceholder,
                        'kontak' => $usahaKontak ?? $requiredButNullPlaceholder,
                        'alamat' => $usahaAlamat ?? $requiredButNullPlaceholder,
                        'maps' => $usahaMaps,
                        'kegiatan' => $usahaKegiatan
                    ]);
                    $newUsaha->save();
                    $this->setUsahaId($newUsaha->id);
                }
            }
            if (!is_null($usahaProdukNama)) {
                // Apakah usaha sudah punya produk dengan nama yg sama? Kalau tidak lanjutkan insert
                if (Usaha::find($this->getUsahaId())->usahaProdukUnggulans->filter(function (ProdukUnggulan $produk) use ($usahaProdukNama) {
                        return strtolower($produk->nama) === strtolower($usahaProdukNama);
                    })->count() < 1) {
                    ProdukUnggulan::create([
                        'nama' => $usahaProdukNama,
                        'deskripsi' => $usahaProdukDeskripsi,
                        'usaha_id' => $this->getUsahaId()
                    ]);
                }
            }
            if (!is_null($usahaSosmedLinkNamaAcc)) {
                if (Usaha::find($this->getUsahaId())->usahaMediaSosials->filter(function (MediaSosial $mediaSosial) use ($usahaSosmedLinkNamaAcc) {
                        return strtolower($mediaSosial->link_accname) === strtolower($usahaSosmedLinkNamaAcc);
                    })->count() < 1) {
                    MediaSosial::create([
                        'link_accname' => $usahaSosmedLinkNamaAcc,
                        'vendor' => in_array($usahaSosmedVendor, ['facebook', 'instagram', 'tiktok'])
                            ? $usahaSosmedVendor
                            : 'website',
                        'usaha_id' => $this->getUsahaId()
                    ]);
                }
            }
        });
    }

    public function startRow(): int
    {
        return 4;
    }
}