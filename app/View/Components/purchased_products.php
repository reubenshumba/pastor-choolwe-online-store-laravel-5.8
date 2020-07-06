<?php

namespace App\View\Components;

use Illuminate\View\Component;

class purchased_products extends Component
{
    public $purchasedProducts;
    /**
     * Create a new component instance.
     * @param  $purchasedProducts
     * @return void
     */
    public function __construct($purchasedProducts)
    {
        $this->purchasedProducts =$purchasedProducts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.purchased_products');
    }
}
