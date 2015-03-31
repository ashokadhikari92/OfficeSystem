<?php

class IssueBugController extends \BaseController {

    protected $project;

    protected $user;

    protected $issueBug;

    function __construct(Project $project,User $user,IssueBug $issueBug)
    {
        $this->project = $project;
        $this->user = $user;
        $this->issueBug = $issueBug;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('issueBugs.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $projects = $this->project->all();

        $users = $this->user->all();

		return View::make('issueBugs.create')->with('projects',$projects)->with('users',$users);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

        $validator = Validator::make($input,$this->issueBug->rules,$this->issueBug->customMessage);

        if($validator->passes())
        {
            $this->issueBug->create($input);

            return Redirect::route('issues.index')->with('message','Issue/Bug Added Successfully');
        }

        return Redirect::route('issues.create')->withInput()->withErrors($validator);
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
        $issueBug = $this->issueBug->find($id);

        $projects = $this->project->all();

        $users = $this->user->all();

        return View::make('issueBugs.edit')->with('projects',$projects)->with('users',$users)->with('issue',$issueBug);
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

        $validator = Validator::make($input,$this->issueBug->rules,$this->issueBug->customMessage);

        if($validator->passes())
        {
            $this->issueBug->find($id)->update($input);

            return Redirect::route('issues.index')->with('message','Issue/Bug Updated Successfully');
        }

        return Redirect::route('issues.edit',[$id])->withInput()->withErrors($validator);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->issueBug->find($id);

        return Redirect::route('issues.index')->with('message','Issue/Bug Deleted Successfully');
	}

    public function getAllIssues()
    {
        $issues = $this->issueBug->all();

        foreach($issues as $issue)
        {
            $project = $this->project->find($issue->projectId);

            $issue['projectId'] = $project['projName'];

            $user = $this->user->find($issue->observedBy);

            $issue['observedBy'] = $user['first_name'];
        }

        return $issues;
    }

}
