<?php


namespace RandomState\LaravelAuth\Strategies\Shopify;


use Illuminate\Http\Request;
use OhMyBrew\BasicShopifyAPI;
use RandomState\LaravelAuth\AbstractAuthStrategy;

class ShopifyStrategy extends AbstractAuthStrategy
{
    /**
     * @var BasicShopifyAPI
     */
    protected $api;
    protected $apiKey;

    /**
     * @var array
     */
    protected $requiredScopes;
    protected $callbackUrl;
    /**
     * @var bool
     */
    protected $supplyShopDetails;

    public function __construct(BasicShopifyAPI $api, $apiKey, $callbackUrl, $requiredScopes = [], $supplyShopDetails = true)
    {
        $this->api = $api;
        $this->apiKey = $apiKey;
        $this->requiredScopes = $requiredScopes;
        $this->callbackUrl = $callbackUrl;
        $this->supplyShopDetails = $supplyShopDetails;
    }

    public function attempt(Request $request)
    {
        // if not shop, deny request
        if (!($shop = $request->get('shop'))) {
            abort(400, "No shop provided.");
        }

        if (!$this->api->verifyRequest($request->all())) {
            abort(401, "Unauthorized");
        }

        // if no access token and not yet verified, take to iframe to get permission
        if (!($code = $request->get('code'))) {
            response()->view('laravel-auth-shopify::auth.escape_iframe', [
                'permissionUrl' => sprintf(
                    "/oauth/authorize?client_id=%s&scope=%s&redirect_uri=%s",
                    $this->apiKey,
                    implode(",", $this->requiredScopes),
                    $this->callbackUrl
                ),
                'shop' => $request->get('shop'),
                'apiKey' => $this->apiKey,
            ])->send();

            exit;
        }

        // if access token, generate a shopify user object
        $this->api->setShop($shop);
        $accessToken = $this->api->requestAccessToken($code);

        $data = null;
        if ($this->supplyShopDetails) {
            $this->api->setAccessToken($accessToken);
            $data = $this->api->rest('get', '/admin/shop.json')->body->shop;
        }

        return ShopifyShop::fromJson($accessToken, $data);
    }
}