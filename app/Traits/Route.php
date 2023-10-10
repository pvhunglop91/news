<?php

namespace App\Traits;

trait Route
{
    /**=====Login====*/
    public function getFormLoginRoute()
    {
        return route('loginHomepage');
    }

    public function getLoginRoute()
    {
        return route('postLoginHomepage');
    }

    public function getRedirectLoginRoute()
    {
        return route('homepage');
    }

    /**=====Register====*/
    public function getFormRegisterRoute()
    {
        return route('registrationHomepage');
    }

    public function getRegisterRoute()
    {
        return route('postRegistration');
    }

    public function getRedirectRegisterRoute()
    {
        return '/';
    }

    /**=====category=====*/
    public function getListCategoryRoute()
    {
        return route('category.list');
    }

    public function getCreateCategoryRoute()
    {
        return route('category.create');
    }

    public function getStoreCategoryRoute()
    {
        return route('category.store');
    }

    public function getEditCategoryRoute($id)
    {
        return route('category.edit', $id);
    }

    public function getUpdateCategoryRoute($id)
    {
        return route('category.update', $id);
    }

    public function getDestroyCategoryRoute($id)
    {
        return route('category.delete', $id);
    }

    /**=====Type Of News=====*/
    public function getListTypeOfNewsRoute()
    {
        return route('type_of_news.list');
    }

    public function getCreateTypeOfNewsRoute()
    {
        return route('type_of_news.create');
    }

    public function getStoreTypeOfNewsRoute()
    {
        return route('type_of_news.store');
    }

    public function getEditTypeOfNewsRoute($id)
    {
        return route('type_of_news.edit', $id);
    }

    public function getUpdateTypeOfNewsRoute($id)
    {
        return route('type_of_news.update', $id);
    }

    public function getDestroyTypeOfNewsRoute($id)
    {
        return route('type_of_news.delete', $id);
    }

    /**=====Role=====*/
    public function getListRoleRoute()
    {
        return route('role.list');
    }

    public function getCreateRoleRoute()
    {
        return route('role.create');
    }

    public function getStoreRoleRoute()
    {
        return route('role.store');
    }

    public function getEditRoleRoute($id)
    {
        return route('role.edit', $id);
    }

    public function getUpdateRoleRoute($id)
    {
        return route('role.update', $id);
    }

    public function getDestroyRoleRoute($id)
    {
        return route('role.delete', $id);
    }

    /**=====User=====*/
    public function getListUserRoute()
    {
        return route('user.list');
    }

    public function getCreateUserRoute()
    {
        return route('user.create');
    }

    public function getStoreUserRoute()
    {
        return route('user.store');
    }

    public function getEditUserRoute($id)
    {
        return route('user.edit', $id);
    }

    public function getUpdateUserRoute($id)
    {
        return route('user.update', $id);
    }

    public function getDestroyUserRoute($id)
    {
        return route('user.delete', $id);
    }

    /**=====News=====*/
    public function getListNewsRoute()
    {
        return route('news.list');
    }

    public function getCreateNewsRoute()
    {
        return route('news.create');
    }

    public function getStoreNewsRoute()
    {
        return route('news.store');
    }

    public function getEditNewsRoute($id)
    {
        return route('news.edit', $id);
    }

    public function getUpdateNewsRoute($id)
    {
        return route('news.update', $id);
    }

    public function getDestroyNewsRoute($id)
    {
        return route('news.delete', $id);
    }
}
