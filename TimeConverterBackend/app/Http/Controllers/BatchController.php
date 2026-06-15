<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Http\Requests\StoreBatchRequest;
use App\Http\Requests\UpdateBatchRequest;
use App\Http\Controllers\TimeHelperMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class BatchController extends Controller
{
    protected $timeHelpers;

    public function __controller(TimeHelperMethods $timeHelpers)
    {
        $this->timeHelpers = $timeHelpers;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Log::info("BatchController index method running");
        $batches = Batch::withSum('times as total_seconds', 'length_seconds')
            ->latest()
            ->get();

        $batches->each(function ($batch) {
            $batch->total_time = $this->timeHelpers->hoursMinutesSeconds($batch->total_seconds ?? 0);
        });

        return response()->json([
            "batches" => $batches,
            "successMessage" => "All batches retrieved successfully"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBatchRequest $request)
    {
        Log::info("BatchController store method running");

        $request->validated();

        $batch = Batch::create([
            'batch_number' => $request['batch_number'],
            'date_started' => Carbon::now(),
            'date_completed' => null,
            'complete' => false,
        ]);

        return response()->json([
            "batch" => $batch,
            "successMessage" => "Batch created successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        Log::info("BatchController show method running");

        $batch = Batch::find($id);
        $batch->total_time = $batch->Times()->sum('length_seconds');

        return response()->json([
            "batch" => $batch,
            "successMessage" => "Batch retrieved successfully"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBatchRequest $request, $id)
    {
        Log::info("BatchController update method running");

        $request->validated();

        $oldBatch = Batch::find($id);

        $updatedBatch = Batch::where('id', $id)->update([
            'batch_number' => $request['batch_number'] ?? $oldBatch->batch_number,
            'date_started' => $request['date_started'] ?? $oldBatch->date_started,
            'date_completed' => $request['date_completed'] ?? $oldBatch->date_completed,
            'complete' => $request['complete'] ?? $oldBatch->complete,
        ]);

        return response()->json([
            'updatedBatch' => $updatedBatch,
            'successMessage' => 'Batch updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Log::info("BatchController destroy method running");

        Batch::where('id', $id)->delete();

        return response()->json([
            'successMessage' => 'Batch deleted successfully',
        ]);
    }
}
