<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class Location extends NeoEloquent {

    protected $label = 'Location';
    protected $fillable = ['name'];

    public static function search($name) {
        $rowset = DB::select("MATCH (location:Location) WHERE location.name =~ '(?i)$name.*' RETURN location");
        $result = [];
        foreach ($rowset as $row) {
            $data = $row['location']->getProperties();
            $data['id'] = $row['location']->getId();
            $result[] = $data;
        }
        return $result;
    }

}