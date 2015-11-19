<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use DB;

class Page extends NeoEloquent {

    protected $label = 'Page';
    protected $fillable = ['id_social', 'name'];

    public static function search() {
        $rowset = DB::select('MATCH (page:Page) RETURN page, ID(page) as id');
        $result = [];
        foreach ($rowset as $row) {
            $data = $row['page']->getProperties();
            $data['id'] = $row['id'];
            $result[] = $data;
        }
        return $result;
    }

}