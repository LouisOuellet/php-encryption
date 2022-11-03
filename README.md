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

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();
```

#### Set your own Initial Value
```php

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();

//Set Initial Value
$InitialValue = $phpEncryption->setInitialValue("My Initial Value");

//Output Initial Value
echo json_encode($InitialValue, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Set your own Secret
```php

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();

//Set Secret Value
$Secret = $phpEncryption->setSecret("My Secret");

//Output Initial Value
echo json_encode($Secret, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Encrypt Data
```php

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();

//Encrypt Data
$Data = $phpEncryption->encrypt("Hello Wolrd!");

//Output Encrypted Data
echo json_encode($Data, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Decrypt Data
```php

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();

//Decrypt Data
$Data = $phpEncryption->decrypt($Data);

//Output Decrypted Data
echo json_encode($Data, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Encrypt File
```php

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();

//Encrypt File
$File = $phpEncryption->encrypt('decrypted.txt', 'encrypted.txt');

//Output Encrypted File
echo json_encode($File, JSON_PRETTY_PRINT) . PHP_EOL;
```

#### Decrypt File
```php

//Import Encryption class into the global namespace
//These must be at the top of your script, not inside a function
use LaswitchTech\phpEncryption\Encryption;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Initiate Class Encryption
$phpEncryption = new Encryption();

//Decrypt File
$File = $phpEncryption->decrypt('encrypted.txt', 'decrypted.txt');

//Output Decrypted File
echo json_encode($File, JSON_PRETTY_PRINT) . PHP_EOL;
```
