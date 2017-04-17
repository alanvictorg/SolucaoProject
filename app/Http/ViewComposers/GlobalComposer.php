<?php

namespace App\Http\ViewComposers;

use App\Entities\Module;
use App\Services\ServiceConfig;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\FacadesAuth;
use Illuminate\View\View;


class GlobalComposer
{
    public function compose(View $view)
    {
        if (Auth::user()) {
            $route = Route::current();
            $module_name = $this->getModuleName($route);
            $action_name = $this->getActionName($route);


            $view->with('module_name', $module_name);
            $view->with('action_name', $action_name);

        }

    }

    protected function getModuleName($route)
    {
        if (Auth::user()) {
            if (!is_null($route)) {
                list($name, $action) = explode('.', $route->getName());
                if ($name) {
                    return $name;
                }
            }
        }


    }

    protected function getActionName($route)
    {
        if (Auth::user()) {
            if (!is_null($route)) {
                list($name, $action) = explode('.', $route->getName());
                if ($action) {
                    return $action;
                }
            }
        }
    }
}