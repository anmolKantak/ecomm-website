<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_name','parent_id','status'];

 /*   public function categories(){
       return $this->hasMany(Category::class);
    }

    public function childrenCategories(){
        return $this->hasMany(Category::class)->with('categories');
    } */
    public function parent(){
        return $this->belongsTo(self::class,'parent_id');
    }

    public function children(){
        return $this->hasMany(self::class,'parent_id','category_id');
    }

    public function products(){
        $this->hasMany('App\Product');
    }


    
}
