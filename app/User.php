<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class User extends NeoEloquent {

    protected $label = 'User'; // or array('User', 'Fan')
    protected $fillable = ['identity', 'username', 'fullname', 'gender', 'birthday', 'current_city', 'hometown'];

    public function page() {
        return $this->hasOne('Page');
    }

    public static function search($user_query, $skill_query) {
        $_user_query = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode($user_query, JSON_FORCE_OBJECT));
        $_skill_query = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode($skill_query, JSON_FORCE_OBJECT));
        $rowset = DB::select("MATCH (user:User$_user_query)-[:Own]->(:Skill$_skill_query),(user)-[:Own]->(skill) return user,skill,ID(user) as id, ID(skill) as skill_id");
        $result = [];
        foreach($rowset as $row)
        {
            $id = $row['id'];
            if (!isset($result[$id]))
            {
                $user = $row['user']->getProperties();
                $user['id'] = $id;
                $user['skill'] = [];
                $result[$id] = $user;
            }

            $skill = $row['skill']->getProperties();
            $skill['id'] = $row['skill_id'];
            $result[$id]['skill'][] = $skill;
        }
        return $result;
    }
}