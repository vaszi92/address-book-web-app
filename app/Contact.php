<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    protected $fillable = [
        'name',
        'phone',
        'email',
        'category_id',
    ];
    
    
    //A contact belongs to a category
    public function category() {
        return $this->belongsTo('\App\Category');
    }

}
