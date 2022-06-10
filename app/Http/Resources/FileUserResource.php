<?php

namespace App\Http\Resources;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class FileUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     *             $table->foreignId('user');
     * $table->foreignId('file');
     * $table->boolean('isdelete');
     * $table->boolean('isdownload');
     * $table->boolean('isready');
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource(User::find($this->user)),
            'file' => new FileResource(File::find($this->file)),
            'isdelete' => $this->isdelete,
            'isdownload' => $this->isdownload,
            'isready' => $this->isready
        ];
    }
}
