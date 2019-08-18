<?php
namespace Robust\Pages\Helpers;

use Robust\Pages\Models\Category;


/**
 * Class CategoryHelper
 * @package Robust\Pages\Helpers
 */
class CategoryHelper
{

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCategoriesForDropdown()
    {
        $categories = Category::all();
        return $categories->pluck('name', 'id');
    }
}