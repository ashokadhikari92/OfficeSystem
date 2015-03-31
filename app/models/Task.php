<?php

class Task extends \Eloquent {

    protected $table = 'tasks';

    protected $primaryKey = 'id';

	protected $guarded = array();

    public $rules = array(
        'title' => 'required',
        'description' => 'required|min:20',
        'projectId' => 'required',
        'taskCategoryId' => 'required',
        'assignedTo' => 'required',
        'assignedDate' => 'required|date',
        'deadline' => 'required|date',
        'status' => 'required'
    );

    public $customMessage = array(
        'title.required' => 'Title field required',
        'description.required' => 'Description field required',
        'description.min:20' => 'Description Should be minimum of 20 characters',
        'projectId.required' => 'Project field required',
        'taskCategoryId.required' => 'Task Category field required',
        'assignedTo.required' => 'Assigned To field required',
        'assignedDate.required' => 'Assigned date field required',
        'assignedDate.date' => 'Assigned date must be Date',
        'deadline.required' => 'Deadline field required'
    );

}