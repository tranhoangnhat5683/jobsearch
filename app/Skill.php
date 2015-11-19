<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class Skill extends NeoEloquent {

    protected $label = 'Skill';
    protected $fillable = ['name'];

    public static function search() {
        $rowset = DB::select('MATCH (skill:Skill) RETURN skill, ID(skill) as id');
        $result = [];
        foreach ($rowset as $row) {
            $data = $row['skill']->getProperties();
            $data['id'] = $row['id'];
            $result[] = $data;
        }
        return $result;
    }

}