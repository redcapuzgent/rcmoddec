<?php

namespace redcapuzgent\rcmoddec\api;

use redcapuzgent\rcmoddec\redcap\AbstractExternalModuleDecorator;
use redcapuzgent\rcmoddec\redcap\IExternalModule;

class TokenDecorator extends AbstractExternalModuleDecorator implements IExternalModule
{
    /**
     * Get Token for user. Requires a projectid (pid GET parameter) to be available, otherwise null is returned.
     * @param string $username The username
     * @return string | null
     */
    public function getTokenForUserInCurrentProject($username): ?string
    {
        $escapedUsername = db_real_escape_string($username);
        if(!is_null($this->getProjectId())){
            $tokenResult = $this->query(
                "select r.api_token 
                    from redcap_user_rights r 
                    where r.username='$escapedUsername' and r.project_id = ".$this->getProjectId().";");
            $queryResult = mysqli_fetch_assoc($tokenResult);
            if ($queryResult !== null) {
                return $queryResult["api_token"];
            }
        }
        return null;
    }
}