<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Products seed.
 */
class ProductsSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/5/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Minimalist Cotton T-Shirt',
                'description' => '上質なコットンを使用した、洗練されたシルエットのTシャツ。',
                'price' => 4500,
                'stock' => 50,
                'image_url' => 'https://example.com/images/t-shirt.jpg',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bauhaus Inspired Knit',
                'description' => 'バウハウスの幾何学デザインから着想を得た、ウール混のニット。',
                'price' => 12000,
                'stock' => 20,
                'image_url' => 'https://example.com/images/knit.jpg',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Logic & Aesthetics Tote Bag',
                'description' => '機能性と美しさを両立させた、A4サイズ対応のレザートート。',
                'price' => 8800,
                'stock' => 15,
                'image_url' => 'https://example.com/images/tote.jpg',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
