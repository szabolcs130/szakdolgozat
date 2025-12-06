<?php
namespace Server\Controller;
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use Server\Model\KosarModel;
use Server\Model\TermekekModel;
use Server\Model\ErtekEllenorzesModel;
use Server\View\KosarView;
/*use PaypalServerSdkLib\PaypalServerSdkClientBuilder;
use PaypalServerSdkLib\Authentication\ClientCredentialsAuthCredentialsBuilder;
use PaypalServerSdkLib\Logging\LoggingConfigurationBuilder;
use PaypalServerSdkLib\Logging\RequestLoggingConfigurationBuilder;
use PaypalServerSdkLib\Logging\ResponseLoggingConfigurationBuilder;
use Psr\Log\LogLevel;
use PaypalServerSdkLib\Models\Builders\OrderRequestBuilder;
use PaypalServerSdkLib\Models\CheckoutPaymentIntent;
use PaypalServerSdkLib\Models\Builders\PurchaseUnitRequestBuilder;
use PaypalServerSdkLib\Models\Builders\AmountWithBreakdownBuilder;
use PaypalServerSdkLib\Models\Builders\AmountBreakdownBuilder;
use PaypalServerSdkLib\Models\Builders\MoneyBuilder;
use PaypalServerSdkLib\Models\Builders\ItemBuilder;
use PaypalServerSdkLib\Models\ItemCategory;
use PaypalServerSdkLib\Models\Builders\ShippingDetailsBuilder;
use PaypalServerSdkLib\Models\Builders\ShippingNameBuilder;
use PaypalServerSdkLib\Models\Builders\ShippingOptionBuilder;
use PaypalServerSdkLib\Models\ShippingType;
use PaypalServerSdkLib\Models\Builders\PaymentSourceBuilder;
use PaypalServerSdkLib\Models\Builders\CardRequestBuilder;
use PaypalServerSdkLib\Models\Builders\CardAttributesBuilder;
use PaypalServerSdkLib\Models\Builders\CardVerificationBuilder;
use PaypalServerSdkLib\Environment;
use PaypalServerSdkLib\Models\Builders\PaypalWalletBuilder;
use PaypalServerSdkLib\Models\Builders\PaypalWalletExperienceContextBuilder;
use PaypalServerSdkLib\Models\ShippingPreference;
use PaypalServerSdkLib\Models\PaypalExperienceLandingPage;
use PaypalServerSdkLib\Models\PaypalExperienceUserAction;*/
class KosarController{
    public static function Main(){
        if (isset($_SESSION["username"])) {
            $kosar=KosarModel::getKosar();
            $osszAr=KosarModel::getOsszAr();
            if ($kosar!==[]) {
                KosarView::ShowKosar($kosar,$osszAr);
                return 1;
            }else{
                KosarView::ShowKosar("ures",0);
                return 1;  
            }
        }
        return 1;
    }
    public static function MennyisegValtoztat(){ 
        if (isset($_SESSION["username"]) && isset($_POST["aruId"]) && isset($_POST["me"])) {
            $id=ErtekEllenorzesModel::Szam($_POST["aruId"],0,99999999);
            if ($id===false) {
                return 0;
            }
            $me=ErtekEllenorzesModel::Szam($_POST["me"],0,99999999);
            if ($me===false) {
                return 0;
            }   
            $aru=TermekekModel::lekerdezAruById($id);
            if (is_array($aru) && !empty($aru)) {//$aru!=0 && $aru!==[]
                KosarModel::hozzaadAru($aru[0]['id_aru'],$aru[0]['nev_aru'],$aru[0]['ar'],$me);
                self::Main();
                return 1;
            }
        }
        return 0;
    }
}
?>