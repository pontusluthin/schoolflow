<template>
  <div class="customer page">
    <div class="title">Översikt för Pontus</div>

  
    <div class="customer-info-wrapper">
      <div class="customer-name">
       Pontus Luthin
      </div>
      <div class="customer-address">
        <div>Patron Pehrs Väg 1D</div>
        <div>141 35</div>
        <div>Huddinge</div>
      </div>
      <div class="customer-contact">
        <div>pontus.lut@gmail.com</div>
        <div>073-831 44 44</div>
      </div>
    </div>
    <form class="change-form">
      <div class="form_title">Fakturaadress</div>
      <div>
      <input class="field" type="text" value="pontus.lut@gmail.com">
      </div>
      <input type="submit" class="save-button" value="Spara">
      <div class="form_sub_title">Fakturan skickas ut den 20:e varje månad och skall vara betald senast den 28:e. </div>
    </form>
    <form class="change-customer-form">
      <div class="form-title">Ändra lösenord</div>
      <div class="sub-title">Nytt lösenord</div>
      <input  class="field" type="text">
      <div class="generate-password-button">Generera nytt lösenord</div>
      <div class="sub-title">Bekräfta lösenord</div>
      <input  class="field" type="text">
      <input type="submit" class="save-button" value="Spara">
    </form>
    
    <div class="customer-product-info">
      <div class="name">Paket Liten</div>
      <div class="price">89 SEK/månad</div>
      <div class="notice">1 månads uppsägningstid</div>
      <div class="change-button">Ändra paket</div>
      <div class="notice-button">Säg upp prenumeration</div>
    </div>
    <div class="order-history-section">
      <div class="title">Orderhistorik</div>
      <div class="wrapper">
        <div class="name">Paket liten</div>
        <div class="price">89 SEK/månad</div>
        <div class="date">2019-12-28</div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
  name: 'customer_login',
    props: ['userEmail'],
  data() {
    return {
      email: ''
    }
  },

  methods: {
    fetch_single_customer: function () {
       axios 
      .get('http://localhost/Examensarbete/schoolflow/customer/?email='+ this.email)
      .then((response) => {
        this.single_product = response.data 
        })
    },
  },

  mounted() {
    this.fetch_single_customer()
    console.log(this.userEmail)
  }
}
</script>