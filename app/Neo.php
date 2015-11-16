<?php
namespace App;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Neo extends NeoEloquent {

    protected $label = 'Neo'; // or array('User', 'Fan')

    protected $fillable = ['name', 'email'];
}