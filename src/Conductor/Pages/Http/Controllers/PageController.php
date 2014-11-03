<?php namespace Conductor\Pages\Http\Controllers;

use Conductor\Pages\Repositories\PageRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Config, File, Response;
use Illuminate\Support\Facades\View;

class PageController extends Controller {

    private $page;

    function __construct(PageRepository $page, Request $request)
    {
        $this->page = $page;
        $this->request = $request;
    }

    public function all()
    {
        return Response::json(['pages' => $this->page->getAll()], 200);
    }

    public function find($id)
    {
        return Response::json(['page' => $this->page->findById($id)], 200);
    }

    public function update($id)
    {
        $input = $this->request->only(['name', 'slug', 'content']);

        $this->page->update($id, $input);
    }

	public function getLayouts()
	{
		$path = base_path() . '/' . Config::get('core::themes.dir') . '/' . Config::get('core::themes.active') . '/layouts';

		$files = File::files($path);

		$layouts = [];
		foreach($files as $file)
		{
			$layout = [];

			$layout['fullPath'] = $file;
			$pieces = explode('/', $file);

			$layout['filename'] = $pieces[count($pieces) - 1];

			$pieces = explode('.', $layout['filename']);

			$layout['slug'] = $pieces[0];

			$layouts[] = $layout;
		}

		return $layouts;
	}

    public function buildPage($slug)
    {
        $page = $this->page->findBySlug($slug);

        $data = $this->buildData($page->content);

        $view = Config::get('core::themes.active') . '::layouts.' . $page->type->layout;

        return View::make($view, $data);
    }

    public function store()
    {
        $data = $this->request->only(['name', 'slug', 'type', 'content']);

        $this->page->create($data);
    }

    public function destroy($id)
    {
        return $this->page->destroy($id);
    }

    private function buildData($content)
    {
        $data = [];
        $data['content'] = [];

        foreach($content as $piece)
        {
            $data['content'][$piece->area->slug] = $piece->body;
        }

        return $data;
    }


}