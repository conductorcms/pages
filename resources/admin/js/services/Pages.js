angular.module('admin').service('Pages', function($http)
{
	var pages = {};

    pages.pages = [];
    pages.layouts = [];

    pages.getAll = function()
    {
        $http.get('/admin/api/v1/pages').success(function(data)
        {
           angular.copy(data.pages, pages.pages);
        });
    }

	pages.getLayouts = function()
	{
		$http.get('/admin/api/v1/pages/layouts').success(function(data)
		{
			angular.copy(data, pages.layouts);
		});
	};

    pages.save = function(page)
    {
        var data = {
            name: page.name,
            slug: page.slug,
            type: page.type.id,
            content: page.type.areas
        };

        return $http.post('/admin/api/v1/pages', data).success(function(data)
        {

        });
    };

	return pages;
});