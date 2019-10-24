<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\TopProduct;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TopProductRequest as StoreRequest;
use App\Http\Requests\TopProductRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Illuminate\Http\Request;

/**
 * Class TopProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TopProductCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\TopProduct');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/top_product');
        $this->crud->setEntityNameStrings('Sản phẩm hàng đầu', 'Sản phẩm hàng đầu');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'label' => "Tên sản phẩm",
            'type' => "select",
            'name' => 'product_id',
            'entity' => 'product',
            'attribute' => "name",
            'model' => "App\Models\Product",
        ]);

        $this->crud->addField([
            'label' => 'Sản phẩm',
            'type'  => 'select2_from_ajax',
            'name'  => 'product_id',
            'entity' => 'product',
            'attribute' => 'name',
            'model' => "App\Models\Product",
            'data_source' => route('admin.search.products'),
            'placeholder' => "Nhập một sản phẩm hàng đầu để hiển thị",
            'minimum_input_length' => 2,
        ]);

        // add asterisk for fields that are required in TopProductRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        $this->processProductToTop($request);
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
        $this->processProductToNormal($id);
        $this->crud->hasAccessOrFail('delete');
        $this->crud->setOperation('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        return $this->crud->delete($id);
    }

    public function getProducts(Request $request)
    {
        $product_title = $request->get('q');
        return Product::where('name', 'like', "%$product_title%")->paginate();
    }

    public function processProductToTop($request)
    {
        Product::where(['id' => $request->get('product_id')])->update(['top' => 'true']);
    }

    public function processProductToNormal($id)
    {
        $product_id = TopProduct::where(['id' => $id])->first()->product_id;
        Product::where(['id' => $product_id])->update(['top' => 'false']);
    }
}
