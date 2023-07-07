<?php

namespace App\Http\Controllers;

use App\Http\Requests\VenueRequest;
use App\Http\Resources\VenueResource;
use App\Models\Venue;
use Exception;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return VenueResource::collection(Venue::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VenueRequest $request)
    {
        try {
            DB::beginTransaction();
            $venue = Venue::create($request->validated());
            DB::commit();
            return new VenueResource($venue);
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VenueRequest $request, string $id)
    {
        try {

            DB::beginTransaction();
            $venue = Venue::all()->find($id);
            $venue->update($request->validated());
            $venue->save();
            DB::commit();
            return new VenueResource($venue);
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $venue = Venue::all()->find($id);
            if (!$venue->exists) {
                return response('Venue doesnt exist', 400);
            }
            $venue->delete();
            DB::commit();
            return response('Venue deleted', 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 400);
        }
    }
}
