<?php
/**
 * OCLC-Auth
 * Copyright 2013 OCLC
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * @package OCLC/Auth
 * @copyright Copyright (c) 2013 OCLC
 * @license http://www.opensource.org/licenses/Apache-2.0
 * @author Karen A. Coombs <coombsk@oclc.org>
*/

/**
 * A class that represents an OCLC User.
 * The User has principalID, principalIDNS, and institution
 *
 *         See the OCLC/Auth documentation for examples.
 */

namespace OCLC;

/**
 * A class that represents an OCLC User.
 * The User has principalID, principalIDNS, and institution
 * @author Karen A. Coombs <coombsk@oclc.org>
 *
 *         See the OCLC/Auth documentation for examples.
 */

class User
{
	/**
	 * principal ID
	 * @var string
	 */
    private $principalID = null;
    
    /**
     * principal identity namespace
     * @var string
     */
    private $principalIDNS = null;
    
    /**
     * Authenticating institution id
     * @var integer
     */
    private $authenticatingInstitutionID = null;

    /**
     * Construct a new user object to pass to the WSKey object when building an HMAC signature of using client credentials grant
     * 
     * @param integer $authenticatingInstitutionID
     * @param string $principalID
     * @param string $principalIDNS
     * @throws \BadMethodCallException
     */
    public function __construct($authenticatingInstitutionID, $principalID = null, $principalIDNS = null)
    {
        if (empty($authenticatingInstitutionID)) {
            Throw new \BadMethodCallException('You must set a valid authenticating institution ID');
        } elseif (empty($principalID) || empty($principalIDNS)) {
            throw new \BadMethodCallException('You must set a principalID and principalIDNS');
        }
        
        $this->authenticatingInstitutionID = $authenticatingInstitutionID;
        if (! empty($principalID)) {
            $this->principalID = $principalID;
        }
        if (! empty($principalIDNS)) {
            $this->principalIDNS = $principalIDNS;
        }
    }

    /**
     * Getter for the principalID
     * @return string
     */
    public function getPrincipalID()
    {
        return $this->principalID;
    }

    /**
     * Getter for the principalID
     * @return string
     */
    public function getPrincipalIDNS()
    {
        return $this->principalIDNS;
    }

    /**
     * Getter for the authenticatingInstitutionID
     * @return integer
     */
    public function getAuthenticatingInstitutionID()
    {
        return $this->authenticatingInstitutionID;
    }
}
