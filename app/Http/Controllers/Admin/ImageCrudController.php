<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImageRequest as StoreRequest;
use App\Http\Requests\ImageRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ImageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ImageCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Image');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/image');
        $this->crud->setEntityNameStrings('Ảnh sản phẩm', 'Ảnh sản phẩm');
        $this->crud->orderBy('updated_at', 'desc');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'name' => 'product_id',
            'type' => 'select',
            'label' => 'Sản phẩm',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => 'App\Models\Product'
        ]);
        $this->crud->addColumn(['name' => 'path', 'type' => 'image', 'label' => 'Hình ảnh']);

        $this->crud->denyAccess('create');
        $this->crud->denyAccess('update');
        // add asterisk for fields that are required in ImageRequest
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
