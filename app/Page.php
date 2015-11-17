<?php
namespace App;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Page extends NeoEloquent {

    protected $label = 'Page'; // or array('User', 'Fan')

    protected $fillable = ['id_social', 'name'];
}