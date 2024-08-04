<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateMarcaRequest;
use App\Http\Resources\MarcaResource;
use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marcas::paginate();
        return MarcaResource::collection($marcas);
    }

    public function store(StoreUpdateMarcaRequest $request)
    {
        $data = $request->validated();

        $marca = Marcas::create($data);

        return new MarcaResource($marca);
    }

    public function show(string $id)
    {
        $marca = Marcas::findOrFail($id);
        return new MarcaResource($marca);
    }

    public function update(StoreUpdateMarcaRequest $request, string $id)
    {
        $marca = Marcas::findOrFail($id);
        $data = $request->validated();
        $marca->update($data);

        return new MarcaResource($marca);
    }

    public function destroy(string $id)
    {
        $marca = Marcas::findOrFail($id);
        $marca->delete();

        return response()->json([], 204);
    }
}
