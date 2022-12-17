<?php

namespace App\Models\PMV\Repositories;


use App\Models\PMV\LogSheetModel;
use App\Models\PMV\StationModel;


class LogSheetRepository {

    protected $model;

    public function __construct(LogSheetModel $model) {
        $this->model = $model;
    }

    public function getDrafts() {

        return $this->model->with('details')
                    ->where('Post_IsPosted',false)->get();
    }

    public function createLogSheet($fueledDate,$shiftStartTime,
            $startShiftTankerKm,
            $startShiftMeterReading,
            $location,
            $lvStationCode,$employeeCode) {
        
        $this->model->FueledDate = $fueledDate;
        $this->model->ShiftStartTime = $shiftStartTime;
        $this->model->StartShiftTankerKm = $startShiftTankerKm;
        $this->model->StartShiftMeterReading = $startShiftMeterReading;
        $this->model->Location = $location;
        $this->model->Post_IsPosted = false;
        $this->model->setStation($lvStationCode);

        $this->model->saveCreated($employeeCode);

        return true;
    }


}


