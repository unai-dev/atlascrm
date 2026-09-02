<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query("per_page", 5);
        $page = $request->query("page", 0);
        $offset = $page * $perPage;

        $addresses = Address::skip($offset)->take($perPage)->get();
        return response()->json(["data" => $addresses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->validated());
        return response()->json(["data" => $address], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        return response()->json(["data" => $address]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->validated());
        return response()->json(["data" => $address]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
