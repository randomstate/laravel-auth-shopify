<?php


namespace RandomState\LaravelAuth\Strategies\Shopify;


use Carbon\Carbon;

class ShopifyShop
{
    /**
     * @var string
     */
    public $address1;

    /**
     * @var string
     */
    public $address2;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $countryName;

    /**
     * @var Carbon
     */
    public $createdAt;

    /**
     * @var Carbon
     */
    public $updatedAt;

    /**
     * @var string
     */
    public $customerEmail;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $googleAppsDomain;

    /**
     * @var bool
     */
    public $googleAppsLoginEnabled;

    /**
     * @var int
     */
    public $id;

    /**
     * @var float
     */
    public $latitude;

    /**
     * @var float
     */
    public $longitude;

    /**
     * @var string
     */
    public $moneyFormat;

    /**
     * @var string
     */
    public $moneyWithCurrencyFormat;

    /**
     * @var string
     */
    public $weightUnit;

    /**
     * @var string
     */
    public $myshopifyDomain;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $planName;

    /**
     * @var bool
     */
    public $hasDiscounts;

    /**
     * @var bool
     */
    public $hasGiftCards;

    /**
     * @var string
     */
    public $planDisplayName;

    /**
     * @var bool
     */
    public $passwordEnabled;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $primaryLocale;

    /**
     * @var string
     */
    public $province;

    /**
     * @var string
     */
    public $shopOwner;

    /**
     * @var string
     */
    public $source;

    /**
     * @var bool
     */
    public $forceSsl;

    /**
     * @var bool
     */
    public $taxShipping;

    /**
     * @var bool
     */
    public $taxesIncluded;

    /**
     * @var bool
     */
    public $countyTaxes;

    /**
     * @var string
     */
    public $timezone;

    /**
     * @var string
     */
    public $ianaTimezone;

    /**
     * @var string
     */
    public $zip;

    /**
     * @var bool
     */
    public $hasStorefront;

    /**
     * @var bool
     */
    public $setupRequired;

    /**
     * @var string
     */
    public $accessToken;

    /**
     * @var array
     */
    public $enabledPresentmentCurrencies;

    /**
     * @var bool
     */
    public $preLaunchEnabled;

    /**
     * @var string
     */
    public $provinceCode;

    /**
     * @var bool
     */
    public $checkoutApiSupported;

    /**
     * @var bool
     */
    public $multiLocationEnabled;

    public static function fromJson(string $accessToken, $data = null)
    {
        $shop = new self;
        $shop->accessToken = $accessToken;

        if(!$data) {
            return $shop;
        }

        $data = collect((array) $data)->mapWithKeys(function($value, $key) {
            return [camel_case($key) => $value];
        });

        $shop->address1 = $data->get('address1');
        $shop->address2 = $data->get('address2');
        $shop->city = $data->get('city');
        $shop->country = $data->get('country');
        $shop->countryCode = $data->get('countryCode');
        $shop->countryName = $data->get('countryName');
        $shop->createdAt = Carbon::createFromFormat(Carbon::ISO8601, $data->get('createdAt'));
        $shop->updatedAt = Carbon::createFromFormat(Carbon::ISO8601, $data->get('updatedAt'));
        $shop->customerEmail = $data->get('customerEmail');
        $shop->currency = $data->get('currency');
        $shop->domain = $data->get('domain');
        $shop->enabledPresentmentCurrencies = $data->get('enabledPresentmentCurrencies');
        $shop->email = $data->get('email');
        $shop->googleAppsDomain = $data->get('googleAppsDomain');
        $shop->googleAppsLoginEnabled = $data->get('googleAppsLoginEnabled');
        $shop->id = $data->get('id');
        $shop->latitude = $data->get('latitude');
        $shop->longitude = $data->get('longitude');
        $shop->moneyFormat = $data->get('moneyFormat');
        $shop->moneyWithCurrencyFormat = $data->get('moneyWithCurrencyFormat');
        $shop->weightUnit = $data->get('weightUnit');
        $shop->myshopifyDomain = $data->get('myshopifyDomain');
        $shop->name = $data->get('name');
        $shop->planName = $data->get('planName');
        $shop->hasDiscounts = $data->get('hasDiscounts');
        $shop->hasGiftCards = $data->get('hasGiftCards');
        $shop->planDisplayName = $data->get('planDisplayName');
        $shop->passwordEnabled = $data->get('passwordEnabled');
        $shop->preLaunchEnabled = $data->get('preLaunchEnabled');
        $shop->phone = $data->get('phone');
        $shop->primaryLocale = $data->get('primaryLocale');
        $shop->province = $data->get('province');
        $shop->provinceCode = $data->get('provinceCode');
        $shop->shopOwner = $data->get('shopOwner');
        $shop->source = $data->get('source');
        $shop->forceSsl = $data->get('forceSsl');
        $shop->taxShipping = $data->get('taxShipping');
        $shop->taxesIncluded = $data->get('taxesIncluded');
        $shop->countyTaxes = $data->get('countyTaxes');
        $shop->timezone = $data->get('timezone');
        $shop->zip = $data->get('zip');
        $shop->hasStorefront = $data->get('hasStorefront');
        $shop->setupRequired = $data->get('setupRequired');
        $shop->checkoutApiSupported = $data->get('checkoutApiSupported');
        $shop->multiLocationEnabled = $data->get('multiLocationEnabled');

        return $shop;
    }
}