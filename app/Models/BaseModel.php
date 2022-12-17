<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

use App\Models\Common\AutoGenerateModel;

abstract class BaseModel extends Model
{
    public $timestamps = false;

    protected $autoGenerateType = "ReferenceNo";

    public function saveCreated($employeeId) {
        

        $auto = AutoGenerateModel::where('Type',$this->autoGenerateType)->first();
        
        $this->attributes['Id'] = Str::uuid();
        $this->attributes['ReferenceNo'] = $auto->CurrentNumber;
        $this->attributes['CreatedAt'] = Carbon::now();
        $this->attributes['CreatedBy'] = $employeeId;
        $this->attributes['Active'] = true;
        $this->save();

    }

    public function updateCreated($employeeId) {

        $this->attributes['UpdatedAt'] = Carbon::now();
        $this->attributes['UpdatedBy'] = $employeeId;

        $this->save();
    }
}
