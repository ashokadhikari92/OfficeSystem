<?php

class DashboardController extends \BaseController {

    protected $project;

    protected $user;

    protected $client;

    protected $task;

    protected $issue;

    function __construct(Client $client,IssueBug $issue,Project $project,Task $task,User $user)
    {
        $this->client = $client;
        $this->issue = $issue;
        $this->project = $project;
        $this->task = $task;
        $this->user = $user;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $project = count($this->project->all());

        $user = count($this->user->all());

        $client = count($this->client->all());

        $task = count($this->task->all());

        $issue = count($this->issue->all());

        return View::make('dashboard.index',compact('project','user','client','task','issue'));
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
