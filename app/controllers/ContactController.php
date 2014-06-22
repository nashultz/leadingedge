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
            $data['message'] = 'Email has been sent.';
            return Response::json($data, 200);
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
                    $messages = $validator->messages();
                    foreach($messages->toArray() as $key=>$value)
                    {
                        $data['message'][] = $value;
                        $data['field'][] = $key;
                    }
                    $data['redirectUrl'] = URL::route('site.contact');
                    return Response::json($data, 400);
                } else {
                    unset($inputs['_token']);
                    unset($inputs['spanswer']);
                    unset($inputs['sum']);
                    Mail::send('emails.contact', compact('inputs'), function($message)
                    {
                        $message->to('nashultz07@gmail.com', 'Leading Edge Realty')->subject('Contact Us Form Submission');
                        //$message->bcc('nathons@systemsedgeonline.com', 'Leading Edge Realty')->subject('Contact Us Form Submission');
                    });
                    $data['message'] = 'Email has been sent.';
                    return Response::json($data, 200);
                }
            } else {
                $data['message'] = 'Incorrect Answer. Refreshing the page.';
                $data['redirectUrl'] = URL::route('site.contact');
                return Response::json($data, 400);
            }
        }

    }
}