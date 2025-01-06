<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\VerificationEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $accountNumber = rand(1645566556, 5575755768);
        $validToken = rand(7650, 1234);


        $validToken = rand(7650, 1234);


        if ($data['country'] == "Afghanistan") {
            $currency = 'AFN';
        } else if ($data['country'] == "Albania") {
            $currency = 'ALL';
        } else if ($data['country'] == "Algeria") {
            $currency = 'DZD';
        } else if ($data['country'] == "American Samoa") {
            $currency = 'USD';
        } else if ($data['country'] == "Andorra") {
            $currency = 'EUR';
        } else if ($data['country'] == "Angola") {
            $currency = 'AOA';
        } else if ($data['country'] == "Anguilla") {
            $currency = 'XCD';
        } else if ($data['country'] == "Antarctica") {
            $currency = 'USD';
        } else if ($data['country'] == "Antigua and Barbuda") {
            $currency = 'XCD';
        } else if ($data['country'] == "Argentina") {
            $currency = 'ARS';
        } else if ($data['country'] == "Armenia") {
            $currency = 'AMD';
        } else if ($data['country'] == "Aruba") {
            $currency = 'AWG';
        } else if ($data['country'] == "Australia") {
            $currency = 'AUD';
        } else if ($data['country'] == "Austria") {
            $currency = 'EUR';
        } else if ($data['country'] == "Azerbaijan") {
            $currency = 'AZN';
        } else if ($data['country'] == "Bahamas") {
            $currency = 'BSD';
        } else if ($data['country'] == "Bahrain") {
            $currency = 'BHD';
        } else if ($data['country'] == "Bangladesh") {
            $currency = 'BDT';
        } else if ($data['country'] == "Barbados") {
            $currency = 'BBD';
        } else if ($data['country'] == "Belarus") {
            $currency = 'BYN';
        } else if ($data['country'] == "Belgium") {
            $currency = 'EUR';
        } else if ($data['country'] == "Belize") {
            $currency = 'BZD';
        } else if ($data['country'] == "Benin") {
            $currency = 'XOF';
        } else if ($data['country'] == "Bermuda") {
            $currency = 'BMD';
        } else if ($data['country'] == "Bhutan") {
            $currency = 'BTN';
        } else if ($data['country'] == "Bolivia") {
            $currency = 'BOB';
        } else if ($data['country'] == "Bosnia and Herzegovina") {
            $currency = 'BAM';
        } else if ($data['country'] == "Botswana") {
            $currency = 'BWP';
        } else if ($data['country'] == "Bouvet Island") {
            $currency = 'NOK';
        } else if ($data['country'] == "Brazil") {
            $currency = 'BRL';
        } else if ($data['country'] == "British Indian Ocean Territory") {
            $currency = 'USD';
        } else if ($data['country'] == "Brunei Darussalam") {
            $currency = 'BND';
        } else if ($data['country'] == "Bulgaria") {
            $currency = 'BGN';
        } else if ($data['country'] == "Burkina Faso") {
            $currency = 'XOF';
        } else if ($data['country'] == "Burundi") {
            $currency = 'BIF';
        } else if ($data['country'] == "Cambodia") {
            $currency = 'KHR';
        } else if ($data['country'] == "Cameroon") {
            $currency = 'XAF';
        } else if ($data['country'] == "Canada") {
            $currency = 'CAD';
        } else if ($data['country'] == "Cape Verde") {
            $currency = 'CVE';
        } else if ($data['country'] == "Cayman Islands") {
            $currency = 'KYD';
        } else if ($data['country'] == "Central African Republic") {
            $currency = 'XAF';
        } else if ($data['country'] == "Chad") {
            $currency = 'XAF';
        } else if ($data['country'] == "Chile") {
            $currency = 'CLP';
        } else if ($data['country'] == "China") {
            $currency = 'CNY';
        } else if ($data['country'] == "Christmas Island") {
            $currency = 'AUD';
        } else if ($data['country'] == "Cocos (Keeling) Islands") {
            $currency = 'AUD';
        } else if ($data['country'] == "Colombia") {
            $currency = 'COP';
        } else if ($data['country'] == "Comoros") {
            $currency = 'KMF';
        } else if ($data['country'] == "Congo") {
            $currency = 'CDF';
        } else if ($data['country'] == "Democratic Republic of the Congo") {
            $currency = 'CDF';
        } else if ($data['country'] == "Cook Islands") {
            $currency = 'NZD';
        } else if ($data['country'] == "Costa Rica") {
            $currency = 'CRC';
        } else if ($data['country'] == "Cote D'Ivoire") {
            $currency = 'XOF';
        } else if ($data['country'] == "Croatia") {
            $currency = 'HRK';
        } else if ($data['country'] == "Cuba") {
            $currency = 'CUP';
        } else if ($data['country'] == "Cyprus") {
            $currency = 'EUR';
        } else if ($data['country'] == "Czech Republic") {
            $currency = 'CZK';
        } else if ($data['country'] == "Denmark") {
            $currency = 'DKK';
        } else if ($data['country'] == "Djibouti") {
            $currency = 'DJF';
        } else if ($data['country'] == "Dominica") {
            $currency = 'XCD';
        } else if ($data['country'] == "Dominican Republic") {
            $currency = 'DOP';
        } else if ($data['country'] == "Ecuador") {
            $currency = 'USD';
        } else if ($data['country'] == "Egypt") {
            $currency = 'EGP';
        } else if ($data['country'] == "El Salvador") {
            $currency = 'USD';
        } else if ($data['country'] == "Equatorial Guinea") {
            $currency = 'XAF';
        } else if ($data['country'] == "Eritrea") {
            $currency = 'ERN';
        } else if ($data['country'] == "Estonia") {
            $currency = 'EUR';
        } else if ($data['country'] == "Ethiopia") {
            $currency = 'ETB';
        } else if ($data['country'] == "Falkland Islands (Malvinas)") {
            $currency = 'FKP';
        } else if ($data['country'] == "Faroe Islands") {
            $currency = 'DKK';
        } else if ($data['country'] == "Fiji") {
            $currency = 'FJD';
        } else if ($data['country'] == "Finland") {
            $currency = 'EUR';
        } else if ($data['country'] == "France") {
            $currency = 'EUR';
        } else if ($data['country'] == "French Guiana") {
            $currency = 'EUR';
        } else if ($data['country'] == "French Polynesia") {
            $currency = 'XPF';
        } else if ($data['country'] == "French Southern Territories") {
            $currency = 'EUR';
        } else if ($data['country'] == "Gabon") {
            $currency = 'XAF';
        } else if ($data['country'] == "Gambia") {
            $currency = 'GMD';
        } else if ($data['country'] == "Georgia") {
            $currency = 'GEL';
        } else if ($data['country'] == "Germany") {
            $currency = 'EUR';
        } else if ($data['country'] == "Ghana") {
            $currency = 'GHS';
        } else if ($data['country'] == "Gibraltar") {
            $currency = 'GIP';
        } else if ($data['country'] == "Greece") {
            $currency = 'EUR';
        } else if ($data['country'] == "Greenland") {
            $currency = 'DKK';
        } else if ($data['country'] == "Grenada") {
            $currency = 'XCD';
        } else if ($data['country'] == "Guadeloupe") {
            $currency = 'EUR';
        } else if ($data['country'] == "Guam") {
            $currency = 'USD';
        } else if ($data['country'] == "Guatemala") {
            $currency = 'GTQ';
        } else if ($data['country'] == "Guernsey") {
            $currency = 'GBP';
        } else if ($data['country'] == "Guinea") {
            $currency = 'GNF';
        } else if ($data['country'] == "Guinea-Bissau") {
            $currency = 'XOF';
        } else if ($data['country'] == "Guyana") {
            $currency = 'GYD';
        } else if ($data['country'] == "Haiti") {
            $currency = 'HTG';
        } else if ($data['country'] == "Heard Island and McDonald Islands") {
            $currency = 'AUD';
        } else if ($data['country'] == "Holy See (Vatican City State)") {
            $currency = 'EUR';
        } else if ($data['country'] == "Honduras") {
            $currency = 'HNL';
        } else if ($data['country'] == "Hong Kong") {
            $currency = 'HKD';
        } else if ($data['country'] == "Hungary") {
            $currency = 'HUF';
        } else if ($data['country'] == "Iceland") {
            $currency = 'ISK';
        } else if ($data['country'] == "India") {
            $currency = 'INR';
        } else if ($data['country'] == "Indonesia") {
            $currency = 'IDR';
        } else if ($data['country'] == "Iran, Islamic Republic of") {
            $currency = 'IRR';
        } else if ($data['country'] == "Iraq") {
            $currency = 'IQD';
        } else if ($data['country'] == "Ireland") {
            $currency = 'EUR';
        } else if ($data['country'] == "Isle of Man") {
            $currency = 'GBP';
        } else if ($data['country'] == "Israel") {
            $currency = 'ILS';
        } else if ($data['country'] == "Italy") {
            $currency = 'EUR';
        } else if ($data['country'] == "Jamaica") {
            $currency = 'JMD';
        } else if ($data['country'] == "Japan") {
            $currency = 'JPY';
        } else if ($data['country'] == "Jersey") {
            $currency = 'GBP';
        } else if ($data['country'] == "Jordan") {
            $currency = 'JOD';
        } else if ($data['country'] == "Kazakhstan") {
            $currency = 'KZT';
        } else if ($data['country'] == "Kenya") {
            $currency = 'KES';
        } else if ($data['country'] == "Kiribati") {
            $currency = 'AUD';
        } else if ($data['country'] == "Korea, Democratic People's Republic of") {
            $currency = 'KPW';
        } else if ($data['country'] == "Korea, Republic of") {
            $currency = 'KRW';
        } else if ($data['country'] == "Kuwait") {
            $currency = 'KWD';
        } else if ($data['country'] == "Kyrgyzstan") {
            $currency = 'KGS';
        } else if ($data['country'] == "Lao People's Democratic Republic") {
            $currency = 'LAK';
        } else if ($data['country'] == "Latvia") {
            $currency = 'EUR';
        } else if ($data['country'] == "Lebanon") {
            $currency = 'LBP';
        } else if ($data['country'] == "Lesotho") {
            $currency = 'LSL';
        } else if ($data['country'] == "Liberia") {
            $currency = 'LRD';
        } else if ($data['country'] == "Libya") {
            $currency = 'LYD';
        } else if ($data['country'] == "Liechtenstein") {
            $currency = 'CHF';
        } else if ($data['country'] == "Lithuania") {
            $currency = 'EUR';
        } else if ($data['country'] == "Luxembourg") {
            $currency = 'EUR';
        } else if ($data['country'] == "Macao") {
            $currency = 'MOP';
        } else if ($data['country'] == "Macedonia, the Former Yugoslav Republic of") {
            $currency = 'MKD';
        } else if ($data['country'] == "Madagascar") {
            $currency = 'MGA';
        } else if ($data['country'] == "Malawi") {
            $currency = 'MWK';
        } else if ($data['country'] == "Malaysia") {
            $currency = 'MYR';
        } else if ($data['country'] == "Maldives") {
            $currency = 'MVR';
        } else if ($data['country'] == "Mali") {
            $currency = 'XOF';
        } else if ($data['country'] == "Malta") {
            $currency = 'EUR';
        } else if ($data['country'] == "Marshall Islands") {
            $currency = 'USD';
        } else if ($data['country'] == "Martinique") {
            $currency = 'EUR';
        } else if ($data['country'] == "Mauritania") {
            $currency = 'MRU';
        } else if ($data['country'] == "Mauritius") {
            $currency = 'MUR';
        } else if ($data['country'] == "Mayotte") {
            $currency = 'EUR';
        } else if ($data['country'] == "Mexico") {
            $currency = 'MXN';
        } else if ($data['country'] == "Micronesia, Federated States of") {
            $currency = 'USD';
        } else if ($data['country'] == "Moldova, Republic of") {
            $currency = 'MDL';
        } else if ($data['country'] == "Monaco") {
            $currency = 'EUR';
        } else if ($data['country'] == "Mongolia") {
            $currency = 'MNT';
        } else if ($data['country'] == "Montenegro") {
            $currency = 'EUR';
        } else if ($data['country'] == "Montserrat") {
            $currency = 'XCD';
        } else if ($data['country'] == "Morocco") {
            $currency = 'MAD';
        } else if ($data['country'] == "Mozambique") {
            $currency = 'MZN';
        } else if ($data['country'] == "Myanmar") {
            $currency = 'MMK';
        } else if ($data['country'] == "Namibia") {
            $currency = 'NAD';
        } else if ($data['country'] == "Nauru") {
            $currency = 'AUD';
        } else if ($data['country'] == "Nepal") {
            $currency = 'NPR';
        } else if ($data['country'] == "Netherlands") {
            $currency = 'EUR';
        } else if ($data['country'] == "New Caledonia") {
            $currency = 'XPF';
        } else if ($data['country'] == "New Zealand") {
            $currency = 'NZD';
        } else if ($data['country'] == "Nicaragua") {
            $currency = 'NIO';
        } else if ($data['country'] == "Niger") {
            $currency = 'XOF';
        } else if ($data['country'] == "Nigeria") {
            $currency = 'NGN';
        } else if ($data['country'] == "Niue") {
            $currency = 'NZD';
        } else if ($data['country'] == "Norfolk Island") {
            $currency = 'AUD';
        } else if ($data['country'] == "Northern Mariana Islands") {
            $currency = 'USD';
        } else if ($data['country'] == "Norway") {
            $currency = 'NOK';
        } else if ($data['country'] == "Oman") {
            $currency = 'OMR';
        } else if ($data['country'] == "Pakistan") {
            $currency = 'PKR';
        } else if ($data['country'] == "Palau") {
            $currency = 'USD';
        } else if ($data['country'] == "Palestinian Territory, Occupied") {
            $currency = 'ILS';
        } else if ($data['country'] == "Panama") {
            $currency = 'PAB';
        } else if ($data['country'] == "Papua New Guinea") {
            $currency = 'PGK';
        } else if ($data['country'] == "Paraguay") {
            $currency = 'PYG';
        } else if ($data['country'] == "Peru") {
            $currency = 'PEN';
        } else if ($data['country'] == "Philippines") {
            $currency = 'PHP';
        } else if ($data['country'] == "Pitcairn") {
            $currency = 'NZD';
        } else if ($data['country'] == "Poland") {
            $currency = 'PLN';
        } else if ($data['country'] == "Portugal") {
            $currency = 'EUR';
        } else if ($data['country'] == "Puerto Rico") {
            $currency = 'USD';
        } else if ($data['country'] == "Qatar") {
            $currency = 'QAR';
        } else if ($data['country'] == "Reunion") {
            $currency = 'EUR';
        } else if ($data['country'] == "Romania") {
            $currency = 'RON';
        } else if ($data['country'] == "Russian Federation") {
            $currency = 'RUB';
        } else if ($data['country'] == "Rwanda") {
            $currency = 'RWF';
        } else if ($data['country'] == "Saint Barthelemy") {
            $currency = 'EUR';
        } else if ($data['country'] == "Saint Helena, Ascension and Tristan da Cunha") {
            $currency = 'SHP';
        } else if ($data['country'] == "Saint Kitts and Nevis") {
            $currency = 'XCD';
        } else if ($data['country'] == "Saint Lucia") {
            $currency = 'XCD';
        } else if ($data['country'] == "Saint Martin (French part)") {
            $currency = 'EUR';
        } else if ($data['country'] == "Saint Pierre and Miquelon") {
            $currency = 'EUR';
        } else if ($data['country'] == "Saint Vincent and the Grenadines") {
            $currency = 'XCD';
        } else if ($data['country'] == "Samoa") {
            $currency = 'WST';
        } else if ($data['country'] == "San Marino") {
            $currency = 'EUR';
        } else if ($data['country'] == "Sao Tome and Principe") {
            $currency = 'STN';
        } else if ($data['country'] == "Saudi Arabia") {
            $currency = 'SAR';
        } else if ($data['country'] == "Senegal") {
            $currency = 'XOF';
        } else if ($data['country'] == "Serbia") {
            $currency = 'RSD';
        } else if ($data['country'] == "Seychelles") {
            $currency = 'SCR';
        } else if ($data['country'] == "Sierra Leone") {
            $currency = 'SLL';
        } else if ($data['country'] == "Singapore") {
            $currency = 'SGD';
        } else if ($data['country'] == "Sint Maarten (Dutch part)") {
            $currency = 'ANG';
        } else if ($data['country'] == "Slovakia") {
            $currency = 'EUR';
        } else if ($data['country'] == "Slovenia") {
            $currency = 'EUR';
        } else if ($data['country'] == "Solomon Islands") {
            $currency = 'SBD';
        } else if ($data['country'] == "Somalia") {
            $currency = 'SOS';
        } else if ($data['country'] == "South Africa") {
            $currency = 'ZAR';
        } else if ($data['country'] == "South Georgia and the South Sandwich Islands") {
            $currency = 'GBP';
        } else if ($data['country'] == "South Sudan") {
            $currency = 'SSP';
        } else if ($data['country'] == "Spain") {
            $currency = 'EUR';
        } else if ($data['country'] == "Sri Lanka") {
            $currency = 'LKR';
        } else if ($data['country'] == "Sudan") {
            $currency = 'SDG';
        } else if ($data['country'] == "Suriname") {
            $currency = 'SRD';
        } else if ($data['country'] == "Svalbard and Jan Mayen") {
            $currency = 'NOK';
        } else if ($data['country'] == "Swaziland") {
            $currency = 'SZL';
        } else if ($data['country'] == "Sweden") {
            $currency = 'SEK';
        } else if ($data['country'] == "Switzerland") {
            $currency = 'CHF';
        } else if ($data['country'] == "Syrian Arab Republic") {
            $currency = 'SYP';
        } else if ($data['country'] == "Taiwan, Province of China") {
            $currency = 'TWD';
        } else if ($data['country'] == "Tajikistan") {
            $currency = 'TJS';
        } else if ($data['country'] == "Tanzania, United Republic of") {
            $currency = 'TZS';
        } else if ($data['country'] == "Thailand") {
            $currency = 'THB';
        } else if ($data['country'] == "Timor-Leste") {
            $currency = 'USD';
        } else if ($data['country'] == "Togo") {
            $currency = 'XOF';
        } else if ($data['country'] == "Tokelau") {
            $currency = 'NZD';
        } else if ($data['country'] == "Tonga") {
            $currency = 'TOP';
        } else if ($data['country'] == "Trinidad and Tobago") {
            $currency = 'TTD';
        } else if ($data['country'] == "Tunisia") {
            $currency = 'TND';
        } else if ($data['country'] == "Turkey") {
            $currency = 'TRY';
        } else if ($data['country'] == "Turkmenistan") {
            $currency = 'TMT';
        } else if ($data['country'] == "Turks and Caicos Islands") {
            $currency = 'USD';
        } else if ($data['country'] == "Tuvalu") {
            $currency = 'AUD';
        } else if ($data['country'] == "Uganda") {
            $currency = 'UGX';
        } else if ($data['country'] == "Ukraine") {
            $currency = 'UAH';
        } else if ($data['country'] == "United Arab Emirates") {
            $currency = 'AED';
        } else if ($data['country'] == "United Kingdom") {
            $currency = 'GBP';
        } else if ($data['country'] == "United States") {
            $currency = 'USD';
        } else if ($data['country'] == "United States Minor Outlying Islands") {
            $currency = 'USD';
        } else if ($data['country'] == "Uruguay") {
            $currency = 'UYU';
        } else if ($data['country'] == "Uzbekistan") {
            $currency = 'UZS';
        } else if ($data['country'] == "Vanuatu") {
            $currency = 'VUV';
        } else if ($data['country'] == "Venezuela, Bolivarian Republic of") {
            $currency = 'VES';
        } else if ($data['country'] == "Viet Nam") {
            $currency = 'VND';
        } else if ($data['country'] == "Virgin Islands, British") {
            $currency = 'USD';
        } else if ($data['country'] == "Virgin Islands, U.S.") {
            $currency = 'USD';
        } else if ($data['country'] == "Wallis and Futuna") {
            $currency = 'XPF';
        } else if ($data['country'] == "Western Sahara") {
            $currency = 'MAD';
        } else if ($data['country'] == "Yemen") {
            $currency = 'YER';
        } else if ($data['country'] == "Zambia") {
            $currency = 'ZMW';
        } else if ($data['country'] == "Zimbabwe") {
            $currency = 'ZWL';
        }


        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'token' => $validToken,
            'address' => $data['address'],
            'phone_number' => $data['phone'],
            'country' => $data['country'],
            'account_type' => $data['account_type'],
            'currency' => $currency,
            'a_number' => $accountNumber,
            'password' => Hash::make($data['password'])
        ]);

        $email = $data['email'];


        Mail::to($email)->send(new VerificationEmail($validToken));



        // Mail::to($email)->send(new welcomeEmail($data));

        return $user;
    }
}
