<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\StoreClientNoteRequest;
use App\Http\Requests\Client\UpdateClientNoteRequest;
use App\Models\ClientNote;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientNoteController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query("per_page", 5);
        $page = $request->query("page", 0);
        $offset = $page * $perPage;

        $clientNotes = ClientNote::skip($offset)->take($perPage)->get();
        return $this->successResponse($clientNotes);
    }

    public function store(StoreClientNoteRequest $request)
    {
        $clientNote = ClientNote::create($request->validated());
        return $this->successResponse($clientNote, Response::HTTP_CREATED);
    }

    public function show(ClientNote $clientNote)
    {
        return $this->successResponse($clientNote);
    }

    public function update(UpdateClientNoteRequest $request, ClientNote $clientNote)
    {
        $clientNote->update($request->validated());
        return $this->successResponse($clientNote);
    }

    public function destroy(ClientNote $clientNote)
    {
        $clientNote->delete();
        return $this->successResponse([], Response::HTTP_NO_CONTENT);
    }
}
