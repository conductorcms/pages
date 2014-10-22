<?php namespace Conductor\Pages\Http\Controllers;

use Illuminate\Routing\Controller;
use Config, File;

class PageController extends Controller {

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

}