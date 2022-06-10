<?php

namespace App\Http\Resources;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource(User::find($this->user)),
            'folder' => new FolderResource(Folder::find($this->folder)),
            'isdelete' => $this->isdelete,
            'isdownload' => $this->isdownload,
            'isready' => $this->isready
        ];
    }
}
