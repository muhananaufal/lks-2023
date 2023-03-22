<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function access(User $user, Product $product)
    {
        return $user->id === $product->user_id;
    }
}
