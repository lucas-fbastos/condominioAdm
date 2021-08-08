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
                ["descricao_tipo" => "Entrega"],
                ["descricao_tipo" => "Manutenção na rede Elétrica"],
                ["descricao_tipo" => "Manutenção Hidraulica"],
                ["descricao_tipo" => "Reclamação"]
            ]
        );
    }
}
