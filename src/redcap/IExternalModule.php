<?php

namespace redcapuzgent\rcmoddec\redcap;

interface IExternalModule
{
    function selectData($some, $params = array());

    function updateData($some, $params = array());

    function deleteData($some, $params = array());

    function updateUserPermissions($some, $params = array());

    function hasPermission($permissionName);

    function getConfig();

    function getModuleDirectoryName();

    public function prefixSettingKey($key);

    function setSystemSetting($key, $value);

    function getSystemSetting($key);

    /**
     * Gets all system settings as an array. Does not include project settings. Each setting
     * is formatted as: [ 'yourkey' => ['system_value' => 'foo', 'value' => 'bar'] ]
     *
     * @return array
     */
    function getSystemSettings();

    function removeSystemSetting($key);

    function setProjectSetting($key, $value, $pid = null);

    function getProjectSetting($key, $pid = null);

    /**
     * Gets all project and system settings as an array.  Useful for cases when you may
     * be creating a custom config page for the external module in a project. Each setting
     * is formatted as: [ 'yourkey' => ['system_value' => 'foo', 'value' => 'bar'] ]
     *
     * @param int|null $pid
     * @return array containing status and settings
     */
    function getProjectSettings($pid = null);

    /**
     * Saves all project settings (to be used with getProjectSettings).  Useful
     * for cases when you may create a custom config page or need to overwrite all
     * project settings for an external module.
     * @param array $settings Array of all project-specific settings
     * @param int|null $pid
     */
    function setProjectSettings($settings, $pid = null);

    function removeProjectSetting($key, $pid = null);

    function getSubSettings($key, $pid = null);

    function getSettingConfig($key);

    function getUrl($path, $noAuth = false, $useApiEndpoint = false);

    public function getModulePath();

    public function getModuleName();

    public function resetSurveyAndGetCodes($projectId, $recordId, $surveyFormName = "", $eventId = "");

    public function generateUniqueRandomSurveyHash();

    public function getProjectAndRecordFromHashes($surveyHash, $returnCode);

    public function createPassthruForm($projectId, $recordId, $surveyFormName = "", $eventId = "");

    public function getValidFormEventId($formName, $projectId);

    public function getSurveyId($projectId, $surveyFormName = "");

    public function getParticipantAndResponseId($surveyId, $recordId, $eventId = "");

    public function getProjectDetails($projectId);

    public function getMetadata($projectId, $forms = NULL);

    public function getData($projectId, $recordId, $eventId = "", $format = "array");

    public function saveData($projectId, $recordId, $eventId, $data);

    /**
     * @param $projectId
     * @param $recordId
     * @param $eventId
     * @param $formName
     * @param $data array This must be in [instance => [field => value]] format
     * @return array
     */
    public function saveInstanceData($projectId, $recordId, $eventId, $formName, $data);

    public function requireProjectId($pid = null);

    public function delayModuleExecution();

    public function sendAdminEmail($subject, $message);

    /**
     * Function that returns the label name from checkboxes, radio buttons, etc instead of the value
     * @param $params , associative array
     * @param null $value , (to support the old version)
     * @param null $pid , (to support the old version)
     * @return mixed|string, label
     */
    public function getChoiceLabel($params, $value = null, $pid = null);

    public function getChoiceLabels($fieldName, $pid = null);

    public function getFieldLabel($fieldName);

    public function query($sql);

    public function createDAG($dagName);

    public function deleteDAG($dagId);

    public function renameDAG($dagId, $dagName);

    public function setDAG($record, $dagId);

    public function setData($record, $fieldName, $values);

    public function areSettingPermissionsUserBased();

    public function disableUserBasedSettingPermissions();

    public function addAutoNumberedRecord($pid = null);

    public function getFirstEventId($pid = null);

    public function saveFile($path, $pid = null);

    public function validateSettings($settings);

    /**
     * Return a value from the UI state config. Return null if key doesn't exist.
     * @param int/string $key key
     * @return mixed - value if exists, else return null
     */
    public function getUserSetting($key);

    /**
     * Save a value in the UI state config
     * @param int/string $key key
     * @param mixed $value value for key
     */
    public function setUserSetting($key, $value);

    /**
     * Remove key-value from the UI state config
     * @param int/string $key key
     */
    public function removeUserSetting($key);

    public function exitAfterHook();

    public function redcap_module_link_check_display($project_id, $link);

    public function redcap_module_configure_button_display();

    public function getPublicSurveyUrl();

    public function isSurveyPage();

    public function initializeJavascriptModuleObject();

    public function logAjax($data);

    public function queryLogs($sql);

    public function removeLogs($sql);

    public function getQueryLogsSql($sql);

    public function getProjectId();

    public function setRecordId($recordId);

    public function getRecordId();

    public function getRecordIdOrTemporaryRecordId();
}