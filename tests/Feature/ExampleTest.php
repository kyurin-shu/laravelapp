<?php

namespace Tests\Feature;

use App\Person;
use DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\ResponseTrait;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/hello')->assertOk();
        $this->get('/home')->assertStatus(302);
        $this->get('/login')->assertStatus(200);
        $this->get('/hoge')->assertNotFound();
    }

    /**
     * Test DB PeopleTable
     */
    public function testDatabasePeopleTable()  
    {
        $this->seed(DatabaseSeeder::class);

        $data = [
            'id' => 1,
            'name' => 'test',
            'mail' => 'test@user',
            'age' => '500'
        ];

        $this->assertDatabaseHas('people',$data);
        
        $data['id'] = 999;
        $this->assertDatabaseMissing('people',$data);
    }

    /**
     * Test Model Person
     */
    public function testModelPerson()
    {
        $data = [
            'id' => 1,
            'name' => 'hello',
            'mail' => 'hello@world',
            'age' => '404'
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people',$data);
        
        $person->name = 'dare?';
        $person->save();
        $this->assertDatabaseMissing('people',$data);
        $data['name'] = 'dare?';
        $this->assertDatabaseHas('people',$data);

        $person->delete();
        $this->assertDatabaseMissing('people',$data);
    }

    /**
     * Test Model People use PeopleFactory
     */
    public function testModelPersonUseFactory()
    {
        for ($i = 0; $i < 100; $i++) { 
            factory(Person::class)->create();
        }
        $count = Person::get()->count();
        $person = Person::find(rand(1,$count));
        $data = $person->toArray();
        print_r($data);

        $this->assertDatabaseHas('people',$data);

        $person->delete();
        $this->assertDatabaseMissing('people',$data);
    }
}
