if (window.paypal) {
  window.paypal
    .Buttons({
      style: {
        shape: "rect",
        layout: "vertical",
        color: "gold",
        label: "paypal",
      },

      async createOrder() {
        try {
          const response = await fetch('?oldal=Fizetes/FizetesKeres/api/orders', {
            method: "POST"
          });

          const orderData = await response.json();

          if (orderData.id) {
            return orderData.id;
          }
          const errorDetail = orderData?.details?.[0];
          const errorMessage = errorDetail
            ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
            : JSON.stringify(orderData);

          throw new Error(errorMessage);
        } catch (error) {
          const fizetesContener=document.getElementById("paypal-button-container");
          fizetesContener.style.display="none";
          resultMessage(`Nem sikerült elindítani a PayPal fizetési folyamatot!<br><br>${error}`);
        }
      },

      async onApprove(data, actions) {
        try {
          const response = await fetch(`?oldal=Fizetes/FizetesKeres/api/orders/${data.orderID}/capture`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
          });

          const orderData = await response.json();

          const errorDetail = orderData?.details?.[0];

          if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
            return actions.restart();
          } else if (errorDetail) {
            throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
          } else if (!orderData.purchase_units) {
            throw new Error(JSON.stringify(orderData));
          } else {
            const fizetesContener=document.getElementById("paypal-button-container");
            fizetesContener.style.display="none";
            resultMessage(
            '<br>Sikeres Vásárlás!'
            );
          }
        } catch (error) {
          const fizetesContener=document.getElementById("paypal-button-container");
          fizetesContener.style.display="none";
          resultMessage(
            `Sikertelen vásárlás!<br><br>${error}`
          );
        }
      },
    })
    .render("#paypal-button-container");

  function resultMessage(message) {
    const container = document.querySelector("#result-message");
    container.innerHTML = message;
  }
}