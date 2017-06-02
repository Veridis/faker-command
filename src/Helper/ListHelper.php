<?php

namespace Helper;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class ListHelper
{
    public static $formatters = [
        ['Address'],
        ['Base'],
        ['Biased'],
        ['Barcode'],
        ['Color'],
        ['Company'],
        ['DateTime'],
        ['File'],
        ['Html'],
        ['Image'],
        ['Internet'],
        ['Lorem'],
        ['Miscellaneous'],
        ['Person'],
        ['Payment'],
        ['PhoneNumber'],
        ['Text'],
        ['UserAgent'],
        ['Uuid'],
    ];

    /**
     * @param $formatter
     * @param OutputInterface $output
     *
     * @return Table
     */
    public static function listGenerators($formatter, OutputInterface $output)
    {
        if (!in_array([$formatter], self::$formatters)) {
            throw new InvalidArgumentException('Invalid formatter. List all formatters with --list option');
        }

        $table = new Table($output);
        $table->setHeaders(['Methods', 'Examples']);
        switch (strtolower($formatter)) {
            case 'address':
                $table->setRows(self::address());
                break;
            case 'base':
                $table->setRows(self::base());
                break;
            case 'biased':
                $table->setRows(self::biased());
                break;
            case 'barcode':
                $table->setRows(self::barcode());
                break;
            case 'color':
                $table->setRows(self::color());
                break;
            case 'company':
                $table->setRows(self::company());
                break;
            case 'datetime':
                $table->setRows(self::datetime());
                break;
            case 'file':
                $table->setRows(self::file());
                break;
            case 'html':
                $table->setRows(self::html());
                break;
            case 'image':
                $table->setRows(self::image());
                break;
            case 'internet':
                $table->setRows(self::internet());
                break;
            case 'lorem':
                $table->setRows(self::lorem());
                break;
            case 'miscellaneous':
                $table->setRows(self::miscellaneous());
                break;
            case 'person':
                $table->setRows(self::person());
                break;
            case 'payment':
                $table->setRows(self::payment());
                break;
            case 'phonenumber':
                $table->setRows(self::phoneNumber());
                break;
            case 'text':
                $table->setRows(self::text());
                break;
            case 'useragent':
                $table->setRows(self::userAgent());
                break;
            case 'uuid':
                $table->setRows(self::uuid());
                break;
        }

        return $table;
    }

    private static function address()
    {
        return [
            ['cityPrefix', 'Lake'],
            ['secondaryAddress', 'Suite 961'],
            ['state', 'NewMexico'],
            ['stateAbbr', 'OH'],
            ['citySuffix', 'borough'],
            ['streetSuffix', 'Keys'],
            ['buildingNumber', '484'],
            ['city', 'West Judge'],
            ['streetName', 'Keegan Trail'],
            ['streetAddress', '439 Karley Loaf Suite 897'],
            ['postcode', '17916'],
            ['address', '8888 Cummings Vista Apt. 101, Susanbury, NY 95473'],
            ['country', 'Falkland Islands (Malvinas)'],
            ['latitude($min = -90, $max = 90)', '77.147489'],
            ['longitude($min = -180, $max = 180)', '86.211205'],
        ];
    }

    private static function base()
    {
        return [
            ['randomDigit', '7'],
            ['randomDigitNotNull', '5'],
            ['randomNumber($nbDigits = NULL, $strict = false) ', '79907610'],
            ['randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL)', '48.8932'],
            ['numberBetween($min = 1000, $max = 9000)', '8567'],
            ['randomLetter', 'b'],
            ['randomElements($array = array (\'a\',\'b\'), $count = 1)', 'array(\'b\')'],
            ['randomElement($array = array (\'a\',\'b\')', 'b'],
            ['shuffle(\'hello, world\')', 'rlo,h eoldlw'],
            ['shuffle(array(1, 2, 3))', 'array(2, 1, 3)'],
            ['numerify(\'Hello ###\')', 'Hello 609'],
            ['lexify(\'Hello ???\')', 'Hello wgt'],
            ['bothify(\'Hello ##??\')', 'Hello 42jz'],
            ['regexify(\'[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\')', 'sm0@y8k96a.ej'],
        ];
    }

    private static function color()
    {
        return [
            ['hexcolor', '#fa3cc2'],
            ['rgbcolor', '0,255,122'],
            ['rgbColorAsArray', 'array(0,255,122)'],
            ['rgbCssColor', 'rgb(0,255,122)'],
            ['safeColorName', 'fuchsia'],
            ['colorName', 'Gainsbor'],
        ];
    }

    private static function biased()
    {
        return [
            ['biasedNumberBetween($min = 10, $max = 20, $function = \'sqrt\')', 'More chances to be close to 20'],
        ];
    }

    private static function barcode()
    {
        return [
            ['ean13', '4006381333931'],
            ['ean8', '73513537'],
            ['isbn13', '9790404436093'],
            ['isbn10', '4881416324'],
        ];
    }

    private static function company()
    {
        return [
            ['catchPhrase', 'Monitored regional contingency'],
            ['bs', 'e-enable robust architectures'],
            ['company', 'Bogan-Treutel'],
            ['companySuffix', 'and Sons'],
            ['jobTitle', 'Cashier'],
        ];
    }

    private static function datetime()
    {
        return [
            ['unixTime($max = \'now\')  ', '58781813'],
            ['dateTime($max = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['dateTimeAD($max = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['iso8601($max = \'now\')', '1978-12-09T10:10:29+0000'],
            ['date($format = \'Y-m-d\', $max = \'now\')', '1979-06-09'],
            ['time($format = \'H:i:s\', $max = \'now\')', '20:49:42'],
            ['dateTimeBetween($startDate = \'-30 years\', $endDate = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['dateTimeInInterval($startDate = \'-30 years\', $interval = \'+ 5 days\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['dateTimeThisCentury($max = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['dateTimeThisDecade($max = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['dateTimeThisYear($max = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['dateTimeThisMonth($max = \'now\', $timezone = date_default_timezone_get())', 'DateTime'],
            ['amPm($max = \'now\')', 'pm'],
            ['dayOfMonth($max = \'now\')', '04'],
            ['dayOfWeek($max = \'now\')', 'Friday'],
            ['month($max = \'now\')', '06'],
            ['monthName($max = \'now\')', 'January'],
            ['year($max = \'now\')', '1993'],
            ['century', 'VI'],
            ['timezone', 'Europe/Paris'],
        ];
    }

    private static function file()
    {
        return [
            ['fileExtension', 'avi'],
            ['mimeType', 'video/x-msvideo'],
            ['file($sourceDir = \'/tmp\', $targetDir = \'/tmp\')', '/path/to/targetDir/13b73edae8443990be1aa8f1a483bc27.jpg'],
            ['file($sourceDir, $targetDir, false)', '13b73edae8443990be1aa8f1a483bc27.jpg'],
        ];
    }

    private static function html()
    {
        return [
            ['randomHtml(2,3)', 'HTML document which is no more than 2 levels deep, and no more than 3 elements wide'],
        ];
    }

    private static function image()
    {
        return [
            ['imageUrl($width = 640, $height = 480)', 'http://lorempixel.com/640/480/'],
            ['imageUrl($width, $height, \'cats\')', 'http://lorempixel.com/800/600/cats/'],
            ['imageUrl($width, $height, \'cats\', true, \'Faker\')', 'http://lorempixel.com/800/400/cats/Faker'],
            ['imageUrl($width, $height, \'cats\', true, \'Faker\', true)', 'http://lorempixel.com/grey/800/400/cats/Faker/ Monochrome image'],
            ['image($dir = \'/tmp\', $width = 640, $height = 480)', '/tmp/13b73aa8f1a483bc27.jpg'],
            ['image($dir, $width, $height, \'cats\')', 'tmp/13b73aa8f1a483bc27.jpg it\'s a cat!'],
            ['image($dir, $width, $height, \'cats\', false)', '13b73aa8f1a483bc27.jpg it\'s a filename without path'],
            ['image($dir, $width, $height, \'cats\', true, false)', 'it\'s a no randomize images (default: `true`)'],
            ['image($dir, $width, $height, \'cats\', true, true, \'Faker\')', 'tmp/13b73aa8f1a483bc27.jpg\' it\'s a cat with \'Faker\' text. Default, `null`'],
        ];
    }

    private static function internet()
    {
        return [
            ['email', 'tkshlerin@collins.com'],
            ['safeEmail', 'king.alford@example.org'],
            ['freeEmail', 'bradley72@gmail.com'],
            ['companyEmail', 'russel.durward@mcdermott.org'],
            ['freeEmailDomain', 'yahoo.com'],
            ['safeEmailDomain', 'example.org'],
            ['userName', 'wade55'],
            ['password', 'k&|X+a45*2['],
            ['domainName', 'wolffdeckow.net'],
            ['domainWord', 'feeney'],
            ['tld', 'biz'],
            ['url', 'http://www.skilesdonnelly.biz/aut-accusantium-ut-architecto-sit-et.html'],
            ['slug', 'aut-repellat-commodi-vel-itaque-nihil-id-saepe-nostrum'],
            ['ipv4', '109.133.32.252'],
            ['localIpv4', '10.242.58.8'],
            ['ipv6', '8e65:933d:22ee:a232:f1c1:2741:1f10:117c'],
            ['macAddress', '43:85:B7:08:10:CA'],
        ];
    }

    private static function lorem()
    {
        return [
            ['word', 'aut'],
            ['words($nb = 3, $asText = false)', 'array(\'porro\', \'sed\', \'magni\')'],
            ['sentence($nbWords = 6, $variableNbWords = true)', 'Sit vitae voluptas sint non voluptates.'],
            ['sentences($nb = 2, $asText = false)', 'array(\'Optio quos qui illo error.\', \'Laborum vero a officia id corporis.\')'],
            ['paragraph($nbSentences = 3, $variableNbSentences = true)', '[...]. [...]. [...].'],
            ['paragraphs($nb = 3, $asText = false)', 'array(\'[...].\', \'[...].\', \'[...].\')'],
            ['text($maxNbChars = 200)', 'Fuga totam reiciendis qui fugiat nemo. Consequatur qui eos quod.'],
        ];
    }

    private static function miscellaneous()
    {
        return [
            ['boolean', 'false'],
            ['boolean($chanceOfGettingTrue = 50)', 'true'],
            ['md5', 'de99a620c50f2990e87144735cd357e7'],
            ['sha1', 'f08e7f04ca1a413807ebc47551a40a20a0b4de5c'],
            ['sha256', '0061e4c60dac5c1d82db0135a42e00c89ae3a333e7c26485321f24348c7e98a5'],
            ['locale', 'en_UK'],
            ['countryCode', 'UK'],
            ['languageCode', 'en'],
            ['currencyCode', 'EUR'],
        ];
    }

    private static function person()
    {
        return [
            ['title($gender = null|\'male\'|\'female\')', 'Ms.'],
            ['titleMale', 'Mr.'],
            ['titleFemale', 'Ms.'],
            ['suffix', 'Jr.'],
            ['name($gender = null|\'male\'|\'female\')', 'Dr. Zane Stroman'],
            ['firstName($gender = null|\'male\'|\'female\')', 'Maynard'],
            ['firstNameMale', 'Maynard'],
            ['firstNameFemale', 'Rachel'],
            ['lastName', 'Zulauf'],
        ];
    }

    private static function payment()
    {
        return [
            ['creditCardType', 'MasterCard'],
            ['creditCardNumber', '4485480221084675'],
            ['creditCardExpirationDate', '04/13'],
            ['creditCardExpirationDateString', '04/13'],
            ['creditCardDetails', 'array(\'MasterCard\', \'4485480221084675\', \'Aleksander Nowak\', \'04/13\')'],
            ['iban($countryCode)', 'IT31A8497112740YZ575DJ28BP4'],
            ['swiftBicNumber', 'RZTIAT22263'],
        ];
    }

    private static function phoneNumber()
    {
        return [
            ['phoneNumber', '201-886-0269 x3767'],
            ['tollFreePhoneNumber', '(888) 937-7238'],
            ['e164PhoneNumber', '+27113456789'],
        ];
    }

    private static function text()
    {
        return [
            ['realText($maxNbChars = 200, $indexSize = 2)', 'And yet I wish you could manage it ? \'And what are they made of?\' Alice asked in [...]'],
        ];
    }

    private static function userAgent()
    {
        return [
            ['userAgent', 'Mozilla/5.0 (Windows CE) AppleWebKit/5350 (KHTML, like Gecko) Chrome/13.0.888.0 Safari/5350'],
            ['chrome', 'Mozilla/5.0 (Macintosh; PPC Mac OS X 10_6_5) AppleWebKit/5312 (KHTML, like Gecko) Chrome/14.0.894.0 Safari/5312'],
            ['firefox', 'Mozilla/5.0 (X11; Linuxi686; rv:7.0) Gecko/20101231 Firefox/3.6'],
            ['safari', 'Mozilla/5.0 (Macintosh; U; PPC Mac OS X 10_7_1 rv:3.0; en-US) AppleWebKit/534.11.3 [...]'],
            ['opera', 'Opera/8.25 (Windows NT 5.1; en-US) Presto/2.9.188 Version/10.00'],
            ['internetExplorer', 'Mozilla/5.0 (compatible; MSIE 7.0; Windows 98; Win 9x 4.90; Trident/3.0)'],
        ];
    }

    private static function uuid()
    {
        return [
            ['uuid', '7e57d004-2b97-0e7a-b45f-5387367791cd'],
        ];
    }
}
