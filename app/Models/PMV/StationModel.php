<?php

namespace App\Models\PMV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class StationModel extends BaseModel
{
    use HasFactory;

    protected $table = "PMV.LVStations";

}
