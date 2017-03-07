<?php

class Share extends \Eloquent {

    protected $fillable = [];
    protected $table = 'share';
    public function item()
    {
        return $this->hasOne('Item', 'id');
    }
    public $timestamps = false;
    public function size() {
        return $this->hasMany('ItemSize', 'item_id');
    }
    
}