<?php defined('C5_EXECUTE') or die("Access Denied.");?>

<form action="<?php echo $this->action('update_config')?>" method="post">
    
    <?php echo $this->controller->token->output('update_config')?>
    <fieldset>
        <legend><?php echo t('User status'); ?></legend>
        <div class="checkbox">
            <label>
                <?php echo $form->checkbox('signin', 1, $signin); ?>
                <?php echo t('Redirect registered users to https url.'); ?>
            </label>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo t('URL rules'); ?></legend>
        <div class="form-group">
            <?php echo $form->label('paths', t('Paths')); ?>
            <?php echo $form->textarea('paths', $paths, array('rows' => 10, 'aria-describedby' => 'pathsHelpBlock')); ?>
            <p id="pathsHelpBlock" class="help-block"><?php echo t('Enter URL paths one per line. You can use wildcard character (*).'); ?></p>
        </div>
    </fieldset>
    <div class="ccm-dashboard-form-actions-wrapper">
    <div class="ccm-dashboard-form-actions">
        <button class="pull-right btn btn-success" type="submit" ><?php echo t('Save')?></button>
    </div>
    </div>
    
</form>
