angular.module('admin').service('Pages', function($http)
{
	var pages = {};

	pages.layouts = [];

	pages.getLayouts = function()
	{
		$http.get('/admin/api/v1/pages/layouts').success(function(data)
		{
			angular.copy(data, pages.layouts);
		});
	};

	return pages;
});