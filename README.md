# Add-on SSL Redirect Configuration

Redirect users to https URL with simple rules configuration on your concrete5 site.

## Instruction

1. Upload `ssl_redirect_conf` folder onto your concrete5's `packages` folder
1. Login as administrator
1. Go to `Dashboard` - `Extend concrete5`
1. Click `Install` SSL Redirect Configuration
1. Go to `Dashboard` - `System and Settings` - `Environment`
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


## In case of emergency

If you happened to make some mistake, you can disable SSL Redirect Conf by setting in `\application\config\concrete.php`

```
    'seo'               => array(
        'ssl_redirect_conf'           => false,
    ),

```
