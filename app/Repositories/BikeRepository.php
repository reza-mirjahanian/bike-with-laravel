<?php
namespace App\Repositories;





use App\Bike;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BikeRepository implements BikeRepositoriesInterface
{

    // TODO: Read from config file.
    const BIKE_PER_PAGE = 5;
    const DESTINATION_PATH = 'uploads';
    const DESTINATION_THUMB_PATH = 'uploads/thumb/';

    public function getAll()
    {
        // TODO: Implement getAll() method.

    }

    public function find($id)
    {
        return Bike::find($id);
    }

    public function store(Request $input)
    {
        //@Todo: extract upload path to config



        if ($input->hasFile('image')) {
            // dir doesn't exist, make it
            $mainFile = public_path(self::DESTINATION_PATH);
            $thumbFile = public_path(self::DESTINATION_THUMB_PATH);

            if (!is_dir($thumbFile)) {
                mkdir($thumbFile, 0777, true);
            }
            $extension = $input->file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = uniqid('img_', true) . '.' . $extension; // renaming image
            $uploadedFile = $input->file('image')->move($mainFile, $fileName); // uploading file to given path
            $img = Image::make($uploadedFile->getPathname());

            // TODO: Read size from config file.
            $img->resize(300, 271);

            $img->save($thumbFile . $uploadedFile->getFilename());
            $newBike = new Bike();
            $newBike->image = $uploadedFile->getFilename();
            $newBike->model = $input->input('model');
            $newBike->make = $input->input('make');
            $newBike->color = $input->input('color');
            $newBike->cc = $input->input('cc');
            $newBike->weight = $input->input('weight');
            $newBike->price = $input->input('price');


            return $newBike->save();

        }

        return false;

    }


    public function filter($input)
    {
        // TODO: Implement filter() method.
    }
}

