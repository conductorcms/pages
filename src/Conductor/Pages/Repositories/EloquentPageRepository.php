<?php namespace Conductor\Pages\Repositories;

use Conductor\Pages\Models\Content;
use Conductor\Pages\Models\ContentArea;
use Conductor\Pages\Models\Page;
use Conductor\Pages\Models\PageType;

class EloquentPageRepository implements PageRepository {

    private $area;

    private $content;

    private $page;

    private $type;

    function __construct(ContentArea $area, Content $content, Page $page, PageType $type)
    {
        $this->area = $area;
        $this->content = $content;
        $this->page = $page;
        $this->type = $type;
    }

    public function getAll()
    {
        return $this->page->with('type')->get();
    }

    public function getHome()
    {
        return $this->page->whereHome(1)->first();
    }

    public function getTypes()
    {
        return $this->type->with('areas')->get();
    }

    public function findBySlug($slug)
    {
        return $this->page->with('type', 'content', 'content.area')->where('slug', $slug)->first();
    }

    public function findById($id)
    {
        return $this->page->with('type', 'content', 'content.area')->find($id);
    }

    public function update($id, $input)
    {
        $page = $this->page->find($id);

        $page->name = $input['name'];
        $page->slug = $input['slug'];

        $page->save();

        foreach($input['content'] as $content)
        {
            $model = $this->content->find($content['id']);

            $model->body = $content['body'];

            $model->save();
        }

        return true;
    }

    public function findTypeById($id)
    {
        return $this->type->with('areas')->find($id);
    }

    public function create($input)
    {
        $data = [
            'name' => $input['name'],
            'slug' => $input['slug'],
            'type_id' => $input['type']
        ];

        $page = $this->page->create($data);

        foreach($input['content'] as $content)
        {
            $data = [
                'page_id' => $page->id,
                'content_area_id' => $content['id'],
                'body' => $content['body']
            ];

            $content = $this->content->create($data);
        }

        return $page;
    }

    public function destroy($id)
    {
        return $this->page->destroy($id);
    }

    public function createType($input)
    {
        $type = $this->type->create($input);

        $areas = $input['areas'];


        foreach($areas as &$area)
        {
            $area['type_id'] = $type->id;

            $area = $this->area->create($area);
        }

    }

    public function updateType($id, $input)
    {
        $type = $this->type->find($id);

        $type->name = $input['name'];
        $type->layout = $input['layout'];

        $type->save();

        $areas = $input['areas'];



        foreach($areas as &$area)
        {
            if(!isset($area['id']))
            {
                $area['type_id'] = $type->id;
                $area = $this->area->create($area);
            }
            else
            {
                $model = $this->area->find($area['id']);
                $model->name = $area['name'];
                $model->slug = $area['slug'];
                $model->type = $area['type'];
                $model->save();
            }
        }

    }

    public function destroyType($id)
    {
        return $this->type->destroy($id);
    }

    public function destroyArea($id)
    {
        return $this->area->destroy($id);
    }
}