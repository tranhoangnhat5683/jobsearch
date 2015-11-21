<?php

//  encode query  $_user_query = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode($user_query, JSON_FORCE_OBJECT));

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class User extends NeoEloquent {

    protected $label = 'User'; // or array('User', 'Fan')
    protected $fillable = ['identity', 'username', 'fullname', 'gender', 'birthday', 'location', 'hometown', 'Hobbies'];

    public function page() {
        return $this->hasOne('Page');
    }

    public static function search($options) {
        $user_query = static::buildSearchUser($options);
        $location_query = static::buildSearchLocation($options);
        $skill_query = static::buildSearchSkill($options);
        $character_query = static::buildSearchCharacter($options);
var_dump(implode(' ', [
                    $user_query,
                    $location_query,
                    $skill_query,
                    $character_query,
                    "return ID(user) as id"
        ])); die;
        $rowset = DB::select(implode(' ', [
                    $user_query,
                    $location_query,
                    $skill_query,
                    $character_query,
                    "return ID(user) as id"
        ]));
        $ids = [];
        foreach ($rowset as $row) {
            $ids[] = $row['id'];
        }

        return static::get($ids);
    }

    private static function buildSearchUser($options) {
        if (isset($options['gender']) && $options['gender']) {
            return "MATCH (user:User) WHERE user.gender = '" . $options['gender'] . "'";
        }

        return 'MATCH (user:User)';
    }

    private static function buildSearchLocation($options) {
        if (isset($options['location']) && $options['location']) {
            return "MATCH (user)-[:At]->(location:Location) WHERE ID(location) = " . $options['location'];
        }

        return '';
    }

    private static function buildSearchSkill($options) {
        if (isset($options['skill']) && $options['skill']) {
            $skill_ids = $options['skill'];
            $skill_queries = [];
            for ($i = 0; $i < count($skill_ids); $i++) {
                $skill_queries[] = "MATCH (user)-[:Own]->(s:Skill) WHERE ID(s)={$skill_ids[$i]}";
            }

            return implode(' ', $skill_queries);
        }

        return '';
    }

    private static function buildSearchCharacter($options) {
        if (isset($options['character']) && $options['character']) {
            $character_ids = $options['character'];
            $character_queries = [];
            for ($i = 0; $i < count($character_ids); $i++) {
                $character_queries[] = "MATCH (user)-[:Has]->(c:Character) WHERE ID(c)={$character_ids[$i]}";
            }

            return implode(' ', $character_queries);
        }

        return '';
    }

    public static function get($ids = []) {
        $rowset = DB::select(implode(' ', [
                    "MATCH (user:User) WHERE ID(user) in [" . implode(',', $ids) . "]",
                    "OPTIONAL MATCH (user)-[:At]->(location:Location)",
                    "OPTIONAL MATCH (user)-[:Own]->(skill:Skill)",
                    "OPTIONAL MATCH (user)-[has:Has]->(character:Character)",
                    "return user,skill,character,location,has"
        ]));
        $result = null;
        $unique = [];
        foreach ($rowset as $row) {
            $id = $row['user']->getId();
            if (!isset($result[$id])) {
                $user = $row['user']->getProperties();
                $user['id'] = $id;
                $user['skill'] = [];
                $user['character'] = [];
                $result[$id] = $user;
                $unique[$id] = ['skill' => [], 'character' => []];
            }

            if ($row['skill'] && !isset($unique[$id]['skill'][$row['skill']->getId()])) {
                $skill = $row['skill']->getProperties();
                $skill['id'] = $row['skill']->getId();
                $skill['current'] = $row['has'] ? $row['has']->getProperties()['score'] : 0;
                $skill['max'] = $row['has'] ? $row['has']->getProperties()['score'] + 20 : 0;
                $result[$id]['skill'][] = $skill;
                $unique[$id]['skill'][$skill['id']] = true;
            }

            if ($row['character'] && !isset($unique[$id]['character'][$row['character']->getId()])) {
                $character = $row['character']->getProperties();
                $character['id'] = $row['character']->getId();
                $result[$id]['character'][] = $character;
                $unique[$id]['character'][$character['id']] = true;
            }

            if ($row['location']) {
                $location = $row['location']->getProperties();
                $location['id'] = $row['location']->getId();
                $result[$id]['location'] = $location;
            }
        }
        return $result;
    }

    private static function buildUser($row){

    }
}
