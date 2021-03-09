<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalService extends Model
{
    use HasFactory;
    protected $table = 'external_service';
    protected $fillable = ['name', 'description'];

    // public function ExternalServiceDetail(){
    //     return $this->hasMany(ExternalServiceDetail,'external_service_detail','external_service_id');
    // }
}
