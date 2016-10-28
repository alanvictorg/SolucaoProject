<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CompanyValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
		''	=>'	photo:required',
	],
        ValidatorInterface::RULE_UPDATE => [
		''	=>'	photo:required',
	],
   ];
}
