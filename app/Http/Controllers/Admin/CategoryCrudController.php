<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('Danh mục', 'Danh mục');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Tên'
        ]);
        $this->crud->addColumn([
            'name' => 'parent_id',
            'type' => 'select',
            'label' => 'Danh mục cha',
            'entity' => 'parent',
            'attribute' => "name",
            'model' => "App\Models\Category",
        ]);
        $this->crud->addColumn([
            'name' => 'image',
            'type' => 'image',
            'label' => 'Hình ảnh',
        ]);
        $this->crud->addColumn([
            'name' => 'num_products',
            'type' => 'number',
            'label' => 'Số sản phẩm'
        ]);

        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Tên'
        ]);
        $this->crud->addField([
            'name' => 'parent_id',
            'type' => 'select',
            'label' => 'Danh mục cha',
            'entity' => 'parent',
            'attribute' => 'name',
            'model' => 'App\Models\Category',
            'hint' => 'Chọn danh mục cha hoặc để trống nếu danh mục này độc lập'
        ]);
        $this->crud->addField([
            'name' => 'image',
            'type' => 'upload',
            'label' => 'Ảnh danh mục',
            'upload' => true,
            'disk' => 'public',
            'hint' => 'Hãy tối ưu hình ảnh trước khi tải lên, không tải lên ảnh quá nặng trên 250kb để tối ưu tốc độ tải trang!'
        ]);

        // add asterisk for fields that are required in CategoryRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $request = $this->processDepth($request);
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

    public function destroy($id)
    {
        $this->deleteProducts($id);
        $this->crud->hasAccessOrFail('delete');
        $this->crud->setOperation('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        return $this->crud->delete($id);
    }

    private function processDepth($request)
    {
        if ($request->get('parent_id') == null) {
            $request->request->add(['depth' => 1]);
        } else {
            $category_parent = Category::findOrFail($request->get('parent_id'));
            $request->request->add(['depth' => $category_parent->depth + 1]);
        }
        return $request;
    }

    private function deleteProducts($id)
    {
        $all_products = Product::where(['categories' => $id])->get();
        foreach ($all_products as $product) {
            Product::find($product->id)->delete();
        }
    }
}
