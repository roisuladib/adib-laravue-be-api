<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    public function index()
    {
        $galleries = ProductGallery::with(['product'])->get(); 
        return view('pages.gallery.index', [
            'galleries' => $galleries
        ]);
    }

    public function create()
    {
        $products = Product::all();
        return view('pages.gallery.create', [
            'products' => $products
        ]);
    }

    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store('assets/product', 'public');
        ProductGallery::create($data); 
        return redirect()->route('product-gallerries.index')->with('success', 'Data berhasil di tambahkan'); 
    }

    public function destroy($id)
    {
        $data = ProductGallery::findOrFail($id);
        $data->delete();
        return redirect()->route('product-gallerries.index')->with('success', 'Data berhasil dihapus'); 
    }
}
