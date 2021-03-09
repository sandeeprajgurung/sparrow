<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalServiceDetail extends Model
{
    use HasFactory;
    protected $table = 'external_service_detail';
    protected $fillable = ['name', 'description', 'image', 'external_service_id'];

    // public function ExternalService()
    // {
    //     return $this->belongsTo(ExternalService, 'external_service_id', 'id');
    // }
}
