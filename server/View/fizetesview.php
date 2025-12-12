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
    <div id="fizetesDiv">
      <div id="paypal-button-container" class="paypal-button-container"></div>
    </div>
    <h3 id="result-message"></h3>
    <script src="https://www.paypal.com/sdk/js?client-id=Acip4Jkg5vRcCtpNys98ggIAWO2GU3kW2Cx3Oo4iFYNR5N5lNbssSIVLXPcj55Uu7hvWtlIo3mK4BgmP&buyer-country=US&currency=HUF&components=buttons&enable-funding=venmo"></script>
    
    <?php
        return 1;
    }
}
?>