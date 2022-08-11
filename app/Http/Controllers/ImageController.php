<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    /* Devolviendo todas las imágenes en la base de datos. */
    return Image::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreImageRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreImageRequest $request)
  {
    $image = Image::create($request->all());
    return response()->json($image, 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Image  $image
   * @return \Illuminate\Http\Response
   */
  public function show(Image $image)
  {
    //
    return $image;
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateImageRequest  $request
   * @param  \App\Models\Image  $image
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateImageRequest $request, Image $image)
  {
    //
    $image->update($request->all());
    return response()->json($image, 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Image  $image
   * @return \Illuminate\Http\Response
   */
  public function delete(Image $image)
  {
    //
    $image->delete();
    return response()->json(null, 204);
  }
}