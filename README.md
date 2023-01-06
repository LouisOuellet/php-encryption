![GitHub repo logo](/dist/img/logo.png)

# phpEncryption
![License](https://img.shields.io/github/license/LouisOuellet/php-encryption?style=for-the-badge)
![GitHub repo size](https://img.shields.io/github/repo-size/LouisOuellet/php-encryption?style=for-the-badge&logo=github)
![GitHub top language](https://img.shields.io/github/languages/top/LouisOuellet/php-encryption?style=for-the-badge)
![Version](https://img.shields.io/github/v/release/LouisOuellet/php-encryption?label=Version&style=for-the-badge)

## Features
 - openSSL Encryption

## Why you might need it
If you are looking for an easy way to start using Encryption. This PHP Class is for you.

## Can I use this?
Sure!

## License
This software is distributed under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.en.html) license. Please read [LICENSE](LICENSE) for information on the software availability and distribution.

## Requirements
PHP >= 5.6.0

## Security
Please disclose any vulnerabilities found responsibly – report security issues to the maintainers privately.

## Installation
Using Composer:
```sh
composer require laswitchtech/php-encryption
```

## How do I use it?

### Examples
#### Initiate
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();
```

#### Set your own PrivateKey
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();

//Set Initial Value
$PrivateKey = $phpEncryption->setPrivateKey("My Private Key");

//Output Initial Value
echo json_encode($PrivateKey, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Set your own PublicKey
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();

//Set Secret Value
$PublicKey = $phpEncryption->setPublicKey("My Public Key");

//Output Initial Value
echo json_encode($PublicKey, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Encrypt Data
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();

//Encrypt Data
$Data = $phpEncryption->encrypt("Hello Wolrd!");

//Output Encrypted Data
echo json_encode($Data, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Decrypt Data
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();

//Decrypt Data
$Data = $phpEncryption->decrypt($Data);

//Output Decrypted Data
echo json_encode($Data, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Encrypt File
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();

//Encrypt File
$File = $phpEncryption->encrypt('decrypted.txt', 'encrypted.txt');

//Output Encrypted File
echo json_encode($File, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Decrypt File
```php

//Import phpEncryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\phpEncryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new phpEncryption();

//Decrypt File
$File = $phpEncryption->decrypt('encrypted.txt', 'decrypted.txt');

//Output Decrypted File
echo json_encode($File, JSON_PRETTY_PRINT) . PHP_EOL;
```
