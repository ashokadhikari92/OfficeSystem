<?php

class IssueBug extends \Eloquent {

    protected $table = 'issue_bugs';

    protected $primaryKey = 'id';

	protected $guarded = array();

    public $rules = array(
        'projectId' => 'required',
        'title' => 'required',
        'description' => 'required|min:15',
        'observedBy' => 'required',
        'observedDate' => 'required|date',
        'status' => 'required'
    );

    public $customMessage = array(
        'projectId.required' => ' Project field required',
        'title.required' => 'Title field required',
        'description.required' => 'Description field required',
        'observedBy.required' => 'Observed By field required',
        'observedDate.required' => 'Observed Date field required',
        'observedDate.date' => 'Observed Date field must be in Date format',
        'status.required' => 'Status field required'
    );
}