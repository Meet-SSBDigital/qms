<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annualplan extends Model
{
    use HasFactory;
    public $table="annualplan";

    


protected $fillable = ['monthyear','inspectionname','inspectioncode','levelofinspection','corridorname','underground','elevated','isactive','remarks'];
// protected $fillable = ['inspectionname'];
// protected $fillable = ['inspectioncode'];
// protected $fillable = ['levelofinspection'];
// protected $fillable = ['corridorname'];
// protected $fillable = ['underground'];
// protected $fillable = ['elevated'];
// protected $fillable = ['isactive'];
// protected $fillable = ['remarks'];
}
