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
        if (strlen($this->password) < 10) {
            throw new Exception('Password must be at least 10 symbols long');
        }
    }

    public function specialSymbols()
    {
        if (preg_match_all('/[$&+,:;=?@#|\'<>.-^*()%!]/', $this->password) < 2) {
            throw new Exception('Password must include at least 2 special symbols');
        }
    }

    public function passwordLetters()
    {
        if ((preg_match_all('/[a-z]/', $this->password) < 1) && (preg_match_all('/[A-Z]/', $this->password) < 1)) {
            throw new Exception('Password must include at least 1 Capital and 1 lower cap letter');
        }
    }

    public function passwordNumbers()
    {
        if (preg_match_all('/[0-9]/', $this->password) < 1) {
            throw new Exception('Password must include at least 1 number');
        }
    }
}

//1.1

//try {
//    $password = new PasswordValidator($argv[1]);
//    $password->passwordLength();
//    $password->specialSymbols();
//    $password->passwordLetters();
//    $password->passwordNumbers();
//    echo 'Password is valid' . PHP_EOL;
//} catch (Exception $exception){
//    echo 'Validation error: ' . $exception->getMessage();
//}


//1.2
try {
    $password = new PasswordValidator($argv[1]);
    $password->passwordLength();
    return 'Length is valid';
} catch (Exception $exception){
    file_put_contents('./errors.txt', 'Validation error: ' . $exception->getMessage() . PHP_EOL, FILE_APPEND);
}

try {
    $password->specialSymbols();
    return 'Symbols are valid';
} catch (Exception $exception){
    file_put_contents('./errors.txt', 'Validation error: ' . $exception->getMessage() . PHP_EOL, FILE_APPEND);
}

try {
    $password->passwordLetters();
    return 'Letters are valid';
} catch (Exception $exception){
    file_put_contents('./errors.txt', 'Validation error: ' . $exception->getMessage() . PHP_EOL, FILE_APPEND);
}

try {
    $password->passwordNumbers();
    return 'Numbers are valid';
} catch (Exception $exception){
    file_put_contents('./errors.txt', 'Validation error: ' . $exception->getMessage() . PHP_EOL, FILE_APPEND);
} finally {
    echo file_get_contents('./errors.txt');
}

/*
1.1 Para??ykite ??rank?? slapta??od??io stiprumui nustatyti.
Slapta??odis turi:
- b??ti sudarytas i?? ne ma??iau 10 simbli??
- turi tur??ti bent 2 skirtingus specialiuosius simbolius (!@#$%^&*_)
- turi tur??ti ir ma????j??, ir did??i??j?? raid??i?? (aB)
- turi tur??ti bent vien?? skaitmen?? (0-9)
Slapta??od??io validavimas turi vykti klas??je PasswordValidator.
Validatorius, atrad??s taisykl??s pa??eidim??, turi mesti exception'?? su ??inute (pvz.: "Password must be at least ten symbols long")
Kodas, kvie??iantis validatori?? turi gaudyti exception'?? ir spausdinti ??inut?? terminale.
Jeigu slapta??odis atitinka reikalavimus, spausdinkite "Password is valid"
Failo kvietimo pavyzdys:
php -f 1_password_validator.php 123456
Password must be at least 10 symbols long
php -f 1_password_validator.php 123456aBc!@
Password is valid
1.2 Patobulinkite validatoriu. Validatorius turi sukaupti visas klaidas ir jas i??spausdinti.
Failo kvietimo pavyzdys:
php -f 1_password_validator.php 123456
Password must be at least 10 symbols long
Password must contain at least 2 special symbols (!@#$%^&*_)
Password must contain uppercase and lowercase letters
*/