<template>
  <div class="customer page">
    <div>
    <div class="title">Översikt för {{ user_data.first_name }}</div>

  
    <div class="customer-info-wrapper">
      <div class="customer-name">
       {{ user_data.first_name}} {{ user_data.last_name }}
      </div>
      <div class="customer-address">
        <div>{{ user_data.customer_address }}</div>
        <div>{{ user_data.postal_code }}</div>
        <div>{{ user_data.city }}</div>
      </div>
      <div class="customer-contact">
        <div>{{ user_data.email }}</div>
        <div>{{ user_data.phone }}</div>
      </div>
    </div>
    <form class="change-form">
      <div class="form_title">Fakturaadress</div>
      <div>
      <input class="field" type="text" v-model="user_data.email">
      </div>
      <input type="submit" @click.prevent="save_email(user_data.customer_id)" class="save-button" value="Spara">
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
      <div class="name">Paket {{ user_data.name}}</div>
      <div class="price">{{ user_data.month_price }} SEK/månad</div>
      <div class="notice">1 månads uppsägningstid</div>
      <div class="change-button">Ändra paket</div>
      <div class="notice-button">Säg upp prenumeration</div>
    </div>
    <div class="order-history-section">
      <div class="title">Orderhistorik</div>
      <div class="wrapper">
        <div class="name">{{ user_data.order_id }}</div>
        <div class="name">Paket {{ user_data.name }}</div>
        <div class="price">{{ user_data.month_price }} SEK/månad</div>
        <div class="date">{{ user_data.date.slice(0,10) }}</div>
      </div>
    </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';

export default {
  data() {
    return {
      user_data: null,
      email: '',
      user_id: '',
    }
  },

  methods: {
    fetch_single_customer: function () {
       axios 
      .get(`http://api.schoolflow.pontusluthin.se/customer/?email=${this.email}`)
      .then((response) => {
        this.user_data = response.data 
        })
    },

    update_customer_email: function () {

       let email = this.new_email   
       let customer_id = this.user_id

       
      let customer_email = () => {    
                    let data = {    
                        email: email,    
                        customer_id: customer_id  
                    }    
                    axios.put("http://api.schoolflow.pontusluthin.se/customer/", data)    
                        .then((response) => {    
                            console.log("Email är uppdaterad", response)  
                          
                        })    
                        .catch((errors) => {    
                            console.log("Email är inte uppdaterad")    
                            console.log(errors)
                        })   
                }  
                customer_email()  
    },

      save_email: function (customer_id) {
      this.user_id = customer_id
     console.log(this.user_id)
     this.update_customer_email()
    }
  },



  mounted() {
    this.email = this.$route.params.email
    this.fetch_single_customer()
   
  }
}
</script>