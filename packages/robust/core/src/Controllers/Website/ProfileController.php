<?php
namespace Robust\Core\Controllers\Website;

/**
 * Class ProfileController
 * @package Robust\Core\Controllers\Website
 */
class ProfileController extends Controller
{
    public function index()
    {
        return view('core::website.user-profile.index', ['lead' => \Auth::user()->memberable]);
    }
}
