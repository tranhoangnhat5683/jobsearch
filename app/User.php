<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class User extends NeoEloquent {

    protected $label = 'User'; // or array('User', 'Fan')
    protected $fillable = ['identity', 'username', 'fullname', 'gender', 'birthday', 'location', 'hometown', 'Hobbies'];

    public function page() {
        return $this->hasOne('Page');
    }

    public static function search($location = 0, $skill_ids = [], $character_ids = []) {
//        $_user_query = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode($user_query, JSON_FORCE_OBJECT));
        $location_query = '';
        if ($location)
        {
            $location_query = "WHERE ID(location) = $location";
        }

        $skill_queries = [];
        for ($i = 0; $i < count($skill_ids); $i++)
        {
            $skill_queries[] = "MATCH (user)-[:Own]->(s:Skill) WHERE ID(s)={$skill_ids[$i]}";
        }

        $character_queries = [];
        for ($i = 0; $i < count($character_ids); $i++)
        {
            $character_queries[] = "MATCH (user)-[:Has]->(c:Character) WHERE ID(c)={$character_ids[$i]}";
        }
        $rowset = DB::select(implode(' ', [
                "MATCH (user:User)",
                ($location ? '' : 'OPTIONAL') . " MATCH (user)-[:At]->(location:Location) $location_query",
                "OPTIONAL MATCH (user)-[:Own]->(skill:Skill)",
                "OPTIONAL MATCH (user)-[has:Has]->(character:Character)",
                implode(' ', $skill_queries),
                implode(' ', $character_queries),
                "return user,skill,character,location,has"
            ]));
        $result = [];
        foreach($rowset as $row)
        {
            $id = $row['user']->getId();
//            var_dump('----------------------------------', '<br />');
//            var_dump('id', $id, '<br />');
            if (!isset($result[$id]))
            {
                $user = $row['user']->getProperties();
                $user['id'] = $id;
                $user['skill'] = [];
                $user['character'] = [];
                $result[$id] = $user;
            }

            if ($row['skill'])
            {
                $skill = $row['skill']->getProperties();
                $skill['current'] = $row['has'] ? $row['has']->getProperties()['score'] : 0;
                $skill['max'] = $row['has'] ? $row['has']->getProperties()['score'] + 20 : 0;
                $skill['id'] = $row['skill']->getId();
//                var_dump('skill', $skill['name'], '<br />');
                $result[$id]['skill'][] = $skill;
            }

            if ($row['character'])
            {
                $character = $row['character']->getProperties();
                $character['id'] = $row['character']->getId();
//                var_dump('character', $character['name'], '<br />');
                $result[$id]['character'][] = $character;
            }

            if ($row['location'])
            {
                $location = $row['location']->getProperties();
                $location['id'] = $row['location']->getId();
//                var_dump('character', $character['name'], '<br />');
                $result[$id]['location'] = $location;
            }
        }
        return $result;
    }
}