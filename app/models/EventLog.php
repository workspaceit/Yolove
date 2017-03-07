<?php

class EventLog extends \Eloquent {
	protected $fillable = [];
        protected $table = 'event_log';
        public $timestamps = false;
}