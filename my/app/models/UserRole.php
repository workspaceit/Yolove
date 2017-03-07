<?php

class UserRole extends \Eloquent {
	protected $fillable = [];
        protected $table = 'user_usergroup';
        public $timestamps = false;
}