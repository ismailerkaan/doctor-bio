<?php

namespace App\Observers;

use App\Models\Doctor;
use App\Models\DoctorWorkHour;

class DoctorObserver
{
    /**
     * Handle the Doctor "created" event.
     *
     * @param \App\Models\Doctor $doctor
     * @return void
     */
    public function created(Doctor $doctor)
    {
        for ($i = 1; $i < 8; $i++) {
            $workHour = new DoctorWorkHour();
            $workHour->day = $i;
            $workHour->doctor_id = $doctor->id;
            $workHour->save();
        }
    }

    /**
     * Handle the Doctor "updated" event.
     *
     * @param \App\Models\Doctor $doctor
     * @return void
     */
    public function updated(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "deleted" event.
     *
     * @param \App\Models\Doctor $doctor
     * @return void
     */
    public function deleted(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "restored" event.
     *
     * @param \App\Models\Doctor $doctor
     * @return void
     */
    public function restored(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the Doctor "force deleted" event.
     *
     * @param \App\Models\Doctor $doctor
     * @return void
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }
}
