<?php

namespace App\Models\PMV;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class LogSheetModel extends BaseModel
{
    protected $table  = "PMV.LogSheets";

    public function details() {
        return $this->hasMany(LogSheetDetailModel::class,'LogSheetId','Id');

    }


    //methods
    public function setStation($value) {
        $lvStation = StationModel::where('Code',$value)->first();
        $this->attributes['LVStationId'] = $lvStation->Id;
    }

}
