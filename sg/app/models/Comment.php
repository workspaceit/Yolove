<?php

class Comment extends \Eloquent {
	protected $fillable = [];
        protected $table = 'comment';
        public $timestamps = false;
}