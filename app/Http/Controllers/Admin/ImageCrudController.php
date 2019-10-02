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

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $all_products = Product::all();
        $select_cate = array();
        foreach ($all_products as $product) {
            $prod_id = $product->id;
            $prod_name = $product->name;
            $select_cate["$prod_id"] = $prod_name;
        }

        $this->crud->addColumn(['name' => 'id', 'type' => 'number', 'label' => 'ID']);
        $this->crud->addColumn([
            'name' => 'product_id',
            'type' => 'select_from_array',
            'label' => 'Sản phẩm',
            'options' => $select_cate,
        ]);
        $this->crud->addColumn(['name' => 'link', 'type' => 'text', 'label' => 'Đường dẫn']);

        $this->crud->addField(['name' => 'product_id', 'type' => 'number', 'label' => 'ID Sản phẩm']);
        $this->crud->addField([
            'name' => 'link',
            'type' => 'text',
            'label' => 'Đường dẫn',
            'hint' => 'Nhập đường dẫn ở phần Quản lý File tại đây'
        ]);

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
