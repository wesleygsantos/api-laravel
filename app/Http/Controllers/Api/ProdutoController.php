<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Http\Resources\ProdutosResource;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate();
        return ProdutosResource::collection($produtos);
    }

    public function store(StoreUpdateProdutoRequest $request)
    {
        $data = $request->validated();

        $produto = Produto::create($data);

        return new ProdutosResource($produto);
    }

    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);
        return new ProdutosResource($produto);
    }

    public function update(StoreUpdateProdutoRequest $request, string $id)
    {
        $produto = Produto::findOrFail($id);
        $data = $request->validated();
        $produto->update($data);

        return new ProdutosResource($produto);
    }

    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return response()->json([], 204);
    }
}
