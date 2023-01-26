<?php

declare(strict_types=1);

class PasswordValidator
{
    protected string $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function passwordLength()
    {
        if (strlen($this->password) >= 10) {
            $this->specialSymbols();
        } else {
            throw new Exception('Password must be at least 10 symbols long');
        }
    }

    public function specialSymbols()
    {
        if (preg_match_all('/[$&+,:;=?@#|\'<>.-^*()%!]/', $this->password) >= 2) {
            $this->passwordLetters();
        } else {
            throw new Exception('Password must include at least 2 special symbols');
        }
    }

    public function passwordLetters()
    {
        if ((preg_match_all('/[a-z]/', $this->password) >= 1) && (preg_match_all('/[A-Z]/', $this->password) >= 1)) {
            $this->passwordNumbers();
        } else {
            throw new Exception('Password must include at least 1 Capital and 1 lower cap letter');
        }
    }

    public function passwordNumbers()
    {
        if (preg_match_all('/[0-9]/', $this->password) >= 1) {
            echo 'Password is valid' . PHP_EOL;
        } else {
            throw new Exception('Password must include at least 1 number');
        }
    }
}

try {
    $password = new PasswordValidator($argv[1]);
    $password->passwordLength();
    return ;
} catch (Exception $exception){
//    echo 'Validation error: ' . $exception->getMessage(); //1.1 part
    file_put_contents('./errors.txt', 'Validation error: ' . $exception->getMessage() . PHP_EOL, FILE_APPEND);
} finally {
    file_get_contents('./errors.txt');
}





/*
1.1 Parašykite įrankį slaptažodžio stiprumui nustatyti.
Slaptažodis turi:
- būti sudarytas iš ne mažiau 10 simblių
- turi turėti bent 2 skirtingus specialiuosius simbolius (!@#$%^&*_)
- turi turėti ir mažųjų, ir didžiųjų raidžių (aB)
- turi turėti bent vieną skaitmenį (0-9)
Slaptažodžio validavimas turi vykti klasėje PasswordValidator.
Validatorius, atradęs taisyklės pažeidimą, turi mesti exception'ą su žinute (pvz.: "Password must be at least ten symbols long")
Kodas, kviečiantis validatorių turi gaudyti exception'ą ir spausdinti žinutę terminale.
Jeigu slaptažodis atitinka reikalavimus, spausdinkite "Password is valid"
Failo kvietimo pavyzdys:
php -f 1_password_validator.php 123456
Password must be at least 10 symbols long
php -f 1_password_validator.php 123456aBc!@
Password is valid
1.2 Patobulinkite validatoriu. Validatorius turi sukaupti visas klaidas ir jas išspausdinti.
Failo kvietimo pavyzdys:
php -f 1_password_validator.php 123456
Password must be at least 10 symbols long
Password must contain at least 2 special symbols (!@#$%^&*_)
Password must contain uppercase and lowercase letters
*/