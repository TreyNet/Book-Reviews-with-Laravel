<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    /**
     * Create a new component instance.
     */

    public ?float $rating;
    
    public function __construct(?float $rating){
        $this -> rating = $rating;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.star-rating');
    }
}
