<?php namespace Conductor\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class ContentArea extends Model {

    public $fillable = ['name', 'slug', 'type', 'type_id'];
    public $timestamps = false;

    public function content()
    {
        return $this->hasMany('Conductor\Pages\Models\Content', 'content_area_id');
    }
}