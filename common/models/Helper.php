<?php
namespace common\models;

use Yii;

/**
 * Login form
 */
class Helper
{
    public static function selectedGroups($ids){
        $selectedGroup = [];
        $dd = explode(",", $ids);
        foreach ($dd as $key => $value):
            $selectedGroup[$value] = array('Selected' => true);
        endforeach;
        
        //Return Selected Group
        return $selectedGroup;
    }
}