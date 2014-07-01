<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GeocodeCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'geocode:go';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Geocode Neighborhoods';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		$this->info('Curl: ' . function_exists('curl_version') ? 'Curl is Enabled' : 'Curl is Disabled');

		$n = Neighborhood::get();

		foreach($n as $neighborhood)
		{
			$this->info('Geocoding Neighborhood: ' . $neighborhood->name);

			$string = str_replace(" ", "+", $neighborhood->name);
			$string .= ",";
			$string .= str_replace(" ", "+", $neighborhood->city);
			$string .= ",";
			$string .= str_replace(" ", "+", 'TX');
			$string .= "&sensor=true";

			$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$string;

			$this->info($url);

			$string = file_get_contents($url);
			$response = json_decode($string, true);

			if ($response['status'] != 'OK')
			{
				$this->error('Bad Request');
			}

			$geometry = $response['results'][0]['geometry'];

	    	$neighborhood->latitude = $geometry['location']['lat'];
	    	$neighborhood->longitude = $geometry['location']['lng'];
	    	$neighborhood->save();

	    	$this->info('Neighborhood: ' . $neighborhood->name . ' Geocoded!');

		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
