<?php

class TaskController extends \BaseController {

    protected $task;

    protected $project;

    protected $taskCategory;

    protected $user;

    function __construct(User $user,TaskCategory $taskCategory,Task $task,Project $project)
    {
        $this->user = $user;
        $this->taskCategory = $taskCategory;
        $this->task = $task;
        $this->project = $project;
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('tasks.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$projects = $this->project->all();

        $taskCategory = $this->taskCategory->all();

        $users = $this->user->all();

        return View::make('tasks.create')->with('projects',$projects)->with('taskCategory',$taskCategory)->with('users',$users);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::all();

        $validator = Validator::make($input,$this->task->rules,$this->task->customMessage);

        if($validator->passes())
        {
            $this->task->create($input);

            return Redirect::route('tasks.index')->with('message','Task Created Successfully');
        }

        return Redirect::route('tasks.create')->withInput()->withErrors($validator);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $task = $this->task->find($id);

        return View::make('tasks.show')->with('task',$task);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $task = $this->task->find($id);

        $projects = $this->project->all();

        $taskCategory = $this->taskCategory->all();

        $users = $this->user->all();

        return View::make('tasks.edit')->with('task',$task)->with('projects',$projects)->with('taskCategory',$taskCategory)->with('users',$users);
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

        $validator = Validator::make($input,$this->task->rules,$this->task->customMessage);

        if($validator->passes())
        {
            $this->task->find($id)->update($input);

            return Redirect::route('tasks.index')->with('message','Task Updated Successfully');
        }

        return Redirect::route('tasks.edit',[$id])->withInput()->withErrors($validator);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->task->find($id)->delete();

        return Redirect::route('tasks.index')->with('message','Task Deleted Successfully');
	}

    public  function getAllTasks()
    {
        $tasks = $this->task->all();

        foreach($tasks as $task)
        {
            $project = $this->project->find($task->projectId);

            $task['projectId'] = $project['projName'];

            $user = $this->user->find($task->assignedTo);

            $task['assignedTo'] = $user['first_name'];
        }
        return $tasks;
    }

}
