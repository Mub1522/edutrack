<?php

namespace App\Observers\admin;

use App\Models\admin\Guardian;
use Illuminate\Support\Str;

class GuardianObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Guardian $guardian): void
    {
        //
    }

    /**
     * Handle the Student "creating" event.
     */
    public function creating(Guardian $guardian): void
    {
        if (empty($guardian->uuid)) {
            $guardian->uuid = (string) Str::uuid();
        }
    }

    /**
     * Handle the Guardian "updated" event.
     */
    public function updated(Guardian $guardian): void
    {
        //
    }

    /**
     * Handle the Guardian "deleted" event.
     */
    public function deleted(Guardian $guardian): void
    {
        //
    }

    /**
     * Handle the Guardian "restored" event.
     */
    public function restored(Guardian $guardian): void
    {
        //
    }

    /**
     * Handle the Guardian "force deleted" event.
     */
    public function forceDeleted(Guardian $guardian): void
    {
        //
    }
}
