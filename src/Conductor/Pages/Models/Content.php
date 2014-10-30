<?php namespace Conductor\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    public $table = 'pages_content';
    public $fillable = ['page_id', 'content_area_id', 'body'];

    public function area()
    {
       return $this->belongsTo('Conductor\Pages\Models\ContentArea', 'content_area_id');
    }
}