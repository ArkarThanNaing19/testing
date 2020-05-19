<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
      'title' , 'body' , 'category_id' , 'number' , 'full_number' , 'user_id'
    ];

    public static function add($request,$user)
    {
        Article::create([
            'title' => $request->title,
            'body'  => $request->body,
            'category_id' => $request->category,
            'user_id' => $user
        ]);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){

          $model->number = Article::where("category_id",$model->category_id)->max('number') + 1;
          $model->full_number = $model->category->name . '-' . str_pad($model->number, 5,'0', STR_PAD_LEFT);

        });
    }

    public function category()
    {
      return $this->belongsTo("App\Category");
    }

    public function user()
    {
      return $this->belongsTo("App\User");
    }
}
