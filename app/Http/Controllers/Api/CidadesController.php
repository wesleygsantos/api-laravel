<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCidadesRequest;
use App\Http\Resources\CidadesResource;
use App\Models\Cidades;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    public function index()
    {
        $cidades = Cidades::paginate();
        return CidadesResource::collection($cidades);
    }

    public function store(StoreUpdateCidadesRequest $request)
    {
        $data = $request->all();
        $cidade = Cidades::create($data);

        return new CidadesResource($cidade);
    }

    public function show(string $id)
    {
        $cidade = Cidades::findOrFail($id);
        return new CidadesResource($cidade);
    }

    public function update(StoreUpdateCidadesRequest $request, string $id)
    {
        $cidade = Cidades::findOrFail($id);
        $data = $request->validated();
        $cidade->update($data);

        return new CidadesResource($cidade);
    }

    public function destroy(string $id)
    {
        $cidade = Cidades::findOrFail($id);
        $cidade->delete();

        return response()->json([], 204);
    }
}
