<?php


namespace redcapuzgent\rcmoddec\redcap;

abstract class AbstractExternalModuleDecorator implements IExternalModule
{

    /**
     * @var IExternalModule
     */
    private $parent;

    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    function selectData($some, $params = array())
    {
        return $this->parent->selectData($some,$params);
    }

    function updateData($some, $params = array())
    {
        return $this->parent->updateData($some,$params);
    }

    function deleteData($some, $params = array())
    {
        return $this->parent->deleteData($some,$params);
    }

    function updateUserPermissions($some, $params = array())
    {
        return $this->parent->updateUserPermissions($some,$params);
    }

    function hasPermission($permissionName)
    {
        return $this->parent->hasPermission($permissionName);
    }

    function getConfig()
    {
        return $this->parent->getConfig();
    }

    function getModuleDirectoryName()
    {
        return $this->parent->getModuleDirectoryName();
    }

    public function prefixSettingKey($key)
    {
        return $this->parent->prefixSettingKey($key);
    }

    function setSystemSetting($key, $value)
    {
        return $this->parent->setSystemSetting($key,$value);
    }

    function getSystemSetting($key)
    {
        return $this->parent->getSystemSetting($key);
    }

    /**
     * Gets all system settings as an array. Does not include project settings. Each setting
     * is formatted as: [ 'yourkey' => ['system_value' => 'foo', 'value' => 'bar'] ]
     *
     * @return array
     */
    function getSystemSettings()
    {
        return $this->parent->getSystemSettings();
    }

    function removeSystemSetting($key)
    {
        return $this->parent->removeSystemSetting($key);
    }

    function setProjectSetting($key, $value, $pid = null)
    {
        return $this->parent->setProjectSetting($key, $value, $pid);
    }

    function getProjectSetting($key, $pid = null)
    {
        return $this->parent->getProjectSetting($key,$pid);
    }

    /**
     * Gets all project and system settings as an array.  Useful for cases when you may
     * be creating a custom config page for the external module in a project. Each setting
     * is formatted as: [ 'yourkey' => ['system_value' => 'foo', 'value' => 'bar'] ]
     *
     * @param int|null $pid
     * @return array containing status and settings
     */
    function getProjectSettings($pid = null)
    {
        return $this->parent->getProjectSettings($pid);
    }

    /**
     * Saves all project settings (to be used with getProjectSettings).  Useful
     * for cases when you may create a custom config page or need to overwrite all
     * project settings for an external module.
     * @param array $settings Array of all project-specific settings
     * @param int|null $pid
     */
    function setProjectSettings($settings, $pid = null)
    {
        return $this->parent->setProjectSettings($settings, $pid);
    }

    function removeProjectSetting($key, $pid = null)
    {
        return $this->parent->removeProjectSetting($key,$pid);
    }

    function getSubSettings($key, $pid = null)
    {
        return $this->parent->getSubSettings($key, $pid);
    }

    function getSettingConfig($key)
    {
        return $this->parent->getSettingConfig($key);
    }

    function getUrl($path, $noAuth = false, $useApiEndpoint = false)
    {
        return $this->parent->getUrl($path, $noAuth, $useApiEndpoint);
    }

    public function getModulePath()
    {
        return $this->parent->getModulePath();
    }

    public function getModuleName()
    {
        return $this->parent->getModuleName();
    }

    public function resetSurveyAndGetCodes($projectId, $recordId, $surveyFormName = "", $eventId = "")
    {
        return $this->parent->resetSurveyAndGetCodes($projectId, $recordId, $surveyFormName, $eventId);
    }

    public function generateUniqueRandomSurveyHash()
    {
        return $this->parent->generateUniqueRandomSurveyHash();
    }

    public function getProjectAndRecordFromHashes($surveyHash, $returnCode)
    {
        return $this->parent->getProjectAndRecordFromHashes($surveyHash, $returnCode);
    }

    public function createPassthruForm($projectId, $recordId, $surveyFormName = "", $eventId = "")
    {
        return $this->parent->createPassthruForm($projectId, $recordId, $surveyFormName, $eventId);
    }

    public function getValidFormEventId($formName, $projectId)
    {
        return $this->parent->getValidFormEventId($formName, $projectId);
    }

    public function getSurveyId($projectId, $surveyFormName = "")
    {
        return $this->parent->getSurveyId($projectId, $surveyFormName);
    }

    public function getParticipantAndResponseId($surveyId, $recordId, $eventId = "")
    {
        return $this->parent->getParticipantAndResponseId($surveyId, $recordId, $eventId);
    }

    public function getProjectDetails($projectId)
    {
        return $this->parent->getProjectDetails($projectId);
    }

    public function getMetadata($projectId, $forms = NULL)
    {
        return $this->parent->getMetadata($projectId, $forms);
    }

    public function getData($projectId, $recordId, $eventId = "", $format = "array")
    {
        return $this->parent->getData($projectId, $recordId, $eventId, $format);
    }

    public function saveData($projectId, $recordId, $eventId, $data)
    {
        return $this->parent->saveData($projectId, $recordId, $eventId, $data);
    }

    /**
     * @param $projectId
     * @param $recordId
     * @param $eventId
     * @param $formName
     * @param $data array This must be in [instance => [field => value]] format
     * @return array
     */
    public function saveInstanceData($projectId, $recordId, $eventId, $formName, $data)
    {
        return $this->parent->saveInstanceData($projectId, $recordId, $eventId, $formName, $data);
    }

    public function requireProjectId($pid = null)
    {
        return $this->parent->requireProjectId($pid);
    }

    public function delayModuleExecution()
    {
        return $this->parent->delayModuleExecution();
    }

    public function sendAdminEmail($subject, $message)
    {
        return $this->parent->sendAdminEmail($subject,$message);
    }

    /**
     * Function that returns the label name from checkboxes, radio buttons, etc instead of the value
     * @param $params , associative array
     * @param null $value , (to support the old version)
     * @param null $pid , (to support the old version)
     * @return mixed|string, label
     */
    public function getChoiceLabel($params, $value = null, $pid = null)
    {
        return $this->parent->getChoiceLabel($params, $value, $pid);
    }

    public function getChoiceLabels($fieldName, $pid = null)
    {
        return $this->parent->getChoiceLabels($fieldName,$pid);
    }

    public function getFieldLabel($fieldName)
    {
        return $this->parent->getFieldLabel($fieldName);
    }

    public function query($sql)
    {
        return $this->parent->query($sql);
    }

    public function createDAG($dagName)
    {
        return $this->parent->createDAG($dagName);
    }

    public function deleteDAG($dagId)
    {
        return $this->parent->deleteDAG($dagId);
    }

    public function renameDAG($dagId, $dagName)
    {
        return $this->parent->renameDAG($dagId,$dagName);
    }

    public function setDAG($record, $dagId)
    {
        return $this->parent->setDAG($record,$dagId);
    }

    public function setData($record, $fieldName, $values)
    {
        return $this->parent->setData($record, $fieldName, $values);
    }

    public function areSettingPermissionsUserBased()
    {
        return $this->parent->areSettingPermissionsUserBased();
    }

    public function disableUserBasedSettingPermissions()
    {
        return $this->parent->disableUserBasedSettingPermissions();
    }

    public function addAutoNumberedRecord($pid = null)
    {
        return $this->parent->addAutoNumberedRecord($pid);
    }

    public function getFirstEventId($pid = null)
    {
        return $this->parent->getFirstEventId($pid);
    }

    public function saveFile($path, $pid = null)
    {
        return $this->parent->saveFile($path, $pid);
    }

    public function validateSettings($settings)
    {
        return $this->parent->validateSettings($settings);
    }

    /**
     * Return a value from the UI state config. Return null if key doesn't exist.
     * @param int/string $key key
     * @return mixed - value if exists, else return null
     */
    public function getUserSetting($key)
    {
        return $this->parent->getUserSetting($key);
    }

    /**
     * Save a value in the UI state config
     * @param int/string $key key
     * @param mixed $value value for key
     */
    public function setUserSetting($key, $value)
    {
        return $this->parent->setUserSetting($key, $value);
    }

    /**
     * Remove key-value from the UI state config
     * @param int/string $key key
     */
    public function removeUserSetting($key)
    {
        return $this->parent->removeUserSetting($key);
    }

    public function exitAfterHook()
    {
        return $this->parent->exitAfterHook();
    }

    public function redcap_module_link_check_display($project_id, $link)
    {
        return $this->parent->redcap_module_link_check_display($project_id, $link);
    }

    public function redcap_module_configure_button_display()
    {
        return $this->parent->redcap_module_configure_button_display();
    }

    public function getPublicSurveyUrl()
    {
        return $this->parent->getPublicSurveyUrl();
    }

    public function isSurveyPage()
    {
        return $this->parent->isSurveyPage();
    }

    public function initializeJavascriptModuleObject()
    {
        return $this->parent->initializeJavascriptModuleObject();
    }

    public function logAjax($data)
    {
        return $this->parent->logAjax($data);
    }

    public function queryLogs($sql)
    {
        return $this->parent->queryLogs($sql);
    }

    public function removeLogs($sql)
    {
        return $this->parent->removeLogs($sql);
    }

    public function getQueryLogsSql($sql)
    {
        return $this->parent->getQueryLogsSql($sql);
    }

    public function getProjectId()
    {
        return $this->parent->getProjectId();
    }

    public function setRecordId($recordId)
    {
        return $this->parent->setRecordId($recordId);
    }

    public function getRecordId()
    {
        return $this->parent->getRecordId();
    }

    public function getRecordIdOrTemporaryRecordId()
    {
        return $this->parent->getRecordIdOrTemporaryRecordId();
    }
}