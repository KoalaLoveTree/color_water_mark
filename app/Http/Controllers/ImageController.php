<?php

namespace App\Http\Controllers;


use App\Http\Requests\Image\MarkRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;

class ImageController
{
    public function mark(MarkRequest $request)
    {
        $image = $request->file('image')->getRealPath();
        return Response::download(App::make('water_marker')->addWaterMark($image))->deleteFileAfterSend();
    }
}
