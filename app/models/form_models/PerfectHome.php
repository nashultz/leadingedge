<?php namespace Forms;

use User;
use Input;
use Validator;
use Mail;

	class PerfectHome extends Base {

		protected $user;

		protected $rules = array(
			'maxprice'=>'required',
			'maxsqft'=>'required',
			'movedate'=>'required',
			'emailadd'=>'required|email'
		);

		protected $messages = array(
			'maxprice.required'=>'You must enter a Maximum Price',
			'maxsqft.required'=>'You must enter a Maximum Square Footage',
			'movedate.required'=>'You must enter a Preferred Moving Date',
			'emailadd.required'=>'You must enter an Email Address',
			'emailadd.email'=>'You must enter a valid Email Address'
		);

		public function __construct()
		{
			parent::__construct();

			$this->input = Input::except('_token');
		}

		public function process()
		{
			if (!$this->validate())
			{
				// Failure
				return false;
			}

			if (!$this->input['realtor'])
			{
				$toRealtor = Mail::send(array('emails.text.buttons.perfecthome_info','emails.html.buttons.perfecthome_info'), array(), function($message) {
					$message->to('RomanL@systemsedgeonline.com');
					$message->subject('Filled out form');
				});

				if (!$toRealtor)
				{
					$this->validationErrors->add('failedEmail', 'There was a problem with the Email System. Please Contact the System Administrator.');
					return false;
				}

				// Send Has No Realtor Email
				$txtEmail = 'emails.text.buttons.perfecthome_norealtor';
				$htmlEmail = 'emails.html.buttons.perfecthome_norealtor';
			}
			else
			{
				// Send Has Realtor Email
				$txtEmail = 'emails.text.buttons.perfecthome_hasrealtor';
				$htmlEmail = 'emails.html.buttons.perfecthome_hasrealtor';
			}

			$mail = Mail::send(array($txtEmail, $htmlEmail), array(), function($message) {
				$message->to($this->input['emailadd']);
				$message->subject('Thank you for contacting Leading Edge Realty');
			});			

			if (!$mail)
			{
				$this->validationErrors->add('failedEmail', 'There was a problem with the Email System. Please Contact the System Administrator.');
				return false;
			}

			return true;
		}

	}

?>