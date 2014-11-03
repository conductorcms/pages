angular.module('admin').service('PageType', function($http)
{
    var type = {};

    type.types = [];

    type.getAll = function()
    {
        return $http.get('/admin/api/v1/page/types').success(function(data)
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

    type.find = function(id)
    {
        return $http.get('/admin/api/v1/page/type/' + id);
    };

    type.update = function(type, contentAreas)
    {
        var data = {
            name: type.name,
            layout: type.layout,
            areas: contentAreas
        };

        return $http.put('/admin/api/v1/page/type/' + type.id, data);
    };

    type.destroy = function(id)
    {
        $http.delete('/admin/api/v1/page/type/' + id).success(function()
        {
           type.getAll();
        });
    };

    type.destroyArea = function(area)
    {
        return $http.delete('/admin/api/v1/page/type/area/' + area.id);
    };

    return type;
});