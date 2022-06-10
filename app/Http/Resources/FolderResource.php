<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     *             $table->string('name');
     * $table->string('fileurl');
     * $table->bigInteger('size');
     * $table->date('deletedposion');
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fileurl' => $this->fileurl,
            'size' => $this->size,
            'deletedposion' => $this->deletedposion
        ];
    }
}
