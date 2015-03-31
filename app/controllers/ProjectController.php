<?php

class ProjectController extends \BaseController {

    protected $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }
    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('projects.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $group = Sentry::findGroupByName('Project Manager');

        $users = Sentry::findAllUsersInGroup($group);

        return View::make('projects.create')->with('users',$users);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

        $validator = Validator::make($input,$this->project->rules,$this->project->customMessage);

        if($validator->passes())
        {
            $this->project->create($input);

            return Redirect::route('projects.index')->with('message','New Project Created');
        }

        return Redirect::route('projects.create')->withInput()->withErrors($validator);
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
		$data = $this->project->find($id);

        $group = Sentry::findGroupByName('Project Manager');

        $users = Sentry::findAllUsersInGroup($group);

        return View::make('projects.edit')->with('projects',$data)->with('users',$users);
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

        $validator = Validator::make($input,$this->project->rules,$this->project->customMessage);

        if($validator->passes())
        {
            $this->project->find($id)->update($input);

            return Redirect::route('projects.index')->with('message','Project is Updated');
        }

        return Redirect::route('projects.edit',[$id])->withInput()->withErrors($validator);

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->project->find($id)->delete();

        return Redirect::route('projects.index')->with('message','Project is Deleted');
	}

    public function getAllProjects()
    {
        $projects = $this->project->all();

        foreach($projects as $project)
        {
            $user = \Sentry::findUserById($project->projManager);

            $project->projManager = $user->first_name.' '.$user->last_name;
        }

        return $projects;
    }


}
