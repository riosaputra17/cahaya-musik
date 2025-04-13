<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'order';
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'order_id',
        'customer_id',
        'jasa_id',
        'start_date',
        'end_date',
        'total_harga',
        'dp_harga',
        'payment_status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Relasi ke Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Relasi ke Jasa
    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'jasa_id', 'jasa_id');
    }

    // (Opsional) relasi ke user yang membuat, mengedit, menghapus
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by', 'user_id');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'order_id';
    }
}
