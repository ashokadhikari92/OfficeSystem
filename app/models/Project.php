<?php

class Project extends \Eloquent {

    protected $table = 'projects';

    protected $primaryKey = 'projId';

	protected $guarded = array();

    public $rules = array(
        'projName' => 'required',
        'projStartDate' => 'required|date',
        'projEndDate' => 'required|date',
        'projManager' => 'required',
        'projCost' => 'required|',
        'projStatus' => 'required'
    );

    public $customMessage = array(
        'projName.required' => 'Project Name field is Required',
        'projStartDate.required' => 'Project Start Date field is Required',
        'projStartDate.date' => 'Start Date field must be in date format',
        'projEndDate.required' => 'Project End Date field is Required',
        'projEndDate.date' => 'End Date field must be in date format',
        'projManager.required' => 'Project Manager field is Required',
        'projCost.required' => 'Cost field is Required',
        'projStatus.required' => 'Status field is Required'
    );
}