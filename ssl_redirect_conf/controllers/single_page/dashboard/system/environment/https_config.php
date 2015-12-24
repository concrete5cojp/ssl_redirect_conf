<?php
namespace Concrete\Package\SslRedirectConf\Controller\SinglePage\Dashboard\System\Environment;

use Package;

class HttpsConfig extends \Concrete\Core\Page\Controller\DashboardPageController
{
    public function view()
    {
        $pkg = Package::getByHandle('ssl_redirect_conf');
        $signin = $pkg->getFileConfig()->get('https.signin');
        $paths = $pkg->getFileConfig()->get('https.paths');
        if ($paths) {
            $paths = implode("\n", $paths);
        }

        $this->set('signin', $signin);
        $this->set('paths', $paths);
        $this->set('pageTitle', t('SSL Redirect Configuration'));
    }
    
    public function update_config()
    {
        if ($this->token->validate("update_config")) {
            if ($this->isPost()) {
                $pkg = Package::getByHandle('ssl_redirect_conf');
                $pkg->getFileConfig()->save('https.signin', $this->post('signin'));
                $paths = explode(PHP_EOL, $this->post('paths'));
                if (is_array($paths)) {
                    foreach ($paths as $i => $path) {
                        $paths[$i] = trim($path);
                    }
                    $pkg->getFileConfig()->save('https.paths', $paths);
                }
                $this->redirect('/dashboard/system/environment/https_config', 'config_saved');
            }
        } else {
            $this->set('error', array($this->token->getErrorMessage()));
        }
    }

    public function config_saved()
    {
        $this->set('message', t('SSL configuration saved.'));
        $this->view();
    }
}
