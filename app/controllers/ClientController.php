<?php

class ClientController extends \BaseController {

    protected $client;

    function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('clients.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('clients.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

        $validator = Validator::make($input,$this->client->rules,$this->client->customMessage);

        if($validator->passes())
        {
            $this->client->create($input);

            return Redirect::route('clients.index')->with('message','Client added Successfully');
        }

        return Redirect::route('clients.create')->withInput()->withErrors($validator);
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
		$client = $this->client->find($id);

        return View::make('clients.edit')->with('client',$client);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();

        $validator = Validator::make($input,$this->client->customMessage,$this->client->customMessage);

        if($validator->passes())
        {
            $this->client->find($id)->update($input);

            return Redirect::route('clients.index')->with('message','Client Updated Successfully');
        }

        return Redirect::route('clients.edit',[$id])->withInput()->withErrors($validator);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->client->find($id)->delete();

        return Redirect::route('clients.index')->with('message','Client Deleted Successfully');
	}

    public function getAllClients()
    {
        return $this->client->all();
    }


}
