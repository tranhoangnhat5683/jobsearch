<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class Character extends NeoEloquent {

    protected $label = 'Character';
    protected $fillable = ['name'];

    public static function search($name) {
        $rowset = DB::select("MATCH (character:Character) WHERE character.name =~ '$name.*' RETURN character, ID(character) as id");
        $result = [];
        foreach ($rowset as $row) {
            $data = $row['character']->getProperties();
            $data['id'] = $row['id'];
            $result[] = $data;
        }
        return $result;
    }

}