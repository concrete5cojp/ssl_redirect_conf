# Add-on SSL Redirect Configuration

Redirect users to https URL with simple rules configuration on your concrete5 site.

## Instruction

1. Upload `ssl_redirect_conf` folder onto your concrete5's `packages` folder
1. Login as administrator
1. Go to `Dashboard` - `Extend concrete5`
1. Click `Install` SSL Redirect Configuration
1. Go to `Dashboard` - `System and Settings` - `Environment` - `SSL Redirection`
1. Enter the URL rule how you want to enable SSL direct for
1. Click save

## Example URL rule

```
/login
/login/*
/dashboard
/dashboard/*
/contact
/contact/*
```

If you would like to set all page in SSL, simply enter

```
*
```

Then, your entire concrete5 site will be redirected to SSL.

## Configuration File

When you set up the URL rules from Dashboard, concrete5 will generate the following config file

`/application/config/generated_overrides/ssl_redirect_conf/https.php`

OR you could easily override the setting by creating the following PHP file. **By creating the following file, you will not be able to change any setting from the dashboard.**

`/application/config/ssl_redirect_conf/https.php`



### PHP Configuration File Format

This is the example of configuration file.

If you made some mistake on your server, and you wanted to disable the SSL Redirect, simply change the `signin` from `1` to `0` and delete all the URL rules on the configuration file.


```
<?php

/**
 * -----------------------------------------------------------------------------
 * @item      paths
 * @group     https
 * @namespace ssl_redirect_conf
 * -----------------------------------------------------------------------------
 */
return array(
    'signin' => '1',
    'paths' => array(
        '/login',
        '/login/*',
        '/dashboard/',
        '/dashboard/*',
        '/contact/',
        '/contact/*',
    ),
);

```

### Common Mistake

If you have a specific page that you want to enable SSL, make sure to add the wild card to that URL.

For example, if you want to enable the SSL redirect to the following concrete5 page,

`http://example.com/contact/form/`

Make sure to add the following **2 paths** to the configuration.

```
/contact/form
/contact/form/*
```




## Credits

- @hissy (lead)
- @katzueno (English documentation)
- @pictron (debug)

## License

MIT
