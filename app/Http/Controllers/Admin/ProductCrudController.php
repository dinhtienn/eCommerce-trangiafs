<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Product;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Models\TopProduct;

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

        $this->crud->addColumn(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addColumn([
            'name' => 'categories_id',
            'type' => 'select',
            'label' => 'Danh mục',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => 'App\Models\Category'
        ]);
        $this->crud->addColumn(['name' => 'price', 'type' => 'number', 'label' => 'Giá cả']);
        $this->crud->addColumn(['name' => 'description', 'type' => 'text', 'label' => 'Mô tả']);
        $this->crud->addColumn(['name' => 'short_description', 'type' => 'text', 'label' => 'Mô tả ngắn']);
        $this->crud->addColumn(['name' => 'status', 'type' => 'text', 'label' => 'Tình trạng']);
        $this->crud->addColumn([
            'name' => 'top',
            'type' => 'select_from_array',
            'label' => 'Top',
            'options' => ['false' => 'Không', 'true' => 'Có']
        ]);

        $this->crud->addField(['name' => 'name', 'type' => 'text', 'label' => 'Name']);
        $this->crud->addField([
            'name' => 'categories_id',
            'label' => 'Danh mục',
            'type' => 'select',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => 'App\Models\Category'
        ]);
        $this->crud->addField(['name' => 'price', 'type' => 'number', 'number' => 'Giá cả']);
        $this->crud->addField([
            'name' => 'description',
            'type' => 'ckeditor',
            'label' => 'Mô tả'
        ]);
        $this->crud->addField(['name' => 'short_description', 'type' => 'text', 'number' => 'Mô tả ngắn']);
        $this->crud->addField([
            'name' => 'images',
            'label' => 'Hình ảnh',
            'type' => 'upload_multiple',
            'upload' => true,
            'disk' => 'public',
        ]);
        $this->crud->addField([
            'name' => 'status',
            'type' => 'select_from_array',
            'label' => 'Tình trạng',
            'options' => ['Còn hàng' => 'Còn hàng', 'Hết hàng' => 'Hết hàng'],
            'allows_null' => false,
            'default' => 'Còn hàng'
        ]);
        $this->crud->addField([
            'name' => 'top',
            'type' => 'select_from_array',
            'label' => 'Top',
            'options' => ['false' => 'Không', 'true' => 'Có'],
            'allows_null' => false,
            'default' => 'false',
            'hint' => 'Nếu bạn muốn đẩy sản phẩm ra phần các sản phẩm tốt nhất, hãy chọn Có!'
        ]);

        // add asterisk for fields that are required in ProductRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $this->processTopProduct($request);
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        $this->connectImagesToProduct();
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $this->processTopProduct($request);
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function destroy($id)
    {
        $this->deleteTopProduct($id);
        $this->deleteImages($id);
        $this->crud->hasAccessOrFail('delete');
        $this->crud->setOperation('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        return $this->crud->delete($id);
    }

    public function deleteTopProduct($id)
    {
        $top_product = TopProduct::where(['product_id' => $id])->first();
        if ($top_product) {
            TopProduct::find($top_product->id)->delete();
        }
    }

    public function deleteImages($id)
    {
        $images = Image::where(['product_id' => $id])->get();
        if ($images) {
            foreach ($images as $image) {
                Image::find($image->id)->delete();
            }
        }
    }

    public function processTopProduct($request)
    {
        if ($request->get('top') == 'true') {
            TopProduct::create(['product_id' => $request->get('id')])->save();
        }
    }

    public function connectImagesToProduct()
    {
        $created_product = Product::orderBy('id', 'desc')->first();
        Image::where(['product_id' => 0])->update(['product_id' => $created_product->id]);
    }
}
