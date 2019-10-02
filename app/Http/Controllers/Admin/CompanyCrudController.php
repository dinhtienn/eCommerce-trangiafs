<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CompanyRequest as StoreRequest;
use App\Http\Requests\CompanyRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CompanyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CompanyCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Company');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/company');
        $this->crud->setEntityNameStrings('Thông tin công ty', 'Thông tin công ty');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->denyAccess('create');
        $this->crud->addColumn(['name' => 'email', 'type' => 'email', 'label' => 'Email']);
        $this->crud->addColumn(['name' => 'phone', 'type' => 'text', 'label' => 'Số điện thoại']);
        $this->crud->addColumn(['name' => 'address', 'type' => 'text', 'label' => 'Địa chỉ']);
        $this->crud->addColumn(['name' => 'description', 'type' => 'text', 'label' => 'Mô tả']);

        $this->crud->addField(['name' => 'email', 'type' => 'email', 'label' => 'Email']);
        $this->crud->addField(['name' => 'phone', 'type' => 'number', 'label' => 'Số điện thoại']);
        $this->crud->addField(['name' => 'address', 'type' => 'text', 'label' => 'Địa chỉ']);
        $this->crud->addField(['name' => 'description', 'type' => 'textarea', 'label' => 'Mô tả']);
        $this->crud->addField(['name' => 'img', 'type' => 'text', 'label' => 'Ảnh']);
        $this->crud->addField(['name' => 'logo', 'type' => 'text', 'label' => 'Logo']);

        // add asterisk for fields that are required in CompanyRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
