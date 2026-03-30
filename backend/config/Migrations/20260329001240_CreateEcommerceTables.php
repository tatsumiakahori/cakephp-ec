<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateEcommerceTables extends BaseMigration
{
    public function change(): void
    {
        // 1. 商品テーブル
        $table = $this->table('products');
        $table->addColumn('name', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('description', 'text', ['null' => true])
              ->addColumn('price', 'integer', ['null' => false])
              ->addColumn('stock', 'integer', ['default' => 0, 'null' => false])
              ->addColumn('image_url', 'string', ['limit' => 255, 'null' => true])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

        // 2. カートテーブル
        $table = $this->table('cart_items');
        $table->addColumn('user_id', 'integer', ['null' => false])
              ->addColumn('product_id', 'integer', ['null' => false])
              ->addColumn('quantity', 'integer', ['default' => 1, 'null' => false])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
              ->addForeignKey('product_id', 'products', 'id', ['delete' => 'CASCADE'])
              ->create();

        // 3. 注文親テーブル
        $table = $this->table('orders');
        $table->addColumn('user_id', 'integer', ['null' => false])
              ->addColumn('total_amount', 'integer', ['null' => false])
              ->addColumn('status', 'string', [
                'limit' => 20,
                'default' => 'ordered',
                'comment' => 'ordered, processing, shipped, delivered'
              ])
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
              ->create();

        // 4. 注文明細テーブル
        $table = $this->table('order_items');
        $table->addColumn('order_id', 'integer', ['null' => false])
              ->addColumn('product_id', 'integer', ['null' => false])
              ->addColumn('quantity', 'integer', ['null' => false])
              ->addColumn('price_at_purchase', 'integer', ['null' => false]) // 購入時の価格を保持
              ->addForeignKey('order_id', 'orders', 'id', ['delete' => 'CASCADE'])
              ->addForeignKey('product_id', 'products', 'id')
              ->create();
    }
}
