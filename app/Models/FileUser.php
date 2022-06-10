<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user', 'file', 'isdelete', 'isdownload', 'isready'];

    public function getFile(){
        return File::find($this->file);
    }

    public function getUser(){
        return User::find($this->user);
    }
}
