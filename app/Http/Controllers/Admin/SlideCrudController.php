<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SlideRequest as StoreRequest;
use App\Http\Requests\SlideRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SlideCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SlideCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Slide');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/slide');
        $this->crud->setEntityNameStrings('Slides ảnh banner', 'Slides ảnh banner');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $check_slide = Slide::count();
        if ($check_slide >= 4) {
            $this->crud->denyAccess('create');
        }

        $this->crud->addColumn(['name' => 'title', 'type' => 'text', 'label' => 'Tiêu đề']);
        $this->crud->addColumn(['name' => 'description', 'type' => 'text', 'label' => 'Mô tả ngắn']);
        $this->crud->addColumn(['name' => 'link', 'type' => 'text', 'label' => 'Đường dẫn']);
        $this->crud->addColumn(['name' => 'image', 'type' => 'image', 'label' => 'Hình ảnh']);

        $this->crud->addField(['name' => 'title', 'type' => 'text', 'label' => 'Tiêu đề']);
        $this->crud->addField(['name' => 'description', 'type' => 'text', 'label' => 'Mô tả ngắn']);
        $this->crud->addField(['name' => 'link', 'type' => 'text', 'label' => 'Đường dẫn']);
        $this->crud->addField([
            'name' => 'image',
            'type' => 'upload',
            'label' => 'Hình ảnh',
            'upload' => true,
            'disk' => 'public',
            'hint' => 'Hãy tối ưu hình ảnh trước khi tải lên, không tải lên ảnh quá nặng trên 250kb để tối ưu tốc độ tải trang!'
        ]);

        // add asterisk for fields that are required in SlideRequest
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
