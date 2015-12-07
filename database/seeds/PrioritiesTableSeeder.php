<?php

use Illuminate\Database\Seeder;

class PrioritiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getPriorities() as $priority) {
            DB::table('priorities')->insert($priority);
        }
    }

    private function getPriorities()
    {
        return array(
            array(
                'id' => 1,
                'name' => 'Baixa (N4)',
            ),
            array(
                'id' => 2,
                'name' => 'Média (N3)',
            ),
            array(
                'id' => 3,
                'name' => 'Alta (N2)',
            ),
            array(
                'id' => 4,
                'name' => 'Máxima (N1)',
            )
        );

    }
}
