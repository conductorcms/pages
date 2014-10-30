<?php namespace Conductor\Pages\Http\Controllers;

use Conductor\Pages\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Config, File, Response;

class PageTypeController extends Controller {

    private $page;

    function __construct(PageRepository $page, Request $request)
    {
        $this->page = $page;
        $this->request= $request;
    }

    public function all()
    {
        return Response::json(['pages' => $this->page->getTypes()], 200);
    }

    public function store()
    {
        $input = $this->request->only(['name', 'layout', 'areas']);

        $this->page->createType($input);
    }


}