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

        $all_top_products = TopProduct::all('product_id');
        $products_name = [];
        foreach ($all_top_products as $product) {
            $product_id = $product->product_id;
            $product_name = $product->product->name;
            $products_name["$product_id"] = $product_name;
        }
        $this->crud->addColumn([
            'name' => 'product_id',
            'type' => 'select_from_array',
            'label' => "Sản phẩm",
            'options' => $products_name,
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

    public function getProducts(Request $request)
    {
        $product_title = $request->get('q');
        return Product::where('name', 'like', "%$product_title%")->paginate();
    }
}
