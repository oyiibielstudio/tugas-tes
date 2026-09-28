<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return new ProductResource(true, 'List Data Products', $products);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/products', $imageName);

        $product = Product::create([
            'user_id' => $request->user()->id,
            'name'    => $request->name,
            'harga'   => $request->harga,
            'stock'   => $request->stock,
            'image'   => $imageName,
        ]);

        return new ProductResource(true, 'Data Produk Berhasil Ditambahkan!', $product);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Produk Tidak Ditemukan!'], 404);
        }

        return new ProductResource(true, 'Detail Data Produk!', $product);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Produk Tidak Ditemukan!'], 404);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/products', $imageName);

            // Hapus gambar lama
            if ($product->getRawOriginal('image')) {
                Storage::delete('public/products/' . $product->getRawOriginal('image'));
            }

            $product->update([
                'name'  => $request->name,
                'harga' => $request->harga,
                'stock' => $request->stock,
                'image' => $imageName,
            ]);
        } else {
            $product->update([
                'name'  => $request->name,
                'harga' => $request->harga,
                'stock' => $request->stock,
            ]);
        }

        return new ProductResource(true, 'Data Produk Berhasil Diubah!', $product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Produk Tidak Ditemukan!'], 404);
        }

        if ($product->getRawOriginal('image')) {
            Storage::delete('public/products/' . $product->getRawOriginal('image'));
        }

        $product->delete();

        return new ProductResource(true, 'Data Produk Berhasil Dihapus!', null);
    }
}