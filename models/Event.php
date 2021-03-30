<?php 

namespace app\models;


use yii\db\ActiveRecord;

class Event extends ActiveRecord
{

	private $event_name;
	private $event_location;
	private $event_date;
	private $event_time;
	private $event_status;


	public function rules()
	{
		return [[['event_name', 'event_location', 'event_date', 'event_time', 'event_status'], 'required']];
	}


	/*
	public function getRegister()
	{
	// The same first parameter specifies the associated subtable model class name
	//
	return $this->hasone (register ::classname (), ["id" => "id"]);
	}
	*/
}