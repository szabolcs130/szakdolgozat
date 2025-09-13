<?php
namespace Server\Model;
use Server\Model\csatlakozas;
require __DIR__ . '/../../vendor/autoload.php';

use PaypalServerSdkLib\Authentication\ClientCredentialsAuthCredentialsBuilder;
use PaypalServerSdkLib\Environment;
use PaypalServerSdkLib\PaypalServerSdkClientBuilder;
use PaypalServerSdkLib\Models\Builders\OrderRequestBuilder;
use PaypalServerSdkLib\Models\CheckoutPaymentIntent;
use PaypalServerSdkLib\Models\Builders\PurchaseUnitRequestBuilder;
use PaypalServerSdkLib\Models\Builders\AmountWithBreakdownBuilder;
class FizetesModel{
    public static function PClientId() {

        return $PAYPAL_CLIENT_ID = "Acip4Jkg5vRcCtpNys98ggIAWO2GU3kW2Cx3Oo4iFYNR5N5lNbssSIVLXPcj55Uu7hvWtlIo3mK4BgmP";
    }
    public static function PClientS(){
        return $PAYPAL_CLIENT_SECRET = "EAp5ANSlu-rhU90OY2l_plGV87mpV-4PdEzTkKFuaLrxGR-kDzF4FFfE4vaT7eW7N5zBuXuDV6k8Idky";
    }
        /*if (!getenv('PAYPAL_CLIENT_ID') || !getenv('PAYPAL_CLIENT_SECRET')) {
            http_response_code(500);
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Missing PAYPAL_CLIENT_ID or PAYPAL_CLIENT_SECRET']);
            exit;
        }*/
    public static function Client(){
            $client = PaypalServerSdkClientBuilder::init()
            ->clientCredentialsAuthCredentials(
                ClientCredentialsAuthCredentialsBuilder::init(
                    self::PClientId(),
                    self::PClientS()
                )
            )
            ->environment(Environment::SANDBOX)
            ->build();
        return $client;
    }
        /**
         * Create an order to start the transaction.
         * @see https://developer.paypal.com/docs/api/orders/v2/#orders_create
         */
        public static function createOrder()//$cart)
        {
            

            $orderBody = [
                'body' => OrderRequestBuilder::init(
                    CheckoutPaymentIntent::CAPTURE,
                    [
                        PurchaseUnitRequestBuilder::init(
                            AmountWithBreakdownBuilder::init(
                                'USD',
                                '10.00'
                            )->build()
                        )->build()
                    ]
                )->build()
            ];

            $apiResponse = self::Client()->getOrdersController()->createOrder($orderBody);

            return self::handleResponse($apiResponse);
        }

        /**
         * Capture payment for the created order to complete the transaction.
         * @see https://developer.paypal.com/docs/api/orders/v2/#orders_capture
         */
        public static function captureOrder($orderID)
        {
            

            $captureBody = [
                'id' => $orderID
            ];

            $apiResponse = self::Client()->getOrdersController()->captureOrder($captureBody);

            return self::handleResponse($apiResponse);
        }

        public static function handleResponse($response)
        {
            return [
                'jsonResponse' => $response->getResult(),
                'httpStatusCode' => $response->getStatusCode()
            ];
        }

    
}
?>