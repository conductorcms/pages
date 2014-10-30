<?php namespace Conductor\Pages;

use Conductor\Core\Module\ModuleProvider;

class PagesModuleProvider extends ModuleProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('conductor/pages');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('Conductor\Pages\Repositories\PageRepository', 'Conductor\Pages\Repositories\EloquentPageRepository');

        //register blade extension
        $handler = $this->app->make('Conductor\Pages\CustomBladeTags');
        $handler->registerAll();
	}

	public function registerModule()
	{
		include __DIR__.'/../../routes.php';
        include __DIR__.'/../../helpers.php';

        parent::registerModule();
	}


	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
