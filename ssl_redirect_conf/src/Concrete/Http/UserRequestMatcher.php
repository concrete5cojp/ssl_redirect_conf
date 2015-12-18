<?php
namespace Concrete\Package\SslRedirectConf\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use User;
use Package;

class UserRequestMatcher implements RequestMatcherInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function matches(Request $request)
    {
        $pkg = Package::getByHandle('ssl_redirect_conf');
        $signin = $pkg->getFileConfig()->get('https.signin');
        if ($signin && User::isLoggedIn()) {
            return true;
        }

        return false;
    }
}
