<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = [
        'name',
    ];
    
    //many contacts belong to one category
    public function contacts() {
        return $this->hasMany('\App\Contact');
    }

}
