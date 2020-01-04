<?php
namespace Robust\Core\Helpers;

use Robust\Core\Models\Menu;
use Robust\DynamicForms\Models\Form;

/**
 * Class MenuHelper
 * @package Robust\Core\Helpers
 */
class MenuHelper
{
    /**
     * @return array
     */
    public function getMenus()
    {
        $menus = Menu::where('parent_id', 0)->orderBy('order', 'ASC')->get();
        return $menus;
    }

    /**
     * @return mixed
     */
    public function getSubMenus($id)
    {
        $menus = Menu::where('parent_id', $id)->orderBy('order', 'ASC')->get();
        return $menus;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getMenu($name)
    {
        return Menu::where('name', $name)->first();
    }

    /**
     * Return all the parent menus with children menus
     * @return mixed
     */
    public function getAllMenus()
    {
        //children.children is used to retrieve children of childrens
        $menus = Menu::where('parent_id', 0)->with('children', 'children.children')->get();
        return isset($menus) ? $menus->toArray() : [];
    }

    /**
     * Return all the parent menus with children menus
     * @return mixed
     */
    public function getAllMenusByPackage($package_name)
    {
        //children.children is used to retrieve children of childrens
        $menus = Menu::where('parent_id', 0)->where('package_name', '=', $package_name)->with('children', 'children.children')->get();
        return isset($menus) ? $menus : [];
    }

    /**
     * Test purpose only
     * @param \Robust\DynamicForms\Models\Form $form
     * @return mixed
     */
    public function getAllForms()
    {
        return Form::select('title', 'slug')->get();
    }


}
