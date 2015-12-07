<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    const B2C = 1;
    const B2B = 2;
    const CONTATOS = 3;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getCategories() as $category) {
            if ($this->hasCategory($category['id'])) {
                continue;
            }

            DB::table('product_categories')->insert($category);
        }
    }

    private function hasCategory($id)
    {
        return (bool)DB::table('product_categories')->select()
            ->where(['id' => $id])
            ->count();
    }

    private function getCategories()
    {
        return array(
            array(
                'id' => self::B2C,
                'name' => 'B2C',
                'is_active' => 1,
                'created_at' => date('Y-m-d')
            ),
            array(
                'id' => self::B2B,
                'name' => 'B2B',
                'is_active' => 1,
                'created_at' => date('Y-m-d')
            ),
            array(
                'id' => self::CONTATOS,
                'name' => 'Contatos',
                'is_active' => 1,
                'created_at' => date('Y-m-d')
            )
        );
    }
}
