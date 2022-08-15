<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
  public function store(Request $request)
  {
    /* Validación de la solicitud. */
    $request->validate([
      'name'       => 'required|string|max:255',
      'imageFront' => 'required|image|dimensions:min_width=200,nim_height=200',
      'imageLeft'  => 'required|image|dimensions:min_width=200,nim_height=200',
      'imageRight' => 'required|image|dimensions:min_width=200,nim_height=200',
    ]);
    // $image = Image::create($request->all());

    /* Crear una nueva instancia del modelo de imagen y luego almacenar las imágenes en la carpeta
    public/images. */
    $image     = new Image($request->all());
    $pathFront = $request->imageFront->store('public/images');
    $pathLeft  = $request->imageLeft->store('public/images');
    $pathRight = $request->imageRight->store('public/images');

    /* Guardando las imágenes en la carpeta public/images. */
    $image->imageFront = $pathFront;
    $image->imageLeft  = $pathLeft;
    $image->imageRight = $pathRight;
    $image->save();

    return response()->json($image, 201);
  }

/**
 * Devuelve una respuesta que descarga la imagen de la ruta pública de la carpeta de almacenamiento.
 *
 * @param Image image El objeto de imagen que desea descargar.
 *
 * @return La imagen está siendo devuelta.
 */
  public function imageRight(Image $image)
  {
    return response()->download(public_path(Storage::url($image->imageRight)), $image->name);
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
