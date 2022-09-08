<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectmaster extends Model
{
    use HasFactory;
    protected $primaryKey = "project_id";

    public $table="projectmaster";
}
