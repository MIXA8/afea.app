<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'room', 'group', 'worker_id', 'time_start', 'time_finish', 'day', 'month', 'year', 'date', 'delete'];

    public function subjectInf(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Subject::class,'subject');
    }

    public function roomInf(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Room::class,'room');
    }

    public function groupInf(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class,'group');
    }

    public function workerInf(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Worker::class,'worker_id');
    }

}
