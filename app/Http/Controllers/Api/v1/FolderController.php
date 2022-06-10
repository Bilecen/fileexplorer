<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Service\FolderService;
use App\Http\Resources\FolderUserResource;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function fileInsert(Request $request)
    {
        $folderService = new FolderService();
        $folderService->insert($request);
        return FolderUserResource::collection($folderService->selectUserAll($request));
    }

    public function fileUpdate(Request $request)
    {
        $folderService = new FolderService();
        $folderService->update($request);
        return FolderUserResource::collection($folderService->selectUserAll($request));
    }

    public function fileDelete(Request $request)
    {
        $folderService = new FolderService();
        $folderService->delete($request);
        return FolderUserResource::collection($folderService->selectUserAll($request));
    }

    public function fileUserSelectAll(Request $request)
    {
        $folderService = new FolderService();
        return FolderUserResource::collection($folderService->selectUserAll($request));
    }
}
