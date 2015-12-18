<?php
namespace Concrete\Package\SslRedirectConf\Http;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;
use Package;

class PathRequestMatcher implements RequestMatcherInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     */
    public function matches(Request $request)
    {
        $pkg = Package::getByHandle('ssl_redirect_conf');
        $paths = $pkg->getFileConfig()->get('https.paths');
        
        foreach ($paths as $path) {
            if ($request->matches($path)) {
                return true;
            }
        }

        return false;
    }
}
