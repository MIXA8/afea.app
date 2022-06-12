<?php

namespace App\Http\Controllers\Web\Workers\UMO;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Workers\UMO\RoomStoreRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class UMOWorkerRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.umo.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoomStoreRequest $request)
    {
        $validated = $request->validated();

        $room = $request->all();
        Room::create(
            [
                'title'=>$request->get('title'),
                'description'=>$request->get('description'),
                'amount'=>$request->get('amount')
            ]
        );
        return redirect()->back()->with('success','Комната добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('worker.umo.room.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoomStoreRequest $request, Room $room)
    {
        $validated = $request->validated();
        $room=Room::find($room)->first();
        $room->update($request->all());
        return redirect()->back()->with('success','Комната изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Room $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Room $room)
    {
        $room=Room::find($room)->first();
        $room->update(
            [
                'delete'=>1
            ]
        );
        return redirect()->back()->with('success','Комната удалена');
    }
}
