<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\CategoryImage;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryImageRequest as StoreRequest;
use App\Http\Requests\CategoryImageRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class Category_imageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryImageCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\CategoryImage');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category_image');
        $this->crud->setEntityNameStrings('Ảnh danh mục', 'Ảnh danh mục');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $all_categories = Category::all('id', 'name');
        $select_category = [];
        foreach ($all_categories as $category) {
            $category_id = $category->id;
            $category_name = $category->name;
            $select_category["$category_id"] = $category_name;
        }

        $this->crud->addColumn([
            'name' => 'category_id',
            'type' => 'select_from_array',
            'label' => 'Danh mục',
            'options' => $select_category,
        ]);
        $this->crud->addColumn([
            'name' => 'link',
            'type' => 'image',
            'label' => 'Ảnh đại diện',
        ]);

        $this->crud->addField([
            'name' => 'category_id',
            'type' => 'select_from_array',
            'label' => 'Danh mục',
            'options' => $select_category,
            'allows_null' => false,
        ]);
        $this->crud->addField([
            'name' => 'link',
            'type' => 'text',
            'label' => 'Đường dẫn ảnh'
        ]);

        // add asterisk for fields that are required in Category_imageRequest
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
