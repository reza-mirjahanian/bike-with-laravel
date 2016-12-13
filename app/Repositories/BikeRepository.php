<?php
namespace App\Repositories;





use App\Bike;
use Illuminate\Http\Request;

class BikeRepository implements BikeRepositoriesInterface
{


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
        // TODO: Implement store() method.
    }

    public function filter($input)
    {
        // TODO: Implement filter() method.
    }
}

