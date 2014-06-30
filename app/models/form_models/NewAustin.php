<?php namespace Forms;

use User;
use Input;
use Validator;
use Mail;

	class NewAustin extends Base {

		protected $user;

		protected $rules = array(
			'name'=>'required',
			'address'=>'required',
			'city'=>'required',
			'state'=>'required',
			'zip'=>'required',
			'emailadd'=>'required|email',
			'maxprice'=>'required',
			'maxsqft'=>'required',
			'movedate'=>'required'
		);

		protected $messages = array(
			'name.required'=>'You must enter your Name',
			'address.required'=>'You must enter your Address',
			'city.required'=>'You must enter your City',
			'state.required'=>'You must enter your State',
			'zip.required'=>'You must enter your Zip',
			'emailadd.required'=>'You must enter your Email Address',
			'emailadd.email'=>'You must enter a Valid Email',
			'maxprice.required'=>'You must enter a Maximum Preferred Price',
			'maxsqft.required'=>'You must enter a Maximum Preferred Square Footage',
			'movedate.required'=>'Your must enter a Move Date'
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

			$this->input['maxprice'] = '$' . number_format($this->input['maxprice'], 2);
			$this->input['maxsqft'] = number_format($this->input['maxsqft']);

			if (!$this->input['realtor'])
			{

				$toRealtor = Mail::send(array('emails.text.buttons.newaustin_info','emails.html.buttons.newaustin_info'), $this->input, function($message) {
					$message->to('RomanL@systemsedgeonline.com');
					$message->cc('nathons@systemsedgeonline.com');
					$message->subject('New to Austin Form Submission');
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