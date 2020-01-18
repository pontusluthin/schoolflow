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

      <input type="hidden" :value="customer_password">

      <div class="aggreement">
        <input id="checkbox" class="field_a" type="checkbox">
        <label for="checkbox" class="field_text">{{ checkbox_text }}</label>
      </div>

      <input type="submit" @click.prevent="order"  value="Genomför betalning" class="payment-submit-button">
    </form>

    <div class="shopping-cart">
      <form class="payment-form cart">
        <div class="form-title">{{ shopping_cart_title }}</div>

        <div class="product-sum-wrapper" v-if="product_storage_id">
          <div class="product-name">Paket {{ single_product.name }} <span v-if="single_product.month_price" >{{ single_product.month_price }} SEK/månad</span></div>
          <div class="product-info">Löpande prenumeration 
            <span>
              <input class="product-num-field" type="text" value="1">st
            </span>
            <font-awesome-icon @click.prevent="removeLocalStorage" class="delete-product-icon" icon="window-close" />
          </div>

        </div>
          <div class="product-sum-price">
            <div class="tax-price">Moms<span>{{ vat }}</span></div>
            <div class="total-price" >Totalt<span id="total_price" :value="single_product.month_price ">{{ single_product.month_price }} <span class="zero-value" v-if="product_storage_id == null">0</span> SEK</span></div>
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
import axios from 'axios';
export default {
   name: 'payment',
   computed: {
  
   },
   data () {
     return {
      payment_title: 'Betalning', 
      bill_title: 'Fakturadress',
      contact_title: 'Kontaktuppgifter',
      shopping_cart_title: 'Din varukorg',
      single_product: '',
      vat: '',
      product_storage_id: '',
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
   }, 
   methods: {
     getLocalStorage() {
      this.product_storage_id = localStorage.getItem('product');
     },

     fetch_single_product: function () {
       axios 
      .get('http://localhost/Examensarbete/schoolflow/api/?product_id='+ this.product_storage_id)
      .then(response => (this.single_product = response.data ))

    },

    removeLocalStorage() {
       localStorage.removeItem('product')
          this.getLocalStorage() 
          this.fetch_single_product() 
      
    },

      result: function(){
        document.getElementById('total_price').value;

     
       
               
                    return this.firstNumber * this.secondNumber;
                },

                testo() {
                  console.log('fungerar')
                },

                test() {
          this.testo()
      },

      order () {
        this.test()
      } 
      
    
   },
   
   mounted() {
           this.getLocalStorage() 
           this.fetch_single_product()
           this.result();
      
   }
}
</script>
