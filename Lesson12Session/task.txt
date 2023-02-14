1.1
Pradedame naują, tuščią projektą su index.php
Projektas testuojamas per web serverį (localhost:8080)

Sukurkite sesijos kintamąjį visit_counter. Kintamasis talpina šios svetainės aplankymų skaičių.
Pradinė kintamojo reikšmė = 0
Kiekvieną kart, vykdant kodą, kintamojo reikšmė padidinama vienetu

1.2
Išbandykite programą su antru web naršyklės langu. Savo naršyklėje atidarykite privataus naršymo langą, pvz.:
- Chrome - Incognito
- Safari, Firefox - Private Window
- Edge - InPrivate

Išbandykite perkraudami puslapį abiejuose languose.

Privataus naršymo langai pradeda laikiną sesiją, tad programa jus mato kaip naują naudotoją.
Tą patį galite pastebėti ir visose kitose interneto svetainėse (esate neprijungti prie Google, Facebook, kitų paskyrų.)

1.3
Sukurkite naują sesijos kintamąjį visit_history.
Jame laikomas visų aplankytų svetainės adresų sąrašas (naudokite $_SERVER['REQUEST_URI'])
Sąrašą visuomet atvaizduokite programos išvestyje.
Išbandykite programą aplankydami skirtingus adresus (/test, /test2, /news, t.t.).

Užduotis gali neveikti jeigu nesukonfigūruotas visų adresų nukreipimas į index.php failą

1.4 - extra
Pridėkite sesijos išvalymo mygtuką (HTML <form>, <button>, PHP $_POST, t.t.)