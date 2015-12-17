<?php

namespace common\models;

use common\models\Product;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;
use common\models\ProductAttribute;

class ProductInCart extends Product implements CartPositionInterface {
    use CartPositionTrait;

    public $attributeAssignments;

    public function getPrice()
    {
        return $this->our_price;
    }

    public function getId()
    {
        return $this->id . '%' . md5(serialize($this->attributeAssignments));;
    }

    public function getDisplayAttributeAssignmentPairs() {
        $displayPairs = [];
        foreach($this->attributeAssignments as $attributeAssignment) {
            $productAttribute = ProductAttribute::findOne($attributeAssignment['attribute_id']);
            $displayPairs[$productAttribute->name] = $attributeAssignment['attribute_option'];
        }

        return $displayPairs;
    }
}
