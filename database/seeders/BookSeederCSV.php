<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeederCSV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();

        $info = fopen(base_path("database/data/bookinfo.csv"), "r");
        
        $dataRow = true;

        while(($data = fgetcsv($info, 4000, ",")) !== FALSE){
            if(!$dataRow){
                Book::create([
                    'title' => $data[0],
                    'code' => $data[1],
                    'author' => $data[2]
                ]);
            }
            $dataRow = false;
        }
        fclose($info);
    }
}
