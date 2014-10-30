<?php namespace Conductor\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    public $fillable = ['name', 'slug', 'type_id'];

    public function type()
    {
        return $this->belongsTo('Conductor\Pages\Models\PageType');
    }

    public function content()
    {
        return $this->hasMany('Conductor\Pages\Models\Content');
    }

}