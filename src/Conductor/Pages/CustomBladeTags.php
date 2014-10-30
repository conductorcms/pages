<?php namespace Conductor\Pages;

use Illuminate\View\Compilers\BladeCompiler;

class CustomBladeTags {

    private $blade;

    function __construct(BladeCompiler $blade)
    {
        $this->blade = $blade;
    }

    public function registerAll()
    {
        $this->registerContentArea();
    }

    private function registerContentArea()
    {
        $this->blade->extend(function($view, $compiler)
        {
            $pattern = $compiler->createMatcher('contentArea');

            return preg_replace($pattern, '$1<?php echo $content[$2]; ?>', $view);
        });
    }

}