<?php

require_once(MAX_PATH.'/lib/OA/Upgrade/Migration.php');

class Migration_013 extends Migration
{

    function __construct()
    {
        //$this->__construct();

		$this->aTaskList_constructive[] = 'beforeAddField__banner_vast_element__vast_thirdparty_impression';
		$this->aTaskList_constructive[] = 'afterAddField__banner_vast_element__vast_thirdparty_impression';


		$this->aObjectMap['banner_vast_element']['vast_thirdparty_impression'] = array('fromTable'=>'banner_vast_element', 'fromField'=>'vast_thirdparty_impression');
    }



	function beforeAddField__banner_vast_element__vast_thirdparty_impression()
	{
		return $this->beforeAddField('banner_vast_element', 'vast_thirdparty_impression');
	}

	function afterAddField__banner_vast_element__vast_thirdparty_impression()
	{
		return $this->afterAddField('banner_vast_element', 'vast_thirdparty_impression');
	}

}

?>