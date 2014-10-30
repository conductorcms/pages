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

    public function getTypes()
    {
        return $this->type->with('areas')->get();
    }

    public function findBySlug($slug)
    {
        return $this->page->with('type', 'content', 'content.area')->where('slug', $slug)->first();
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
}