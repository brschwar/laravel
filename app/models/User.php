<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use LaravelBook\Ardent\Ardent;

class User extends Ardent implements UserInterface, RemindableInterface {

    /**
     * Get rid of the redundant data like confirmation fields.
     *
     * @var boolean
     */
    public $autoPurgeRedundantAttributes = true;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = array('username', 'email');
    
    /**
     * Prevents the listed attributes from mass assignment.
     *
     * @var array
     */
    protected $guarded = array('id', 'password');


    /**
     * Ardent validation rules
     *
     * @var array
     */
    public static $rules = array(
      'username' => 'required|between:4,16',
      'email' => 'required|email',
      'password' => 'required|alpha_num|min:8|confirmed',
      'password_confirmation' => 'required|alpha_num|min:8',
    );

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    /**
     * Define the relationship to the Post model.
     */
    public function posts()
    {
      return $this->hasMany('Post');
    }



}