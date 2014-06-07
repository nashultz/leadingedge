<?php 

class ContactController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $spranone = rand(0,100);
        $sprantwo = rand(0,100);
        $sum = $spranone + $sprantwo;
        return View::make('site.contact', compact('spranone', 'sprantwo','sum'));
    }

    public function send()
    {
        if(Input::get('hvalue')) {
            Notifications::success('Email has been sent.')->save();
            return Redirect::back();
        } else {
            if(Input::get('spanswer')==Input::get('sum')) {
                $inputs = Input::all();
                $rules = array(
                    'fullname' => 'required',
                    'email' => 'required|email',
                    'msubject' => 'required',
                    'mcontent' => 'required',
                    'spanswer' => 'required',
                );
                $validator = Validator::make($inputs, $rules);
                if ($validator->fails()) {
                    return Redirect::route('site.contact')->withErrors($validator);
                } else {
                    unset($inputs['_token']);
                    unset($inputs['spanswer']);
                    unset($inputs['sum']);
                    Mail::send('emails.contact', compact('inputs'), function($message)
                    {
                        $message->to('nashultz07@gmail.com', 'Leading Edge Realty')->subject('Contact Us Form Submission');
                        //$message->bcc('nathons@systemsedgeonline.com', 'Leading Edge Realty')->subject('Contact Us Form Submission');
                    });
                    Notifications::success('Email has been sent.')->save();
                    return Redirect::back();
                }
            } else {
                Notifications::danger('Incorrect Answer.')->save();
                return Redirect::back();
            }
        }

    }
}