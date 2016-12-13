<?php
namespace App\Repositories;

use Illuminate\Http\Request;

interface BikeRepositoriesInterface {

    public function getAll();

    public function find($id);

    public function store(Request $input);

    public function filter($input);



}