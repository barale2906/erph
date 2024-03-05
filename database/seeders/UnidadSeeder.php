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
        $row = 0;

        if(($handle = fopen(public_path() . '/csv/alameda.csv', 'r')) !== false) {

                while(($data = fgetcsv($handle, 26000, ';')) !== false) {

                    $row++;

                    try {
                        if($data[2]){
                            $depe=Unidad::where('name', $data[2])->select('id')->first();
                            $dep=$depe->id;
                        }else{
                            $dep=null;
                        }

                        Unidad::create([
                            'propiedad_id'  =>1,
                            'name'       => strtolower($data[0]),
                            'coeficiente'   =>$data[1],
                            'unidad_id'     =>$dep,
                        ]);

                    }catch(Exception $exception){
                        Log::info('Line: ' . $row . ' alameda with error: ' . $exception->getMessage());
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
