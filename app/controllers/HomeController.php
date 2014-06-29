<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        

        return View::make('site.index');
    }

    public function about()
    {
        //
        //$agents = Employee::get();
        return View::make('site.about'/*,compact('agents')*/);
    }

    public function schoolratings()
    {
        //
        
        $file = 'assets/site/files/pdf/school-brochure-austin.pdf';  // <- Replace with the path to your .pdf file
        // check if the file exists
        if (file_exists($file)) {
            // read the file into a string
            $content = file_get_contents($file);
            // create a Laravel Response using the content string, an http response code of 200(OK),
            //  and an array of html headers including the pdf content type
            return Response::make($content, 200, array('content-type'=>'application/pdf'));
        }

        /*return Response::download('')*/
    }

    public function realtor() 
    {
        //
        return View::make('site.realtor');
    }

    public function testimonials()
    {
        //
        return View::make('site.testimonials');
    }

    public function testimonialform()
    {
        $spranone = rand(0,30);
        $sprantwo = rand(0,30);
        $sum = $spranone + $sprantwo;
        return View::make('site.testimonialform', compact('spranone', 'sprantwo','sum'));
    }

    public function mailtestimonial()
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
                    return Response::json($data, 400);
                } else {
                    $inputs = Input::except('_token','spanswer','sum');
                    Mail::send(array('emails.html.testimonials', 'emails.text.testimonials'),  compact('inputs'), function($message) {
                        $message->to('nashultz07@gmail.com', 'Leading Edge Realty');
                        $message->subject('Testimonial');
                    });
                    $data['message'] = 'Email has been sent.';
                    return Response::json($data, 200);
                }
            } else {
                $data['message'] = 'Incorrect Answer.';
                return Response::json($data, 400);
            }
        }

    }

    public function neighborhood($neighborhood)
    {
        //
        $neighborhood->load("builders");

        return View::make('site.neighborhood',compact('neighborhood'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}