<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

	protected $softDelete = true;

	public $byUser = true;

	protected $guarded = array();

	public function users()
	{
		return $this->belongsToMany('User','assigned_roles');
	}

	public function prettyName()
	{
		return preg_replace('/(?<!\ )[A-Z]/', ' $0', $this->name);
	}

}