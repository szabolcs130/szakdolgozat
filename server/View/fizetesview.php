<?php
namespace Server\View;
class FizetesView{
    public static function ShowFizetes(){
        ?>
        <link
      rel="stylesheet"
      type="text/css"
      href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/css/cardfields.css"
    />
  </head>
  <body>
    <div id="paypal-button-container" class="paypal-button-container"></div>
    <p id="result-message"></p>
    <script src="https://www.paypal.com/sdk/js?client-id=Acip4Jkg5vRcCtpNys98ggIAWO2GU3kW2Cx3Oo4iFYNR5N5lNbssSIVLXPcj55Uu7hvWtlIo3mK4BgmP&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo"></script>
    
    <?php
        return 1;
    }
}
?>