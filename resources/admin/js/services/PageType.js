angular.module('admin').service('PageType', function($http)
{
    var type = {};

    type.types = [];

    type.getAll = function()
    {
        $http.get('/admin/api/v1/page/types').success(function(data)
        {
            angular.copy(data.pages, type.types);
        });
    };

    type.save = function(type, contentAreas)
    {
        var data = {
            name: type.name,
            layout: type.layout,
            areas: contentAreas
        };

       return $http.post('/admin/api/v1/page/types', data).success(function(data)
       {

       });
    };

    return type;
});