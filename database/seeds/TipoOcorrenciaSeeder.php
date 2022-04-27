<?php

use Illuminate\Database\Seeder;

class TipoOcorrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_ocorrencias')->insert(
            [
                ["descricao_tipo" => "Entrega","icon"=>"fa-solid fa-truck-ramp-box"],
                ["descricao_tipo" => "Manutenção na rede Elétrica","icon"=>"fa-solid fa-bolt"],
                ["descricao_tipo" => "Manutenção Hidraulica","icon"=>"fa-solid fa-droplet-slash"],
                ["descricao_tipo" => "Reclamação","icon"=>"fa-solid fa-triangle-exclamation"],
                ["descricao_tipo" => "Outros","icon"=>"fa-solid fa-comment"]
            ]
        );
    }
}
