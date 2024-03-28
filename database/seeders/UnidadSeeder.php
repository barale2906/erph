<?php

namespace Database\Seeders;

use App\Models\Ph\Unidad;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 1;

        if(($handle = fopen(public_path() . '/csv/alameda.csv', 'r')) !== false) {

                while(($data = fgetcsv($handle, 26000, ';')) !== false) {

                    $row++;

                    try {
                        if($data[3]){
                            $depe=Unidad::where('name', 'like', '%'.$data[3].'%')->select('id')->first();
                            $dep=$depe->id;
                            $name=$data[4]." - ".strtolower($data[3])." - ".strtolower($data[1]);
                        }else{
                            $dep=null;
                            $name=$data[4]." - ".strtolower($data[1]);
                        }

                        $mora=false;

                        if($data[5]){
                            $mora=true;
                        }else{
                            $mora=false;
                        }


                        Unidad::create([
                            'propiedad_id'  =>intval($data[0]),
                            'name'          =>$name,
                            'coeficiente'   =>$data[2],
                            'unidad_id'     =>$dep,
                            'mora'          =>$mora
                        ]);

                    }catch(Exception $exception){
                        Log::info('Line: ' . $row . ' alameda with error: ' . $exception->getMessage().' prop: '.intval($data[0]));
                    }
                }
        }

        fclose($handle);

        /* $un=Unidad::create([
            'propiedad_id'  =>1,
            'name'       => 'torre 3',
        ]);

        Unidad::create([
            'propiedad_id'  =>1,
            'name'       => 'Apartamento 506',
            'coeficiente'   =>0.25,
            'unidad_id'     =>$un->id,
        ]); */
    }
}
