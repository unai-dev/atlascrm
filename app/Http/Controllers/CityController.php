<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query("per_page", 5);
        $page = $request->query("page", 0);
        $offset = $page * $perPage;

        $cities = City::skip($offset)->take($perPage)->get();
        return response()->json(["data" => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $city = City::create($request->validated());
        return response()->json(["data" => $city], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return response()->json(["data" => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
        return response()->json(["data" => $city]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
