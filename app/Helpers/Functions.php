<?php


use App\Models\Cookie;
use App\Models\EmailSetting;
use App\Models\GoogleAnalytic;
use App\Models\GoogleRecaptcha;
use App\Models\Media;
use App\Models\MudikPeriod;
use App\Models\PageFooter;
use App\Models\PageHeader;
use App\Models\PaymentGateway;
use App\Models\Setting;
use App\Models\ShippingCountry;
use App\Models\ShopSetting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

function Countries()
{
    return array(
        "ID" => "Indonesia"
    );
}

function Currencies()
{
    return array(
        'ALL' => 'Albania Lek',
        'AFN' => 'Afghanistan Afghani',
        'ARS' => 'Argentina Peso',
        'AWG' => 'Aruba Guilder',
        'AUD' => 'Australia Dollar',
        'AZN' => 'Azerbaijan New Manat',
        'BSD' => 'Bahamas Dollar',
        'BBD' => 'Barbados Dollar',
        'BDT' => 'Bangladeshi taka',
        'BYR' => 'Belarus Ruble',
        'BZD' => 'Belize Dollar',
        'BMD' => 'Bermuda Dollar',
        'BOB' => 'Bolivia Boliviano',
        'BAM' => 'Bosnia and Herzegovina Convertible Marka',
        'BWP' => 'Botswana Pula',
        'BGN' => 'Bulgaria Lev',
        'BRL' => 'Brazil Real',
        'BND' => 'Brunei Darussalam Dollar',
        'KHR' => 'Cambodia Riel',
        'CAD' => 'Canada Dollar',
        'KYD' => 'Cayman Islands Dollar',
        'CLP' => 'Chile Peso',
        'CNY' => 'China Yuan Renminbi',
        'COP' => 'Colombia Peso',
        'CRC' => 'Costa Rica Colon',
        'HRK' => 'Croatia Kuna',
        'CUP' => 'Cuba Peso',
        'CZK' => 'Czech Republic Koruna',
        'DKK' => 'Denmark Krone',
        'DOP' => 'Dominican Republic Peso',
        'XCD' => 'East Caribbean Dollar',
        'EGP' => 'Egypt Pound',
        'SVC' => 'El Salvador Colon',
        'EEK' => 'Estonia Kroon',
        'EUR' => 'Euro Member Countries',
        'FKP' => 'Falkland Islands (Malvinas) Pound',
        'FJD' => 'Fiji Dollar',
        'GHS' => 'Ghana Cedis',
        'GIP' => 'Gibraltar Pound',
        'GTQ' => 'Guatemala Quetzal',
        'GGP' => 'Guernsey Pound',
        'GYD' => 'Guyana Dollar',
        'HNL' => 'Honduras Lempira',
        'HKD' => 'Hong Kong Dollar',
        'HUF' => 'Hungary Forint',
        'ISK' => 'Iceland Krona',
        'INR' => 'India Rupee',
        'IDR' => 'Indonesia Rupiah',
        'IRR' => 'Iran Rial',
        'IMP' => 'Isle of Man Pound',
        'ILS' => 'Israel Shekel',
        'JMD' => 'Jamaica Dollar',
        'JPY' => 'Japan Yen',
        'JEP' => 'Jersey Pound',
        'KZT' => 'Kazakhstan Tenge',
        'KPW' => 'Korea (North) Won',
        'KRW' => 'Korea (South) Won',
        'KGS' => 'Kyrgyzstan Som',
        'LAK' => 'Laos Kip',
        'LVL' => 'Latvia Lat',
        'LBP' => 'Lebanon Pound',
        'LRD' => 'Liberia Dollar',
        'LTL' => 'Lithuania Litas',
        'MKD' => 'Macedonia Denar',
        'MYR' => 'Malaysia Ringgit',
        'MUR' => 'Mauritius Rupee',
        'MXN' => 'Mexico Peso',
        'MNT' => 'Mongolia Tughrik',
        'MZN' => 'Mozambique Metical',
        'NAD' => 'Namibia Dollar',
        'NPR' => 'Nepal Rupee',
        'ANG' => 'Netherlands Antilles Guilder',
        'NZD' => 'New Zealand Dollar',
        'NIO' => 'Nicaragua Cordoba',
        'NGN' => 'Nigeria Naira',
        'NOK' => 'Norway Krone',
        'OMR' => 'Oman Rial',
        'PKR' => 'Pakistan Rupee',
        'PAB' => 'Panama Balboa',
        'PYG' => 'Paraguay Guarani',
        'PEN' => 'Peru Nuevo Sol',
        'PHP' => 'Philippines Peso',
        'PLN' => 'Poland Zloty',
        'QAR' => 'Qatar Riyal',
        'RON' => 'Romania New Leu',
        'RUB' => 'Russia Ruble',
        'SHP' => 'Saint Helena Pound',
        'SAR' => 'Saudi Arabia Riyal',
        'RSD' => 'Serbia Dinar',
        'SCR' => 'Seychelles Rupee',
        'SGD' => 'Singapore Dollar',
        'SBD' => 'Solomon Islands Dollar',
        'SOS' => 'Somalia Shilling',
        'ZAR' => 'South Africa Rand',
        'LKR' => 'Sri Lanka Rupee',
        'SEK' => 'Sweden Krona',
        'CHF' => 'Switzerland Franc',
        'SRD' => 'Suriname Dollar',
        'SYP' => 'Syria Pound',
        'TWD' => 'Taiwan New Dollar',
        'THB' => 'Thailand Baht',
        'TTD' => 'Trinidad and Tobago Dollar',
        'TRY' => 'Turkey Lira',
        'TRL' => 'Turkey Lira',
        'TVD' => 'Tuvalu Dollar',
        'UAH' => 'Ukraine Hryvna',
        'GBP' => 'United Kingdom Pound',
        'USD' => 'United States Dollar',
        'UYU' => 'Uruguay Peso',
        'UZS' => 'Uzbekistan Som',
        'VEF' => 'Venezuela Bolivar',
        'VND' => 'Viet Nam Dong',
        'YER' => 'Yemen Rial',
        'ZWD' => 'Zimbabwe Dollar'
    );
}

function GetSetting($property)
{
    return @Setting::first()->$property;
}

function CookieSetting($property)
{
    return @Cookie::first()->$property;
}

function PaymentGateway($property)
{
    return @PaymentGateway::first()->$property;
}

function ReCaptcha($property)
{
    return @GoogleRecaptcha::first()->$property;
}


function GetAnalytics($property)
{
    return @GoogleAnalytic::first()->$property;
}


function MailConfig($property)
{
    return @EmailSetting::first()->$property;
}

function ActiveSidebar($route)
{
    if (route($route) == url()->current()) {
        return 'active';
    }
}

function ActiveSidebarNew($route)
{
    if (Request::routeIs($route)) {
        return 'active';
    }
}

function ActiveMenu($segment, $match)
{
    if (request()->segment($match) == $segment) {
        return 'active';
    }
}

function MediaImages($array)
{
    $array =  explode(',', $array);

    $elementsArray = [];

    foreach ($array as $key => $image) {

        $elementsArray[$key] = ['id' => $key + 1, 'image' => $image];
    }

    $object = new stdClass();

    foreach ($array as $key => $value) {
        $object->$key = $value;
    }

    return $object;
}

function MediaImage($array, $id)
{

    $data =  explode(',', $array);
    return $data[$id - 1];
}

function getAlterTag($image)
{
    return @Media::where(['file_path' => $image])->first()->file_name;
}

function getAllResourceFiles($dir, &$results = array())
{
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = $dir . "/" . $value;
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getAllResourceFiles($path, $results);
        }
    }
    return $results;
}

function getRegexBetween($content)
{

    preg_match_all("%\{{__\(['|\"](.*?)['\"]\)}}%i", $content, $matches1, PREG_PATTERN_ORDER);
    preg_match_all("%\@lang\(['|\"](.*?)['\"]\)%i", $content, $matches2, PREG_PATTERN_ORDER);
    preg_match_all("%trans\(['|\"](.*?)['\"]\)%i", $content, $matches3, PREG_PATTERN_ORDER);


    $Alldata = [$matches1[1], $matches2[1], $matches3[1]];
    $data = [];
    foreach ($Alldata as  $value) {
        if (!empty($value)) {
            foreach ($value as $val) {
                $val = str_replace('admin.\'.\'', '', $val);
                $val = str_replace('frontend.\'.\'', '', $val);
                $val = str_replace('notification.\'.\'', '', $val);
                $data[$val] = $val;
            }
        }
    }
    return $data;
}

function generateLangFrontend($path, $file)
{

    $paths = getAllResourceFiles(resource_path('views/frontend/'));
    $paths = array_merge($paths, getAllResourceFiles(resource_path('views/frontend/components')));
    $paths = array_merge($paths, getAllResourceFiles(app_path('Http/Controllers/Frontend')));


    $AllData = [];
    foreach ($paths as $key => $path) {
        $AllData[] = getRegexBetween(file_get_contents($path));
    }
    $modifiedData = [];
    foreach ($AllData as  $value) {
        if (!empty($value)) {
            foreach ($value as $val) {

                $modifiedData[$val] = $val;
            }
        }
    }

    $modifiedData = var_export($modifiedData, true);
    file_put_contents(resource_path($file), "<?php\n return {$modifiedData};\n ?>");
}

function generateLangBackend($path, $file)
{

    $paths = getAllResourceFiles(resource_path('views/admin/'));
    $paths = array_merge($paths, getAllResourceFiles(resource_path('views/admin')));
    $paths = array_merge($paths, getAllResourceFiles(resource_path('views/vendor')));
    $paths = array_merge($paths, getAllResourceFiles(app_path('Http/Controllers/Admin')));

    $AllData = [];
    foreach ($paths as $key => $path) {
        $AllData[] = getRegexBetween(file_get_contents($path));
    }
    $modifiedData = [];
    foreach ($AllData as  $value) {
        if (!empty($value)) {
            foreach ($value as $val) {

                $modifiedData[$val] = $val;
            }
        }
    }

    $modifiedData = var_export($modifiedData, true);
    file_put_contents(resource_path($file), "<?php\n return {$modifiedData};\n ?>");
}

function commaToArray($string)
{
    return @explode(',', $string);
}

function getBlogTags()
{
    $tags = [];
    $result = [];
    foreach (App\Models\Blog::where(['status' => 1])->get() as $key) {
        $tags[] = commaToArray($key->tags);
    }
    foreach ($tags as $key => $value) {
        $result = array_merge($result, $value);
    }
    $result = array_unique($result);
    $result = array_filter($result);
    return $result;
}


function showArchive()
{
    return App\Models\Blog::all()->groupBy(function ($date) {
        return Carbon::parse($date->created_at)->format('Y-m');
    });
}

function numberUnformat($number)
{
    return (float)preg_replace("/[^0-9.]+/", "", $number);
}

function numberFormat($number)
{
    return number_format($number, 2, ".", ",");
}

function taxOf($number)
{
    return @(App\Models\ShopSetting::first()->tax / 100) * $number;
}

function shippingFee()
{
    return @ShippingCountry::where(['country' => Auth::user()->address->country])
        ->first()->shipping_fee ?: ShopSetting::first()->default_shipping_fee;
}

function cartDestroy()
{
    return \Cart::destroy();
}


function cartTotal()
{
    return @numberUnformat(\Cart::total());
}

function getTotal()
{
    return cartTotal() + taxOf(cartTotal()) + shippingFee();
}


function getHeader()
{
    return PageHeader::findOrFail(GetSetting('site_header'))->header;
}

function getHeaderImage()
{
    return PageHeader::findOrFail(GetSetting('site_header'))->image;
}

function getFooter()
{
    return PageFooter::findOrFail(GetSetting('site_footer'))->footer;
}

function getFooterImage()
{
    return PageFooter::findOrFail(GetSetting('site_footer'))->image;
}

function checkMaintenance()
{
    if (File::exists(storage_path('/framework/down'))) {
        return true;
    }
    return false;
}

function checkDemo()
{
    $env = env("DEMO_MODE");
    if ($env == true) {
        return true;
    }
    return false;
}

function filterTag($content)
{
    $replace = array('<p>', '</p>');
    $response = str_replace($replace, '', $content);
    return $response;
}

function removeTag($content)
{
    $response = html_entity_decode($content);
    $content = strip_tags($response);
    return $content;
}

function showHtml($content)
{
    return clean(html_entity_decode($content));
}

function listPeriodMudik()
{
    return MudikPeriod::select('id', 'name')->get();
}
