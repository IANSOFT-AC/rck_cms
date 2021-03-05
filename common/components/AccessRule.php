<?php
 
namespace common\components;
 
use app\models\Permission; 

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
            //Check for permissions
            $perms = Permission::find()->all();
            $userPermissions = explode(",",$user->identity->permissions);

            foreach ($perms as $key => $perm):
                foreach ($userPermissions as $key => $userPerm):
                    if (!$user->getIsGuest() && $perm->id == $userPerm) {
                        return true;
                    }
                endforeach;
            endforeach;
        }
 
        return false;
    }
}