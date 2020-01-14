<template>
  <div class="payment page">
    <form class="payment-form">

      <div class="form-title">{{ payment_title }}</div>
      <div class="field-wrapper" v-for="label in labels_payment" :key="label">
        <label class="field-title">{{ label.title }}</label>
        <input class="field" type="text">
      </div>

      <div class="form-title">{{ bill_title }}</div>
      <div class="field-wrapper" v-for="label in labels_bill" :key="label">
        <label class="field-title">{{ label.title }}</label>
        <input class="field" type="text">
      </div>

      <div class="form-title">{{ contact_title }}</div>
      <div class="field-wrapper" v-for="label in labels_contact" :key="label">
        <label class="field-title">{{ label.title }}</label>
        <input class="field" type="text">
      </div>

      <div class="aggreement">
        <input id="checkbox" class="field_a" type="checkbox">
        <label for="checkbox" class="field_text">{{ checkbox_text }}</label>
      </div>

      <input type="submit" value="Genomför betalning" class="payment-submit-button">
    </form>

    <div class="shopping-cart">
      <form class="payment-form cart">
        <div class="form-title">{{ shopping_cart_title }}</div>

        <div class="product-sum-wrapper">
          <div class="product-name">Paket Liten <span>89 SEK/månad</span></div>
          <div class="product-info">Löpande prenumeration 
            <span>
              <input class="product-num-field" type="text" value="1">st
            </span>
            <font-awesome-icon class="delete-product-icon" icon="window-close" />
          </div>
          <div class="product-sum-price">
            <div class="tax-price">Moms<span>22,25 SEK</span></div>
            <div class="total-price">Totalt<span>89 SEK</span></div>
          </div>
        </div>

        <div class="field-wrapper">
          <input class="discount-field field" type="text">
          <input type="submit" value="Lägg till rabattkod" class="submit-discount">
        </div>

      </form>
    </div>

  </div>
</template>
<script>
export default {
   name: 'payment',

   data () {
     return {
      payment_title: 'Betalning', 
      bill_title: 'Fakturadress',
      contact_title: 'Kontaktuppgifter',
      shopping_cart_title: 'Din varukorg',
      labels_payment: [
        {
          title: 'Förnamn'
        },
        {
          title: 'Efternamn'
        }
      ],

      labels_bill: [
        {
          title: 'Adress'
        },
        {
          title: 'Postnummer'
        },
        {
          title: 'Stad'
        }
      ],
      labels_contact: [
        {
          title: 'Mejladress'
        },
        {
          title: 'Telefonnummer'
        }
      ],
        checkbox_text: 'Jag godkänner härmed Schoolflows allmänna villkor och köpvillkor'
     }
   }
}
</script>
