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
          <div class="mail">Vi kommer strax att skicka en beställningsbekräftelse till: {{ email }} </div>
          <div class="support">Har du några frågor redan nu är du varmt välkommen att höra av dig till: support@schoolflow.se</div>
          <router-link  @click.prevent="close_modal" to="/" class="button">Stäng fönster</router-link>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
import emailjs from 'emailjs-com';
import moment from 'moment';
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
      order_number:'',
      product_price: '',
      pay_date: '',
      ocr: '',
    
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
      .then((response) => {
        this.single_product = response.data 
        this.product_price = response.data.month_price
        })
        
    },

    removeLocalStorage() {
       localStorage.removeItem('product')
          this.getLocalStorage() 
          this.fetch_single_product() 
      
    },

  
    sendEmail () {

        var template_params = {
        "email": this.email,
        "order_number": this.order_number,
        "name": this.first_name,
        "price": this.product_price,
        "pay_date": this.pay_date,
        "ocr": this.ocr
      }

      var service_id = "default_service";
      var template_id = "schoolflow_9PK785";
        var user_id = "user_tJCMWjj0XtJIVRg6sT9S5";
       
      emailjs.send(service_id, template_id, template_params, user_id)
        .then((response) => {
            console.log('SUCCESS!', response.status, response.text);
        }, (error) => {
            console.log('FAILED...', error);
        });
    },

      create_order() {
        axios.post('http://localhost/Examensarbete/schoolflow/checkout', {
          order_id: this.order_number,
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
        this.sendEmail()
        
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
      },

      order_num(){
        let o_number = Math.ceil(Math.random()*100000)
        this.order_number = o_number
      },

      ocr_num() {
      let ocr_number = Math.ceil(Math.random()*100000000000)
      this.ocr = ocr_number
      },

      last_pay_date() {
        let date = moment().add(30, 'days').calendar();  
        this.pay_date = date;

      }
   },
   
   mounted(){
    this.getLocalStorage() 
    this.fetch_single_product()
    this.customer_num();
    this.order_num();
    this.ocr_num();
    this.last_pay_date();
   }
}
</script>
