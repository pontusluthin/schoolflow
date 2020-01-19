<template>
  <div class="payment page">
    <form class="payment-form" @submit.prevent="order">

      <div class="form-title">{{ payment_title }}</div>
      <div class="field-wrapper">
        <label class="field-title">{{ first_name_text }}</label>
        <input class="field" type="text"  v-model="first_name">
      </div>
      <div class="field-wrapper">
        <label class="field-title">{{ last_name_text }}</label>
        <input class="field" type="text"  v-model="last_name">
      </div>

      <div class="form-title">{{ bill_title }}</div>
      <div class="field-wrapper">
        <label class="field-title">{{ customer_address_text }}</label>
        <input class="field" type="text" v-model="customer_address">
      </div>
      <div class="field-wrapper">
        <label class="field-title">{{ postal_code_text }}</label>
        <input class="field" type="text" v-model="postal_code">
      </div>
      <div class="field-wrapper">
        <label class="field-title">{{ city_text }}</label>
        <input class="field" type="text" v-model="city">
      </div>


      <div class="form-title">{{ contact_title }}</div>
      <div class="field-wrapper">
        <label class="field-title">{{ email_text }}</label>
        <input class="field" type="email"  v-model="email">
      </div>
       <div class="field-wrapper">
        <label class="field-title">{{ phone_text }}</label>
        <input class="field" type="text"  v-model="phone">
      </div>
       <div class="field-wrapper">
        <label class="field-title">{{ customer_password_text }}</label>
        <input class="field" type="password"  v-model="customer_password">
      </div>

      

      <div class="aggreement">
        <input id="checkbox" class="field_a" type="checkbox" v-model="checkbox">
        <label for="checkbox" class="field_text">{{ checkbox_text }}</label>
      </div>

      <input type="submit" value="Genomför betalning" class="payment-submit-button">
    </form>

    <div class="shopping-cart">
      <form class="payment-form cart">
        <div class="form-title">{{ shopping_cart_title }}</div>

        <router-link to="/priser" v-if="single_product.month_price == null" class="add-product-button">Lägg till produkt</router-link>

        <div class="product-sum-wrapper" v-if="product_storage_id">
          <div class="product-name">Paket {{ single_product.name }} 
            <span v-if="single_product.month_price" >
              {{ single_product.month_price }} 
              SEK/månad
            </span>
          </div>
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

    <div class="modal-bg" :class="[ visible ? 'show' : 'hide']"></div>
    <div class="order-modal"  :class="[ visible ? 'show' : 'hide']">
      <img class="schoolflow-logo" src=".././assets/schoolflow_logo.png" alt="">
      <div class="modal-text">
          <div class="name">Vad rolig {{ first_name }} att du har valt Schoolflow! </div>
          <div class="mail">Vi kommer strax att skicka en beställningsbekräftelse samt inloggninsupgifter till: {{ email }} </div>
          <div class="support">Har du några frågor redan nu är du varmt välkommen att höra av dig till: support@schoolflow.se</div>
          <router-link  @click.prevent="close_modal" to="/" class="button">Stäng fönster</router-link>
      </div>
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
      visible: false,
      payment_title: 'Betalning', 
      bill_title: 'Fakturadress',
      contact_title: 'Kontaktuppgifter',
      shopping_cart_title: 'Din varukorg',
      single_product: '',
      vat: '',
      product_storage_id: '',
      first_name: '',
      last_name: '',
      customer_address: '',
      postal_code: '',
      city: '',
      email: '',
      phone: '',
      customer_password: '',
      checkbox: 'Yes',
      //label text
      first_name_text: 'Förnamn',
      last_name_text: 'Efternamn',
      customer_address_text: 'Adress',
      postal_code_text: 'Postnummer',
      city_text: 'Stad',
      email_text: 'Mejladress',
      phone_text: 'Telefonnummer',
      customer_password_text: 'Lösenord',
      customer_number: '',
    
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


      create_order() {
        axios.post('http://localhost/Examensarbete/schoolflow/checkout', {
          customer_id: this.customer_number,
          product_id: this.product_storage_id
      }).then(response => {
        response
      })
         console.log('fungerar')
      },


    create_customer() {

      axios.post('http://localhost/Examensarbete/schoolflow/customer', {
        customer_id: this.customer_number,
        first_name: this.first_name,
        last_name: this.last_name,
        customer_address: this.customer_address,
        postal_code: this.postal_code,
        city: this.city, 
        email: this.email,
        phone: this.phone, 
        customer_password: this.customer_password,
      }).then(response => {
     
        response
        this.create_order()
        this.removeLocalStorage() 
        
      }).catch(error => {
        this.response = 'Error: ' + error.response.status
      })

   
    },

      order () {
        this.create_customer()
         this.visible = !this.visible
      },

      customer_num(){
        let c_number = Math.ceil(Math.random()*100000)
        this.customer_number = c_number
        console.log(this.customer_number);
      },

   },
   
   mounted(){
          this.getLocalStorage() 
           this.fetch_single_product()
           this.customer_num();
   }
}
</script>
