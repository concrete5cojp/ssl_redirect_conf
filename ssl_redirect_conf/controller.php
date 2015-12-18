<?php
namespace Concrete\Package\SslRedirectConf;

use Events;
use Concrete\Core\Backup\ContentImporter;
use Concrete\Core\Routing\RedirectResponse;
use Concrete\Core\Url\Url;
use Concrete\Package\SslRedirectConf\Http\UserRequestMatcher;
use Concrete\Package\SslRedirectConf\Http\PathRequestMatcher;

class Controller extends \Concrete\Core\Package\Package
{
    protected $pkgHandle = 'ssl_redirect_conf';
    protected $appVersionRequired = '5.7.5';
    protected $pkgVersion = '0.1';
    protected $pkgAutoloaderMapCoreExtensions = true;

    public function getPackageName()
    {
        return t('SSL Redirect Configuration');
    }

    public function getPackageDescription()
    {
        return t('Redirect users to https URL with simple rules configuration.');
    }

    public function install()
    {
        $pkg = parent::install();
        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/config/dashboard.xml');
    }

    public function on_start()
    {
        Events::addListener('on_page_view', function ($event) {
            $request = $event->getRequest();
            $url = Url::createFromUrl($request->getUri());
            $isSSL = false;

            $pathMatcher = new PathRequestMatcher();
            if ($pathMatcher->matches($request)) {
                $isSSL = true;
            }
            if (!$pathMatcher->matches($request)) {
                $isSSL = false;
            }

            $userMatcher = new UserRequestMatcher();
            if ($userMatcher->matches($request)) {
                $isSSL = true;
            }
            if (!$userMatcher->matches($request) && $isSSL === false) {
                $isSSL = false;
            }

            if ($isSSL === true && $request->getScheme() == 'http') {
                $url->setScheme('https');
                $response = new RedirectResponse($url);
            } elseif ($isSSL === false && $request->getScheme() == 'https') {
                $url->setScheme('http');
                $response = new RedirectResponse($url);
            }

            if (isset($response)) {
                $response->send();
                exit;
            }
        });
    }
}
