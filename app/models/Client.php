<?php

class Client extends \Eloquent {

    protected $table = 'clients';

    protected $primaryKey = 'id';

    protected $guarded = array();

    public $rules = array(
        'organizationName' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'contactPerson1' => 'required',
        'mobileContact1' => 'required'
    );

    public $customMessage = array(
        'organizationName.required' => 'Organization Name field required',
        'address.required' => 'Address field required',
        'phone.required' => 'Phone field required',
        'email.required' => 'Email field required',
        'email.email' => 'Invalid email format',
        'contactPerson1.required' => 'Contact Person 1 field required',
        'mobileContact1.required' => 'Contact 1 Phone field required'
    );
}