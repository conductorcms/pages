<?php namespace Mattnmoore\Pages;

use Mattnmoore\Conductor\Module\ModuleProvider;

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
		$this->package('mattnmoore/pages');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

	}

	public function registerModule()
	{
		include __DIR__.'/../../routes.php';

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
