<?php namespace Forms;

use User;
use Input;
use Validator;
use Mail;

	class AffordHome extends Base {

		protected $user;

		protected $rules = array(
			'pprice'=>'required',
			'aincome'=>'required',
			'mdebt'=>'required',
			'emailadd'=>'required|email',
		);

		protected $messages = array(
			'pprice.required'=>'You must enter a Purchase Price',
			'aincome.required'=>'You must enter your Annual Income',
			'emailadd.required'=>'You must enter your Email Address',
			'emailadd.email'=>'You must enter a Valid Email',
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

			$this->input['pprice'] = '$' . number_format($this->input['pprice'], 2);
			$this->input['aincome'] = '$' . number_format($this->input['aincome'], 2);
			$this->input['mdebt'] = '$' . number_format($this->input['mdebt'], 2);

			if (!$this->input['realtor'])
			{
				$toRealtor = Mail::send(array('emails.html.buttons.affordhome_info',"emails.text.buttons.affordhome_info"), $this->input, function($message) {
					$message->to('RomanL@systemsedgeonline.com');
					$message->cc('nathons@systemsedgeonline.com');
					$message->subject('Afford Home Form Submission');
				});

				if (!$toRealtor)
				{
					$this->validationErrors->add('failedEmail', 'There was a problem with the Email System. Please Contact the System Administrator.');
					return false;
				}

				// Send Has No Realtor Email
				$txtEmail = 'emails.text.buttons.norealtor';
				$htmlEmail = 'emails.html.buttons.norealtor';
			}
			else
			{
				// Send Has Realtor Email
				$txtEmail = 'emails.text.buttons.hasrealtor';
				$htmlEmail = 'emails.html.buttons.hasrealtor';
			}

			$mail = Mail::send(array($txtEmail, $htmlEmail), $this->input, function($message) {
				$message->to($this->input['emailadd']);
				$message->cc('nathons@systemsedgeonline.com');
				$message->cc('romanl@systemsedgeonline.com');
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