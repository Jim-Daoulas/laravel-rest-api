<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // SELECT * FROM categories
        $brands = Brand::withCount('brands')->get();

        return response()->json([
            "message" => "List of brands",
            "brands" => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => 'required|unique:brands,slug',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:500]'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation failed",
                "errors" => $validator->errors()
            ], 400);
        }

        $brand = Brand::create([
            "name"=> $request->name,
            "slug"=> $request->slug,
            "logo"=> $request->logo? $request->logo->store('uploads/brands') : null
        ]);

        return response()->json([
            "message" => "Category created",
            "brand" => $brand
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return response()->json([
            "message" => "Category detail",
            "category" => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'slug' => "required|unique:brands,slug,{$brand->id}",
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:500]'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "message" => "Validation failed",
                "errors" => $validator->errors()
            ], 400);
        }

        $brand->update([
            "name"=> $request->name,
            "slug"=> $request->slug,
            "logo"=> $request->logo? $request->logo->store('uploads/brands') : $brand->logo
        ]);

        return response()->json([
            "message" => "Brand updated",
            "brand" => $brand
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json([
            "message" => "Brand deleted"
        ]);
    }
}
