# A Magento module for requiring user authentication in frontend

![Magento Require Login](http://i.imgur.com/A9yU4SN.png)

## Installation

### Magento CE 1.6.x, 1.7.x

Install with [modgit](https://github.com/jreinke/modgit):

    $ cd /path/to/magento
    $ modgit init
    $ modgit clone require-login https://github.com/jreinke/magento-require-login.git

or download package manually:

* Download latest version [here](https://github.com/jreinke/magento-require-login/archive/master.zip)
* Unzip in Magento root folder
* Clear cache

Full overview available [here](http://www.bubblecode.net/en/2012/05/15/a-magento-module-to-require-login-on-your-store/).

## Configure

Browse to System > Configuration > Bubble RequireLogin  enable "Require login" and edit the default [regular expression](http://php.net/manual/en/reference.pcre.pattern.syntax.php).

Do not forget to include your IPN urls otherwhise payment transaction cannot be completed. The following is valid for paypal 

```
#(customer\/account\/(log(in|out)|forgotpassword|resetpassword|create))|(paypal/\ipn\/)#
```
