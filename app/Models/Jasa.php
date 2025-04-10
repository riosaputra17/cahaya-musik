<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Jasa extends Model
{
    use SoftDeletes;

    // Nama tabel yang digunakan
    protected $table = 'jasa';

    // Primary key bukan auto increment
    protected $primaryKey = 'jasa_id';
    public $incrementing = false;

    // UUID → tipe string
    protected $keyType = 'string';

    // Kolom yang dapat diisi massal
    protected $fillable = [
        'jasa_id',
        'nama_jasa',
        'price',
        'dp_price',
        'list_services',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Auto set UUID saat membuat model baru
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->jasa_id)) {
                $model->jasa_id = (string) Str::uuid();
            }
        });
    }
}
