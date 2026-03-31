<?php
declare(strict_types=1);

namespace App\Controller;

class ProductsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // 未ログインでも商品一覧と詳細は見れるようにする
        if ($this->components()->has('Authentication')) {
            $this->Authentication->addUnauthenticatedActions(['index', 'view']);
        }
    }

    /**
     * 商品一覧取得 API
     * GET /products.json
     */
    public function index()
    {
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
        $this->viewBuilder()->setOption('serialize', ['products']);
    }

    /**
     * 商品詳細取得 API
     * GET /products/{id}.json
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id);

        $this->set(compact('product'));
        $this->viewBuilder()->setOption('serialize', ['product']);
    }
}
