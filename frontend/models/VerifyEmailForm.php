<?php

namespace frontend\models;

use common\models\User;
use yii\base\InvalidArgumentException;
use yii\base\Model;

class VerifyEmailForm extends Model
{
    /**
     * @var string
     */
    public $token;

    /**
     * @var User
     */
    private $_user;


    /**
     * Creates a form model with given token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws InvalidArgumentException if token is empty or not valid
     */
    public function __construct($token, array $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidArgumentException('Verify email token cannot be blank.');
        }
        $allegedUser = User::findByVerificationToken($token);

        //implement token expiry
        $start_date = new \DateTime('@' .$allegedUser->updated_at);
        $since_start = $start_date->diff(new \DateTime());
        $hours = $since_start->days * 24;
        $hours += $since_start->h;

        if($minutes < 48){
            $this->_user = $allegedUser;
        }else{
            throw new InvalidArgumentException('The token has already expired. Kindly sent another one and use it before 30 minutes');
        }

        if (!$this->_user) {
            throw new InvalidArgumentException('Wrong verify email token.');
        }
        parent::__construct($config);
    }

    /**
     * Verify email
     *
     * @return User|null the saved model or null if saving fails
     */
    public function verifyEmail()
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;

        return $user->save(false) ? $user : null;
    }
}
