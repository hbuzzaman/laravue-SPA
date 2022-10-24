<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data Ruangan',
            'data' => $rooms
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'room_name' => 'required',
        ]);

        //response errror validation
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        };

        $room = Room::create([
            'room_name' => $request->room_name,
        ]);

        if($room){
            return response()->json([
                'success' => true,
                'message' => 'Room Created',
                'data' => $room
            ],201);
        };

        return response()->json([
            'success' => false,
            'message' => 'Room Failed to Save',
        ], 409);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        $room = Room::findOrFail($room->id);

        return response()->json([
            'success' => true,
            'message' => 'Detail room',
            'data' => $room
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
        $validator = Validator::make($request->all(),[
            'room_name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $room = Room::findorfail($room->id);

        if($room){
            $room->update([
                'room_name' => $request->room_name,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Room Updated',
                'data' => $room,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Room Not Found',
        ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $room = Room::findorfail($room->id);

        if($room){
            //delete room
            $room->delete();
            return response()->json([
                'success' =>true,
                'message' => 'Room Has Been Deleted',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Room Not Found',
        ], 404);
    }
}
