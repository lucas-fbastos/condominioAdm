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
                ["descricao_tipo" => "Manutenção na rede elétrica","icon"=>"fa-solid fa-bolt"],
                ["descricao_tipo" => "Manutenção hidraulica","icon"=>"fa-solid fa-droplet-slash"],
                ["descricao_tipo" => "Manutenção no portão","icon"=>"fa-solid fa-screwdriver-wrench"],
                ["descricao_tipo" => "Cachorro solto na rua","icon"=>"fa-solid fa-dog"],
                ["descricao_tipo" => "Barulho de som","icon"=>"fa-solid fa-speaker"],
                ["descricao_tipo" => "Reclamação","icon"=>"fa-solid fa-triangle-exclamation"],
                ["descricao_tipo" => "Veículo estacionado em local não permitido","icon"=>"fa-solid fa-car-on"],
                ["descricao_tipo" => "Correspondência desaparecida","icon"=>"fa-solid fa-envelope"],
                ["descricao_tipo" => "Outros","icon"=>"fa-solid fa-comment"]
            ]
        );
    }
}
