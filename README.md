Unifi API Client
================

Unifi API Client can be used to connect to the API of your [Ubiquiti Unifi Controller](https://www.ubnt.com/enterprise/software/).
This client is build on top of [Guzzle](http://guzzlephp.org/).

The code is tested against Unifi Controller version 4.6.6.

Installation
------------

The API client can be installed with [Composer](https://getcomposer.org/):

    composer require jorisvandesande/unifi-api-client

Or you can download the latest release at:
 https://github.com/jorisvandesande/unifi-api-client/releases


Usage
-----

```php
use JVDS\UnifiApiClient\Client;
use GuzzleHttp\Client as HttpClient;

$apiClient = new Client(new HttpClient(['base_uri' => 'https://127.0.0.1:8443']));
$apiClient->login('your_username', 'your_password');

// call supported methods via methods on the client
$apiClient->statistics('default');

// or call any API url via the get and post methods:
$apiClient->get('/api/self');
$apiClient->post('/api/s/default/cmd/stamgr', ['cmd' => 'block-sta', 'mac' => '01:01:01:01:01:01']);

// logout
$apiClient->logout();
```

Examples can be found in the [examples](examples) directory. To run the examples, you must
copy the config.example.php file to config.php and change the configuration to your needs.

Supported API calls
-------------------

At the moment only a few API methods are implemented in the Client. Altough it is possible to use
the ```get()``` and ```post()``` methods of the Client to call any API url, the goal is to
support more methods.

License
-------

MIT Licensed, see the [LICENSE](LICENSE) file.