<?php defined('C5_EXECUTE') or die("Access Denied.");?>

<form action="<?php echo $this->action('update_config')?>" method="post">
    
    <?php echo $this->controller->token->output('update_config')?>
    <fieldset>
        <legend><?php echo t('Enable SSL Redirect'); ?></legend>
        <div class="checkbox">
            <label>
                <?php echo $form->checkbox('signin', 1, $signin); ?>
                <?php echo t('Redirect all users to https for the pages that match(es) to the following URL rule(s)'); ?>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo t('URL Rules'); ?></legend>
        <div class="form-group">
            <?php echo $form->label('paths', t('Paths')); ?>
            <?php echo $form->textarea('paths', $paths, array('rows' => 10, 'aria-describedby' => 'pathsHelpBlock')); ?>
            <p id="pathsHelpBlock" class="help-block"><?php echo t('Enter URL path one per line. You can use wildcard character (*).'); ?></p>
        </div>
    </fieldset>
    <div class="alert alert-warning" role="alert">
        <?php echo t('NOTE: If you configured different hosts to Canonical URL and SSL URL, you may become impossible to login to dashboard.') ?>
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
    <div class="ccm-dashboard-form-actions-wrapper">
    <div class="ccm-dashboard-form-actions">
        <button class="pull-right btn btn-success" type="submit" ><?php echo t('Save')?></button>
    </div>
    </div>
    
</form>
