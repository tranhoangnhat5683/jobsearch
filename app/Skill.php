<?php
namespace App;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Skill extends NeoEloquent {

    protected $label = 'Skill'; // or array('User', 'Fan')

    protected $fillable = ['name'];
}