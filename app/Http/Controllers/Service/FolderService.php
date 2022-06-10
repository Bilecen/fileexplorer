<?php
/*
Description: FolderService
Version: 1.0
Author: muhammettahabilecen
Author URI: http://muhammettahabilecen.com
License: By Muhammet Taha Bilecen
*/

namespace App\Http\Controllers\Service;


use App\Http\Resources\FolderUserResource;
use App\Models\Folder;
use App\Models\FolderUser;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FolderService implements GenericService
{
    use ValidatesRequests;

    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        \Storage::makeDirectory($request->name);
        $folder = new Folder();
        $folder->name = $request->name;
        if ($folder->save()) {
            $folderUser = new FolderUser();
            $folderUser->folder = $folder->id;
            $folderUser->user = \Auth::id();
            $folderUser->save();
            return $this->selectUserAll($request);
        } else {
            return null;
        }

    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required'
        ]);

        $folder = Folder::find($request->id);
        if ($folder->isdelete) {
            $folder->deleted();
            FolderUser::where('folder','=',$folder->id)->delete();
            Storage::deleteDirectory($request->name);
            return $this->selectUserAll($request);
        } else {
            return null;
        }
    }

    public function selectAll(Request $request)
    {
         return FolderUser::all();
    }

    public function selectUserAll(Request $request)
    {
        $userId = \Auth::id();
        return FolderUser::where('user', '=', $userId)->paginate(20);
    }
}
