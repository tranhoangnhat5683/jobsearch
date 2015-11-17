<?php
namespace App;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Character extends NeoEloquent {

    protected $label = 'Character'; // or array('User', 'Fan')

    protected $fillable = ['name'];
}