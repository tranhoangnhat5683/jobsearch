<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class Character extends NeoEloquent {

    protected $label = 'Character';
    protected $fillable = ['name'];

    public static function search($name = '') {
        $rowset = DB::select("MATCH (character:Character) WHERE character.name =~ '(?i)$name.*' RETURN character");
        $result = [];
        foreach ($rowset as $row) {
            $data = $row['character']->getProperties();
            $data['id'] = $row['character']->getId();
            $result[] = $data;
        }
        return $result;
    }

    public static function getMaxScore() {
        $rowset = DB::select("MATCH (:User)-[has:Has]->(character:Character) RETURN character, max(has.score) as score");

        $result = [];
        foreach ($rowset as $row) {
            $result[$row["character"]->getId()] = $row['score'];
        }
        return $result;
    }

}