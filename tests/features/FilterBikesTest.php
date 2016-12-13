<?php


use App\Bike;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FilterBikesTest extends TestCase
{

    use DatabaseMigrations;

    //TODO: be careful!, filter do many thing, split it.

    public function testPagination()
    {
        // !! We assume all factories are valid.
        factory(App\Bike::class, 13)->create();


        $bikeCount = $this->call('GET', '/', ['page' => 3])->original->bikes->count();
        $this->assertEquals($bikeCount, 3);

        $bikeCount =$this->call('GET', '/', ['page' => 1])->original->bikes->count();
        $this->assertEquals($bikeCount, 5);

    }

    public function testColorFilter()
    {

        factory(App\Bike::class,3)->create([
            'color' => 'rgb(0, 0, 255)',
        ]);
        factory(App\Bike::class)->create([
            'color' => 'not color',
        ]);
        factory(App\Bike::class)->create([
            'color' => 'rgb(0, 255, 255)',
        ]);

        $bikeCount = $this->call('GET', '/', ['color' => 'rgb(0, 0, 255)'])->original->bikes->count();
        $this->assertEquals($bikeCount, 3);

    }

    public function testPriceFilter()
    {

        factory(App\Bike::class,3)->create([
            'price' => '1000',
        ]);
        factory(App\Bike::class)->create([
            'price' => '-25',
        ]);
        factory(App\Bike::class)->create([
            'price' => '60000',
        ]);

        $bikeCount = $this->call('GET', '/', ['min_price' => '1000','max_price' => '10000',])->original->bikes->count();
        $this->assertEquals($bikeCount, 3);

    }

    public function testWeightFilter()
    {

        factory(App\Bike::class,3)->create([
            'weight' => '1000',
        ]);
        factory(App\Bike::class)->create([
            'weight' => '-25',
        ]);
        factory(App\Bike::class)->create([
            'weight' => '60000',
        ]);

        $bikeCount = $this->call('GET', '/', ['min_weight' => '50','max_weight' => '30000',])->original->bikes->count();
        $this->assertEquals($bikeCount, 3);

    }

    public function testSortByPriceFilter()
    {

        $collection =factory(App\Bike::class,5)->create();

        //sort Asc
        $min=$collection->sortBy('price')->first();
        $max=$collection->sortBy('price')->last();

        $minBikeInDB = $this->call('GET', '/', ['order' => 'price','sort' => 'desc',])->original->bikes->last();
        $this->assertEquals($minBikeInDB->id, $min->id);

        $maxBikeInDB = $this->call('GET', '/', ['order' => 'price','sort' => 'asc',])->original->bikes->last();
        $this->assertEquals($maxBikeInDB->id, $max->id);


    }
    public function testSortByDateFilter()
    {

        $collection =factory(App\Bike::class,5)->create();

        //sort Asc
        $min=$collection->sortBy('id')->first();
        $max=$collection->sortBy('id')->last();

        $minBikeInDB = $this->call('GET', '/', ['sort' => 'desc',])->original->bikes->last();
        $this->assertEquals($minBikeInDB->id, $min->id);

        $maxBikeInDB = $this->call('GET', '/', ['sort' => 'asc',])->original->bikes->last();
        $this->assertEquals($maxBikeInDB->id, $max->id);


    }







}
