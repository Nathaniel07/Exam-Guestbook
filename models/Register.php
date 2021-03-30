<?php 

namespace app\models;


use yii\db\ActiveRecord;

class Register extends ActiveRecord
{

	private $first_name;
	private $last_name;
	private $email_address;
	private $phone_number;
	private $gender;
	private $street;
	private $city;
	private $country;
	private $zip;
	private $event;

	public function rules()
	{
		return [[['first_name', 'last_name', 'email_address', 'phone_number', 'gender', 'street', 'city', 'country', 'zip', 'event'], 'required']];
	}


	/*

	public function getEvent()
	{
	// The first parameter is the name of the subtable model class to be associated,// The second parameter specifies the id field of the main table through the customer_id of the child table
	return $this->hasmany (event ::classname (), ["id" =>"id"]);
	}

	*/
}