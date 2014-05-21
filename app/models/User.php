<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
use Carbon\Carbon;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use HasRole;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public static function boot()
	{
		User::creating(function($user) {
			$date = Carbon::now();
			$user->confirmation_code = Crypt::encrypt($user->email);
			$user->confirmation_expire_date = $date->addHours(2)->toDateTimeString();

		});

		User::saving(function($user) {
			$user->password = Hash::make($user->password);
		});
	}

	public function searches()
	{
		return $this->hasMany('Search');
	}

	public function getSearches()
	{
		return $this->searches->lists('name', 'id');
	}

	public function getDates()
	{
		return array('created_at','updated_at','deleted_at','confirmation_expire_date');
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getConfirmationUrl()
	{
		return URL::route('get.auth.confirmation', array('user' => $this->username, 'code' => $this->confirmation_code));
	}

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

}