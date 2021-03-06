<?php

namespace Bolt\Configuration;

use Symfony\Component\HttpFoundation\Request;

/**
 * Configuration for a Bolt application Composer install.
 *
 * @author Ross Riley <riley.ross@gmail.com>
 */
class Composer extends Standard
{
    /**
     * Constructor initialises on the app root path.
     *
     * @param string  $path
     * @param Request $request
     */
    public function __construct($path, Request $request = null)
    {
        parent::__construct($path, $request);
        $this->setPath('composer', realpath(dirname(__DIR__) . '/../'));
        $this->setPath('app', realpath(dirname(__DIR__) . '/../app/'));
        $this->setPath('view', realpath(dirname(__DIR__) . '/../app/view'));
        $this->setUrl('app', '/bolt-public/');
    }

    public function getVerifier()
    {
        if (! $this->verifier) {
            $this->verifier = new ComposerChecks($this);
        }

        return $this->verifier;
    }
}
