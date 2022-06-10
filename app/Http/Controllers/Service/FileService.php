<?php
/*
Description: FileService
Version: 1.0
Author: muhammettahabilecen
Author URI: http://muhammettahabilecen.com
License: By Muhammet Taha Bilecen
*/

namespace App\Http\Controllers\Service;


use App\Models\File;
use App\Models\FileUser;
use App\Models\Folder;
use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class FileService implements GenericService
{

    use ValidatesRequests;

    public function insert(Request $request)
    {
        $this->validate($request, [
            'file' => 'file',
            'folder' => 'required'
        ]);
        $user = User::find(\Auth::id());
        $folder = Folder::find($request->folder);
        if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');
                $fileurl = $file->store($folder->name . '/' . $file->getClientOriginalName());
                $fileData = new File();
                $fileData->folder = $folder->id;
                $fileData->name = $file->getClientOriginalName();
                $fileData->filetype = $file->getClientOriginalExtension();
                $fileData->fileurl = $fileurl;
                $fileData->size = $file->getSize();
                $fileData->isdeleted = $request->isdeleted;

                if (!is_null($request->deletedposion)) {
                    $fileData->deletedposion = $request->deletedposion;
                }

                if ($fileData->save()) {
                    $fileUser = new FileUser();
                    $fileUser->user = $user->id;
                    $fileUser->file = $fileData->id;
                    $fileUser->save();
                    return $this->selectFileUser($request);
                } else {
                    return null;
                }
            } catch (\Exception $exception) {
                return null;
            }
        }
        return null;

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'file' => 'file',
            'folder' => 'required'
        ]);
        $folder = Folder::find($request->folder);
        if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');
                $fileurl = $file->store($folder->name . '/' . $file->getClientOriginalName());
                $fileData = File::find($request->id);
                $fileData->folder = $folder->id;
                $fileData->name = $file->getClientOriginalName();
                $fileData->filetype = $file->getClientOriginalExtension();
                $fileData->fileurl = $fileurl;
                $fileData->size = $file->getSize();
                $fileData->isdeleted = $request->isdeleted;

                if (!is_null($request->deletedposion)) {
                    $fileData->deletedposion = $request->deletedposion;
                }

                if ($fileData->update()) {
                    return $this->selectFileUser($request);
                } else {
                    return null;
                }
            } catch (\Exception $exception) {
                return null;
            }
        }
        return null;
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        try {
            $fileData = File::find($request->id);
            if ($fileData->isdeleted) {
                if ($fileData->update()) {
                    return $this->selectFileUser($request);
                } else {
                    return null;
                }
            }else{
                return null;
            }

        } catch (\Exception $exception) {
            return null;
        }
    }

    public function selectAll(Request $request)
    {
        return File::all();
    }

    public function selectFileUser(Request $request)
    {
        $userId = \Auth::id();
        $files = FileUser::where('user', '=', $userId)->paginate(20);
        return $files;
    }
}
