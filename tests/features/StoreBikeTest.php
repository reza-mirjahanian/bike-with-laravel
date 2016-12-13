<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class StoreBikeTest extends TestCase
{

    use DatabaseMigrations;


    public function testCreteBikeForm()
    {
        $this->withoutMiddleware();
        $this->visit('/panel/bikes/create')
            ->type('New Model', 'model')
            ->type('New Make', 'make')
            ->type('500', 'cc')
            ->type('rgb(,0 0 0)', 'color')
            ->type('1000', 'weight')
            ->type('2500.25', 'price')
            ->attach('tests/bike.jpg', 'image')
            ->press('Save Bike')
            ->seeInDatabase('bikes', ['model' => 'New Model']);

    }


}
