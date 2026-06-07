<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::info('Index method in Time Controller running');

        $times = Time::all();

        return response()->json([
            'times' => $times,
            'successMessage' => 'All records from the time table successfully retrieved'
        ], 200);
    }

    public function timesByBatch($batchId)
    {
        Log::info('Times by batch method in Time Controller running');

        $timesByBatch = Time::where('batch_id', $batchId)->get();

        $successMessage = count($timesByBatch) > 0 ? 'Times for batch ' . $batchId . ' retrieved successfully' : 'No times found for batch ' . $batchId;

        return response()->json([
            'timesByBatch' => $timesByBatch,
            'successMessage' => $successMessage
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('Store method in Time Controller running');

        $request->validated();

        $time = Time::create([
            'batch_number' => $request['batch_number'],
            'length_seconds' => $request['length_in_seconds']
        ]);
        $time->save();

        $successMessage = 'New time entry created in batch: ' . $request['batch_number'];

        return response()->json([
            'time' => $time,
            'successMessage' => $successMessage
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Log::info('Show method in Time Controller running');

        $time = Time::find($id);

        return response()->json([
            'time' => $time,
            'successMessage' => 'Time record successfully retrieved'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Log::information('Update method in Time Controller running');

        $request->validated();

        $oldTime = Time::find($id);

        $updatedTime = Time::where('id', $id)->update([
            'batch_number' => $request['batch_number'] ?? $oldTime->batch_number,
            'length_seconds' => $request['length_in_seconds'] ?? $oldTime->batch_number
        ]);

        return response()->json([
            'updated_time' => $updatedTime,
            'successMessage' => 'Time updated successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Log::information('Destroy method in Time Controller running');

        Time::where('id', $id)->delete();

        return response()->json([
            'successMessage' => 'Time successfully deleted'
        ], 200);
    }
}
