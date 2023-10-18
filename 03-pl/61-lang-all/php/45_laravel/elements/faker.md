# Faker

https://github.com/fzaninotto/Faker

Each of the generator properties (like name, address, and lorem) are called *formatters*. A faker generator has many of them, packaged in *providers*. Here is a list of the bundled formatters in the default locale.

Faker provides 3 special providers to be called before any provider:
- `unique()` forces providers to return unique values
- `optional()` sometimes bypasses the provider to return a default value
- `valid()` only accepts valid values according to the passed validator



## Providers

- numberBetween($min = 1000, $max = 9000)
- randomElement($array = array ('a','b','c'))               // 'b'
- randomElements($array = array ('a','b','c'), $count = 1)  // array('c')
- word
- words($nb = 3, $asText = false)
- sentence($nbWords = 6, $variableNbWords = true)
- sentences($nb = 3, $asText = false)
- paragraph($nbSentences = 3, $variableNbSentences = true)
- paragraphs($nb = 3, $asText = false)
- text($maxNbChars = 200)
- firstNameMale           // 'Maynard'
- firstNameFemale         // 'Rachel'
- lastName                // 'Zulauf'
- city                    // 'West Judge'
- streetAddress           // '439 Karley Loaf Suite 897'
- postcode                // '17916'
- address                 // '8888 Vista Apt. 101, Susanbury, NY 95473'
- country                 // 'Falkland Islands (Malvinas)'
- phoneNumber             // '201-886-0269 x3767'
- date($format = 'Y-m-d', $max = 'now') // '1979-06-09'
- email                   // 'tkshlerin@collins.com'
- safeEmail               // 'king.alford@example.org'
- freeEmail               // 'bradley72@gmail.com'
- companyEmail            // 'russel.durward@mcdermott.org'
- freeEmailDomain         // 'yahoo.com'
- safeEmailDomain         // 'example.org'
- userName                // 'wade55'
- password                // 'k&|X+a45*2['
- domainName              // 'wolffdeckow.net'
- domainWord              // 'feeney'
- tld                     // 'biz'
- url                     // 'http://www.skilesdonnelly.biz/aut-accet.html'
- slug                    // 'aut-repeid-saepe-nostrum'
- ipv4                    // '109.133.32.252'
- localIpv4               // '10.242.58.8'
- ipv6                    // '8e65:933d:22ee:a232:f1c1:2741:1f10:117c'
- macAddress              // '43:85:B7:08:10:CA'
- fileExtension           // 'avi'
- mimeType                // 'video/x-msvideo'
- boolean                 // false
- boolean($chanceOfGettingTrue = 50) // true
- locale                  // en_UK
- countryCode             // UK
- languageCode            // en
- currencyCode            // EUR
- *many many more*
