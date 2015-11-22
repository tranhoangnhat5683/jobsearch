<?php

//  encode query  $_user_query = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',json_encode($user_query, JSON_FORCE_OBJECT));

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use App\Character;
use DB;

class User extends NeoEloquent {

    protected $label = 'User'; // or array('User', 'Fan')
    protected $fillable = ['identity', 'username', 'fullname', 'email', 'gender', 'birthday', 'location', 'hometown', 'hobbies', 'jobs'];

    public function page() {
        return $this->hasOne('Page');
    }

    public static function search($options) {
        $user_query = static::buildSearchUser($options);
        $location_query = static::buildSearchLocation($options);
        $skill_query = static::buildSearchSkill($options);
        $character_query = static::buildSearchCharacter($options);
        $order = static::buildSearchOrder($options);
        $paginator = static::buildSearchPaginator($options);

        $rowset = DB::select(implode(' ', [
                    $user_query,
                    $location_query,
                    $skill_query,
                    $character_query,
                    "return user.identity as identity",
                    $order,
                    $paginator,
        ]));
        $identities = [];
        foreach ($rowset as $row) {
            $identities[] = $row['identity'];
        }

        return static::get($identities);
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
            return "MATCH (user)-[:Own]->(s:Skill) WHERE ID(s) in [" . implode(',', $skill_ids) . "]";
        }

        return '';
    }

    private static function buildSearchCharacter($options) {
        if (isset($options['character']) && $options['character']) {
            $character_ids = $options['character'];
            $character_queries = [];
            for ($i = 0; $i < count($character_ids); $i++) {
                $character_queries[] = "MATCH (user)-[h$i:Has]->(c$i:Character) WHERE ID(c$i)={$character_ids[$i]} AND h$i.score > 0";
            }

            return implode(' ', $character_queries);
        }

        return '';
    }

    private static function buildSearchOrder($options) {
        if (isset($options['character']) && $options['character']) {
            $character_ids = $options['character'];
            $character_queries = [];
            for ($i = 0; $i < count($character_ids); $i++) {
                $character_queries[] = "h$i.score DESC";
            }

            if (count($character_queries)) {
                return "ORDER BY " . implode(',', $character_queries);
            }
        }

        return "";
    }

    private static function buildSearchPaginator($options) {
        $skip = (isset($options['offset']) && $options['offset']) ? $options['offset'] : 0;
        $limit = (isset($options['limit']) && $options['limit']) ? $options['limit'] : 5;

        return "SKIP $skip LIMIT $limit";
    }

    public static function get($identities = []) {
        $maxScore = Character::getMaxScore();
        $rowset = DB::select(implode(' ', [
                    "MATCH (user:User) WHERE user.identity in " . json_encode($identities),
                    "OPTIONAL MATCH (user)-[:At]->(location:Location)",
                    "OPTIONAL MATCH (user)-[:Own]->(skill:Skill)",
                    "OPTIONAL MATCH (user)-[has:Has]->(character:Character)",
                    "OPTIONAL MATCH (user)-[:Join]->(page:Page)",
                    "return user,skill,character,page,location,has"
        ]));

        $result = [];
        $unique = [];
        foreach ($rowset as $row) {
            $identity = $row['user']->getProperties()['identity'];
            if (!isset($unique[$identity])) {
                $user = $row['user']->getProperties();
                $user['id'] = $row['user']->getId();
                $user['skills'] = [];
                $user['characters'] = [];
                $user['pages'] = [];
                $result[$identity] = $user;
                $unique[$identity] = ['skills' => [], 'characters' => [], 'pages' => []];
            }

            if ($row['skill'] && !isset($unique[$identity]['skills'][$row['skill']->getId()])) {
                $skill = $row['skill']->getProperties();
                $skill['id'] = $row['skill']->getId();
                $result[$identity]['skills'][] = $skill;
                $unique[$identity]['skills'][$skill['id']] = true;
            }

            if ($row['character'] && !isset($unique[$identity]['characters'][$row['character']->getId()])) {
                if ($row['has']->getProperties()['score'])
                {
                    $character = $row['character']->getProperties();
                    $character['id'] = $row['character']->getId();
                    $character['current'] = $row['has']->getProperties()['score'];
                    $character['max'] = $maxScore[$character['id']];
                    $result[$identity]['characters'][] = $character;
                    $unique[$identity]['characters'][$character['id']] = true;
                }
            }

            if ($row['page'] && !isset($unique[$identity]['pages'][$row['page']->getId()])) {
                $page = $row['page']->getProperties();
                $page['id'] = $row['page']->getId();
                $result[$identity]['pages'][] = $page;
                $unique[$identity]['pages'][$page['id']] = true;
            }

            if ($row['location']) {
                $location = $row['location']->getProperties();
                $location['id'] = $row['location']->getId();
                $result[$identity]['location'] = $location;
            }
        }

        $final = [];
        for ($i = 0; $i < count($identities); $i++) {
            if (isset($result[$identities[$i]]))
            {
                $final[] = $result[$identities[$i]];
            }
        }

        return $final;
    }

}