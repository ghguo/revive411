<?php

require_once(MAX_PATH.'/lib/OA/Upgrade/Migration.php');

class Migration_623 extends Migration
{

    function __construct()
    {

		$this->aTaskList_constructive[] = 'beforeAddField__session__user_id';
		$this->aTaskList_constructive[] = 'afterAddField__session__user_id';
		$this->aTaskList_constructive[] = 'beforeAddIndex__session__session_user_id_key';
		$this->aTaskList_constructive[] = 'afterAddIndex__session__session_user_id_key';
		$this->aTaskList_constructive[] = 'beforeAddIndex__session__session_lastused_key';
		$this->aTaskList_constructive[] = 'afterAddIndex__session__session_lastused_key';


		$this->aObjectMap['session']['user_id'] = array('fromTable'=>'session', 'fromField'=>'user_id');
    }

    private function addNewPreference()
    {
        $aConf = $GLOBALS['_MAX']['CONF'];

        $qTblPreferences = $this->oDBH->quoteIdentifier($aConf['table']['prefix'].'preferences');

        return $this->oDBH->exec("INSERT INTO {$qTblPreferences} (preference_name) VALUES ('ui_html_wyswyg_enabled')");
    }

	function beforeAddField__session__user_id()
	{
		return $this->beforeAddField('session', 'user_id');
	}

	function afterAddField__session__user_id()
	{
		return $this->addNewPreference() && $this->afterAddField('session', 'user_id');
	}

	function beforeAddIndex__session__session_user_id_key()
	{
		return $this->beforeAddIndex('session', 'session_user_id_key');
	}

	function afterAddIndex__session__session_user_id_key()
	{
		return $this->afterAddIndex('session', 'session_user_id_key');
	}

	function beforeAddIndex__session__session_lastused_key()
	{
		return $this->beforeAddIndex('session', 'session_lastused_key');
	}

	function afterAddIndex__session__session_lastused_key()
	{
		return $this->afterAddIndex('session', 'session_lastused_key');
	}

}
