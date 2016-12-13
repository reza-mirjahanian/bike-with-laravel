<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{


    function getThumbnailUrl()
    {
       return  asset('uploads/thumb/'.$this->image);

    }

    function getImageUrl()
    {
        return  asset('uploads/'.$this->image);
    }
}
