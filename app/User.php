<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class User extends NeoEloquent {

    protected $label = 'User'; // or array('User', 'Fan')
    protected $fillable = ['identity', 'username', 'fullname', 'gender', 'birthday', 'current_city', 'hometown'];

    public function page() {
        return $this->hasOne('Page');
    }

}