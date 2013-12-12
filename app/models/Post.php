<?php
use LaravelBook\Ardent\Ardent;

class Post extends Ardent  
{
 
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $fillable = array('body');
 

    /**
    * Ardent validation rules
    */
    public static $rules = array(
      'body' => 'required',
    );
    

    /**
     * Define the relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
   
}