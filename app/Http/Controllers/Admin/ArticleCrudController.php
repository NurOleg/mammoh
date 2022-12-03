<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticleCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('slug');
        CRUD::column('description');
        CRUD::column('preview_image_url');
        CRUD::column('is_published');
        CRUD::column('reducer_id');
        CRUD::column('published_at');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ArticleRequest::class);

        CRUD::field('title');
        CRUD::field('slug');
        $this->crud->addField([
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'summernote',
            'options' => [
                'toolbar' => [
                    ['font', ['bold', 'underline', 'italic']],
                    ['insert', ['link', 'picture']],
                ]
            ],
        ]);
//        CRUD::field('description');
        $this->crud->addField([
            'name' => 'preview_image_url',
            'label' => 'Preview image',
            'type' => 'upload',
            'upload' => true,
            'disk' => config('filesystems.default'), // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);
//        CRUD::field('preview_image_url');
        CRUD::field('is_published');
        CRUD::field('reducer_id');
        CRUD::field('published_at');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
