<?php namespace Conductor\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class PageType extends Model {

    public $table = 'page_types';
    public $fillable = ['name', 'slug', 'layout'];
    public $timestamps = false;

    public function pages()
    {
        return $this->hasMany('Conductor\Pages\Models\Page');
    }

    public function areas()
    {
        return $this->hasMany('Conductor\Pages\Models\ContentArea', 'type_id');
    }

}