<?php


use Illuminate\Foundation\Testing\DatabaseMigrations;

class PagesLoadCorrectlyTest extends TestCase
{

    use DatabaseMigrations;

    public function testHomePage()
    {
        $this->visit('/')
             ->see('Product list');
    }

    public function testDetailPage()
    {
        $bike = factory(App\Bike::class)->create();



        $this->visit('/bike/'.$bike->id)
             ->see('Product detail')
             ->see($bike->name);
    }

    public function testCreatePage()
    {
        $this->withoutMiddleware();
        $this->visit('/panel/bikes/create')
             ->see('create');

    }

    public function testLoginPage()
    {
        $this->visit('/panel/bikes/create')
            ->see('login');

    }


}
