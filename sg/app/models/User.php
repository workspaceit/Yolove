<?php

class User extends \Eloquent {

    protected $table = 'user';
    public $timestamps = false;
    public function role() {
        return $this->hasOne('UserRole', 'user_id');
    }

}
