angular.module('admin').service('Pages', function($http)
{
	var pages = {};

    pages.pages = [];
    pages.layouts = [];

    pages.getAll = function()
    {
        return $http.get('/admin/api/v1/pages').success(function(data)
        {
           angular.copy(data.pages, pages.pages);
        });
    }

    pages.find = function(id)
    {
        return $http.get('/admin/api/v1/page/' + id);
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

    pages.update = function(page)
    {
        var data = {
            name: page.name,
            slug: page.slug,
            content: page.content
        };

        return $http.put('/admin/api/v1/page/' + page.id, data);

    }

    pages.destroy = function(page)
    {
        return $http.delete('/admin/api/v1/page/' + page.id).success(function()
        {
            pages.getAll();
        });
    }

	return pages;
});