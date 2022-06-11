<?php

namespace App\Http\Controllers\Web\Workers\UMO;

use App\Http\Controllers\Web\Workers\WorkerController;

class UMOWorkerController extends WorkerController
{
    public function createRoomForm()
    {
        return view('worker.umo.room.create');
    }

    public function createRoom(){

    }

}
