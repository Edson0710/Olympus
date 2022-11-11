<?php

namespace Database\Seeders;
use App\Models\Servicio;

use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Mascarilla exfoliante
        Servicio::create([
            'nombreServicio' => 'Mascarilla Exfoliante',
            'descripcionServicio' => 'Limpieza facial y aplicación de mascarilla exfoliante.',
            'duracionServicio' => '1 hora',
            'precioServicio' => '120.00',
        ]);
        //Ritual de toalla caliente
        Servicio::create([
            'nombreServicio' => 'Ritual de Toalla Caliente',
            'descripcionServicio' => 'Ritual de toalla caliente para abrir los poros.',
            'duracionServicio' => '1 hora',
            'precioServicio' => '150.00',
        ]);
        //Vapor con aromaterapia
        Servicio::create([
            'nombreServicio' => 'Vapor con aromaterapia',
            'descripcionServicio' => 'Limpieza facial, ritual de toalla caliente y mascarilla exfoliante incluido.',
            'duracionServicio' => '1 hora y 30 minutos',
            'precioServicio' => '250.00',
        ]);
        //Corte especial
        Servicio::create([
            'nombreServicio' => 'Corte especial',
            'descripcionServicio' => 'Corte de temporada a lo que se está usando en el momento.',
            'duracionServicio' => '45 minutos',
            'precioServicio' => '150.00',
        ]);
    }
}
