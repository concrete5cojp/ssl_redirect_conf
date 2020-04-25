<?php defined('C5_EXECUTE') or die("Access Denied.");?>

<form action="<?php echo $this->action('update_config')?>" method="post">
    
    <?php echo $this->controller->token->output('update_config')?>
    <fieldset>
        <legend><?php echo t('Enable SSL Redirect for registered users'); ?></legend>
        <div class="checkbox">
            <label>
                <?php echo $form->checkbox('signin', 1, $signin); ?>
                <?php echo t('Redirect all pages to https after log-in.'); ?>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo t('URL Rules'); ?></legend>
        <p id="pathsDescriptionBlock" class="help-block"><?php echo t('The following rule will be effective for all site visitors.'); ?></p>
        <div class="form-group">
            <?php echo $form->label('paths', t('Paths')); ?>
            <?php echo $form->textarea('paths', $paths, array('rows' => 10, 'aria-describedby' => 'pathsHelpBlock')); ?>
            <p id="pathsHelpBlock" class="help-block">
                <?php echo t('Enter URL path one per line. You can use wildcard character (*).'); ?><br />
                <?php echo t('Once you saved the path, it starts to redirect immediately.'); ?></p>
        </div>
    </fieldset>
    <div class="alert alert-warning" role="alert">
        <?php echo t('NOTE: Make sure have the same domain and host name for both http and https. If you configured the different host name for http and https, you may become impossible to login to dashboard. If you become unable to log-in, edit the configuration file saved on the server directly.') ?>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo t('About Configuration File') ?></div>
        <div class="panel-body">
            <p><?php echo t('When you save the configuration from this page, concrete5 will generate the following config file') ?></p>
            <p><code>/application/config/generated_overrides/ssl_redirect_conf/https.php</code></p>
            <p><?php echo t('OR you could easily override the setting by creating the following PHP file. By creating the following file, you will not be able to change any setting from this page.') ?></p>
            <p><code>/application/config/ssl_redirect_conf/https.php</code></p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo t('Common Mistake') ?></div>
        <div class="panel-body">
            <p><?php echo t('If you have a specific page that you want to enable SSL, make sure to add the wild card to that URL. <br />
<br />
For example, if you want to enable the SSL redirect to the following concrete5 page,
') ?></p>
            <p><code>http://example.com/contact/form/</code></p>
            <p><?php echo t('Make sure to add the following <strong>2 paths</strong> to the configuration.') ?></p>
            <p><code>/contact/form<br />
                /contact/form/*
            </code></p>
        </div>
    </div>
    <div class="ccm-dashboard-form-actions-wrapper">
    <div class="ccm-dashboard-form-actions">
        <button class="pull-right btn btn-success" type="submit" ><?php echo t('Save')?></button>
    </div>
    </div>
    
</form>
