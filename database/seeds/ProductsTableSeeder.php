<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getProducts() as $product) {
            $product = array_merge(
                $product,
                array(
                    'is_active' => 1,
                    'created_at' => date('Y-m-d')
                )
            );

            DB::table('products')->insert($product);
        }
    }

    private function getProducts()
    {
        return array(
            //Category B2C
            array(
                'category_id' => ProductCategoriesTableSeeder::B2C,
                'name' => 'Site',
            ),
            array(
                'category_id' => ProductCategoriesTableSeeder::B2C,
                'name' => 'Sistemas Interno',
            ),
            array(
                'category_id' => ProductCategoriesTableSeeder::B2C,
                'name' => 'Outros',
            ),

            //Category B2B
            array(
                'category_id' => ProductCategoriesTableSeeder::B2B,
                'name' => 'Site',
            ),
            array(
                'category_id' => ProductCategoriesTableSeeder::B2B,
                'name' => 'Sistemas Interno',
            ),
            array(
                'category_id' => ProductCategoriesTableSeeder::B2B,
                'name' => 'Outros',
            ),

            //Category CONTATOS
            array(
                'category_id' => ProductCategoriesTableSeeder::CONTATOS,
                'name' => 'Busca de Currículos',
            ),
            array(
                'category_id' => ProductCategoriesTableSeeder::CONTATOS,
                'name' => 'Busca de Vagas',
            ),
            array(
                'category_id' => ProductCategoriesTableSeeder::CONTATOS,
                'name' => 'Contato Fácil',
            ),
        );
    }
}
