<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $price
 * @property int $stock
 * @property string|null $image_url
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\CartItem[] $cart_items
 * @property \App\Model\Entity\OrderItem[] $order_items
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'description' => true,
        'price' => true,
        'stock' => true,
        'image_url' => true,
        'created' => true,
        'modified' => true,
        'cart_items' => true,
        'order_items' => true,
    ];
}
