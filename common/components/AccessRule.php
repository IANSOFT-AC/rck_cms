<?php
 
namespace common\components;
 
use app\models\Permission;
use yii\helpers\ArrayHelper;

class AccessRule extends \yii\filters\AccessRule {
 
    /**
     * @inheritdoc
     */
    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } elseif ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            // Check if the user is logged in, and the roles match
            } elseif (!$user->getIsGuest() && $role == $user->identity->role) {
                return true;
            }
            //Check if the user is logged in, and the permissions match
            $userPermissions = ArrayHelper::getColumn(Permission::find()->where(['in', 'id', explode(",",$user->identity->permissions)])->select('code')->asArray()->all(),'code');

            if (!$user->getIsGuest() && in_array($role,$userPermissions)) {
                return true;
            }
        }
 
        return false;
    }
}