<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Antipasti','Primi','Secondi','Dolci'
        ];

        foreach($categories as $el){
            $category = new Category();

            $category->name = $el;
            $category->slug = Str::slug( $category->name, '-');

            $category->save();
        }
    }
}
