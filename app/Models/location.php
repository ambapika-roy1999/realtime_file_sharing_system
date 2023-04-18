<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $table="track_loactions";
    protected $primary_key = "id";
    protected $fillable =['user_id','latitude','longitude'];
}
