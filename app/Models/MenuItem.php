<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'weight', 'price', 'image'];

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('image')) {
            if ($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file('image')->store("images/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        return asset("food-delivery/uploads/{$this->image}");
    }
}
