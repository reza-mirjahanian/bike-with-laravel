<?php

namespace App\Http\Controllers;


use App\Repositories\BikeRepositoriesInterface;
use Illuminate\Http\Request;


class HomeController extends Controller
{


    protected $repo;

    public function __construct(BikeRepositoriesInterface $repo)
    {
        $this->repo= $repo;
    }

    //Load front page
    function index(Request $request)
    {
        $data = $this->repo->filter($request->all());
        return view('home.indexHome', ['bikes' => $data, 'input' => $request->all()]);
    }

    //Shows detail page
    function detail($id)
    {
        $bike = $this->repo->find($id);
        return view('home.detailHome', compact('bike') );
    }


}
