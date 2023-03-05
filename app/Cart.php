<?php
namespace App;  
class Cart {
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public function __construct($oldCart) {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

    public function add($item, $id)
    {
        $storeItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storeItem = $this->items[$id];
            }
        }
        $storeItem['qty']++;
        $storeItem['price'] = $item->price * ($item->discount == 0? 1 : ((100-$item->discount)/100)) * $storeItem['qty'] ;
        $this->items[$id] = $storeItem;
        $this->totalQty++;
        $this->totalPrice += $storeItem['price'];
    }

    public function removeItem($id)
    {   
        if(array_key_exists($id, $this->items)){
            $item = $this->items[$id]; 
            $this->totalPrice -= ($item['price'] * $item['qty']);
            $this->totalQty -= $item['qty'];
            unset($this->items[$id]);
        }
       
    }
}