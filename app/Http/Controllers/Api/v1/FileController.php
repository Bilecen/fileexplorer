<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\config\responseModel\ErrorModel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\FileService;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\FileResource;
use App\Http\Resources\FileUserResource;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function fileInsert(Request $request)
    {
        $fileService = new FileService();
        $response = $fileService->insert($request);
        if (!is_null($response)){
            return FileResource::collection($fileService->selectAll($request));
        }else{
            return new ErrorResource(new ErrorModel("Dosya Oluşturalamadı",500));
        }
    }

    public function fileUpdate(Request $request)
    {
        $fileService = new FileService();
        $response = $fileService->update($request);
        if (!is_null($response)) {
            return FileResource::collection($fileService->selectAll($request));
        } else {
            return new ErrorResource(new ErrorModel("Dosya Update Edilemedi", 500));
        }
    }

    public function fileDelete(Request $request)
    {
        $fileService = new FileService();
        $fileService->delete($request);
        return FileResource::collection($fileService->selectAll($request));
    }

    public function fileUserSelectAll(Request $request)
    {
        $fileService = new FileService();
        return FileUserResource::collection($fileService->selectFileUser($request));
    }
}
