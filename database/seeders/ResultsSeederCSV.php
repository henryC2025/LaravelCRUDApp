<?php

namespace Database\Seeders;

use App\Models\Results;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultsSeederCSV extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Results::truncate();

        $info = fopen(base_path("database/data/results.csv"), "r");
        
        $dataRow = true;

        while(($data = fgetcsv($info, 4000, ",")) !== FALSE){
            if(!$dataRow){
                Results::create([
                    'comment' => $data[0],
                    'author' => $data[1]
                    // 'comment_id' => $data[0],
                    // 'comment_name' => $data[1],
                    // 'forename' => $data[2],
                    // 'surname' => $data[3],
                    // 'email' => $data[4],
                    // 'valididated' => $data[5],
                    // 'style' => $data[6]
                ]);
            }
            $dataRow = false;
        }
        fclose($info);
    }
}