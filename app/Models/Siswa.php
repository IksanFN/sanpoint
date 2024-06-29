<?php

namespace App\Models;

use App\Enums\JenisKelamin;
use App\Enums\StatusSiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jurusan_id',
        'kelas_id',
        'tahun_ajaran_id',
        'nisn',
        'nama',
        'email',
        'nomor_hp',
        'jenis_kelamin',
        'status',
        'alamat',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'jurusan_id' => 'integer',
        'kelas_id' => 'integer',
        'tahun_ajaran_id' => 'integer',
        'status' => StatusSiswa::class,
        'jenis_kelamin' => JenisKelamin::class
    ];

    public function pelanggaran(): HasMany
    {
        return $this->hasMany(Pelanggaran::class);
    }

    public function prestasi(): HasMany
    {
        return $this->hasMany(Prestasi::class);
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahunAjaran(): BelongsTo
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
