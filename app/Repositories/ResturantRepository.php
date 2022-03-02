<?php

namespace App\Repositories;

use App\Contracts\ResturantContract;
use App\Models\Resturant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use FFMpeg\Media\Video;
use Pawlox\VideoThumbnail\Facade\VideoThumbnail;

class ResturantRepository implements ResturantContract
{
    public function store($data)
    {
        $image = uploadFile($data['image'], 'Images');
        $videos = uploadFile($data['video'], 'Videos');
        $add_ras = new Resturant;
        $add_ras->category_id = $data['category_id'];
        $add_ras->name = $data['restaurant'];
        $add_ras->address = $data['address'];
        $add_ras->email = $data['email'];
        $add_ras->decription = $data['description'];
        $add_ras->Contact = $data['contact'];
        $add_ras->image = $image;
        $add_ras->video = $videos;  
        $thumbnail = rand().'.jpg';
        $add_ras->thumbnail = $thumbnail;
        $destinationPath =  public_path('storage'). DIRECTORY_SEPARATOR . 'Videos'. DIRECTORY_SEPARATOR;
         VideoThumbnail::createThumbnail($destinationPath.$videos, $destinationPath, $thumbnail, 2, 1920, 1080);
        $add_ras->save();
        return redirect()->route('admin.restaurant.index');
    }
    public function update($data)
    {
        $add_ras = Resturant::where('id', $data['id'])->get()->first();
        if (isset($data['image'])) {
            $image = uploadFile($data['image'],'Images');
            } else{
                $image = $add_ras->getRawOriginal('image');
            }
        $add_ras->category_id = $data['category_id'];
        $add_ras->name = $data['name'];
        $add_ras->address = $data['address'];
        $add_ras->email = $data['email'];
        $add_ras->decription = $data['description'];
        $add_ras->Contact = $data['contact'];
        $add_ras->image = $image;
        $add_ras->save();
        return redirect()->route('admin.restaurant.index');
    }
}
