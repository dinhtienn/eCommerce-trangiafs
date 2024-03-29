<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SocialRequest as StoreRequest;
use App\Http\Requests\SocialRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SocialCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SocialCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Social');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/social');
        $this->crud->setEntityNameStrings('Mạng xã hội', 'Mạng xã hội');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn(['name' => 'social', 'type' => 'text', 'label' => 'Mạng xã hội']);
        $this->crud->addColumn(['name' => 'link', 'type' => 'text', 'label' => 'Đường dẫn']);

        $this->crud->addField([
            'name' => 'social',
            'type' => 'select_from_array',
            'label' => 'Mạng xã hội',
            'options' => ['Facebook' => 'Facebook', 'Instagram' => 'Instagram', 'Twitter' => 'Twitter'],
            'allows_null' => false,
            'default' => 'Facebook',
        ]);

        $this->crud->addField([
            'name' => 'link',
            'type' => 'text',
            'label' => 'Đường dẫn',
            'hint' => 'Nhập vào đường dẫn mạng xã hội của bạn'
        ]);

        // add asterisk for fields that are required in SocialRequest
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
