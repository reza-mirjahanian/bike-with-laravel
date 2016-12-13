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
        return Bike::all();
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


    function filter($parameters)
    {

        $query = Bike::query();

        $default = ['min_price' => 0, 'max_price' => 0, '' => 0,
            'min_weight' => 0, 'max_weight' => 0, 'page' => 1,
            'sort' => 'desc', 'order' => 'date'];
        $parameters = array_merge($default, $parameters);

        //color
        if ((isset($parameters['color']) && (1 == preg_match('/rgb\((\d{1,3}), (\d{1,3}), (\d{1,3})\)/', $parameters['color'])))) {
            $query->where('color', '=', $parameters['color']);
        }


        //slider
        $minPrice = ((int)$parameters['min_price'] >= 100) ? $parameters['min_price'] : '100';
        $maxPrice = ((int)$parameters['max_price'] >= $minPrice && (int)$parameters['max_price'] <= 100000) ? $parameters['max_price'] : '100000';
        $minWeight = ((int)$parameters['min_weight'] >= 50) ? $parameters['min_weight'] : '50';
        $maxWeight = ((int)$parameters['max_weight'] >= $minWeight && (int)$parameters['max_weight'] <= 30000) ? $parameters['max_weight'] : '30000';


        $query->whereBetween('price', [$minPrice, $maxPrice]);
        $query->whereBetween('weight', [$minWeight, $maxWeight]);


        //order
        $sorting = $parameters['sort'] == 'asc' ? 'asc' : 'desc';

        //TODO: maybe ID is better than date!
        if ('date' == $parameters['order']) {
            $query->orderBy('id', $sorting);
        }
        if ('price' == $parameters['order']) {
            $query->orderBy('price', $sorting);
        }

        return $query->paginate(self::BIKE_PER_PAGE);

    }
}

