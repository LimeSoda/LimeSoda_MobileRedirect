LimeSoda_MobileRedirect
=======================
Redirects mobile users to a store view you specify.

Facts
-----
- version: 1.0.0
- extension key: LimeSoda_MobileRedirect
- [extension on GitHub](https://github.com/LimeSoda/LimeSoda_MobileRedirect)

Usage
-----------
Install the extension and navigate to `System > Configuration > General > Web > Redirect mobile users`. You can
deactivate redirections on the store view level.

To configure a redirect switch to the store view configuration level using the "Currenct Configuration Scope"
dropdown on the top left. A new option `Redirect to Store` will be displayed. Select a store view to or set
`No redirect` to unset a redirect. 

### How is a mobile browser detected?

We do use the user agents provided by [detectmobilebrowsers.com](http://detectmobilebrowsers.com/).
If the user agent matches one of the regular expressions the browser will be treated as mobile. The expressions
should cover both mobile phones and tablets.

Additionally we check if the content type `application/vnd.wap.xhtml+xml` is accepted or one of the headers
`HTTP_X_WAP_PROFILE` and `HTTP_PROFILE` is set.

### Avoiding infinite loops

As of now there is no automatic detection to avoid infinite loops. If you want to contribute that: great! :-)

Until thenk think through your setup to not create store views which redirect to each other. The only check that
is implemented is that the store view doesn't redirect to itself.

### Creating "desktop version" / "mobile version" links

You will want to offer your visitors a link which forces a desktop or mobile version to letting the visitors decide
which version they use.

You do so by adding `force_storeview_selection=1` to a link. This will create a session cookie with the same name.
As long as the cookie is set to 1 no automatic redirect will happen.

Requirements
------------
- PHP >= 5.2.0
- Mage_Core
- ...

Compatibility
-------------
- Magento CE >= 1.7 (only tested in CE 1.7, may work in newer versions)

Installation Instructions
-------------------------
1. Install the extension via modman.

Uninstallation
--------------
1. Install like any other modman extension.

Support
-------
If you have any issues with this extension, open an issue on
[GitHub](https://github.com/LimeSoda/LimeSoda_MobileRedirect/issues).

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Matthias Zeis  
[http://www.matthias-zeis.com](http://www.matthias-zeis.com)
[http://www.limesoda.com](http://www.limesoda.com)
[@mzeis](https://twitter.com/mzeis)

License
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2014 LimeSoda Interactive Marketing GmbH
