<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('Sản phẩm', 'Sản phẩm');
        $this->crud->orderBy('created_at', 'desc');
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $all_categories = Category::all();
        $select_cate = array();
        foreach ($all_categories as $category) {
            $cate_id = $category->id;
            $cate_name = $category->name;
            $select_cate["$cate_id"] = $cate_name;
        }

        $this->crud->addColumn(['name' => 'id', 'type' => 'number', 'label' => 'ID']);
        $this->crud->addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addColumn([
            'name' => 'categories_id',
            'type' => 'select_from_array',
            'label' => 'Danh mục',
            'options' => $select_cate,
        ]);
        $this->crud->addColumn(['name' => 'price', 'type' => 'number', 'label' => 'Giá cả']);
        $this->crud->addColumn(['name' => 'description', 'type' => 'text', 'label' => 'Mô tả']);
        $this->crud->addColumn(['name' => 'short_description', 'type' => 'text', 'label' => 'Mô tả ngắn']);
        $this->crud->addColumn(['name' => 'status', 'type' => 'text', 'label' => 'Tình trạng']);

        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addField([
            'name' => 'categories_id',
            'label' => 'Danh mục',
            'type' => 'select_from_array',
            'options' => $select_cate,
            'allows_null' => false,
        ]);
        $this->crud->addField(['name' => 'price', 'type' => 'number', 'number' => 'Giá cả']);
        $this->crud->addField(['name' => 'description', 'type' => 'textarea', 'label' => 'Mô tả']);
        $this->crud->addField(['name' => 'short_description', 'type' => 'text', 'number' => 'Mô tả ngắn']);
        $this->crud->addField([
            'name' => 'status',
            'type' => 'select_from_array',
            'label' => 'Tình trạng',
            'options' => ['Còn hàng' => 'Còn hàng', 'Hết hàng' => 'Hết hàng'],
            'allows_null' => false,
            'default' => 'Còn hàng'
        ]);

        // add asterisk for fields that are required in ProductRequest
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
