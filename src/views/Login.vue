<!-- LOGIN COMPONENT -->

<template>
  <div class="login-body">
    <div class="login page">
      <div class="login-title">{{ login_title }}</div>
      <form>
        <div class="field-wrapper">
          <label class="login-sub-title">{{ username_title }}</label>
          <input type="text" class="field" v-model="email"> 
        </div>
        <div class="field-wrapper">
          <label class="login-sub-title">{{ password_title }}</label>
          <input type="password" class="field" v-model="customer_password">
        </div>
        <input type="submit" class="login-submit-buttom"  @click.prevent="login" value="Logga in">
      </form>
        <div v-if="error_msg" class="error-bg-overlay"> </div>
        <div v-if="error_msg" class="error-modal">
          {{error_msg}}
          <div class="close-modal-button" @click.prevent="closeModal" v-if="error_msg">OK</div>
        </div>
    </div>
  </div>
</template>
<script>
  import axios from 'axios';

  export default {
    data () {
      return {
        login_title: 'Logga in',
        username_title: 'Användarnamn', 
        password_title: 'Lösenord', 
          email: '',
          customer_password: '',
          error_msg: ''
      }
    },
    methods: {

      //Login function
      login () {
        let email = this.email
        let customer_password = this.customer_password
        let login = () => {
          let data = {
            email: email,
            customer_password: customer_password
          }
          
          //Post request to REST API
          axios.post("http://api.schoolflow.pontusluthin.se/login/", data)
            .then((response) => {
              console.log("Logged in", response)
              this.$router.push({
                name: "customer_login",
                params: {
                  email: this.email
                }
              })  
            })    
            .catch((errors) => {
              // Error message if login details is wrong
              this.error_msg = 'Ajdå! Något gick visst lite fel... användarnamnet eller lösenordet är felaktigt, försök igen'
              console.log("Cannot log in")
              console.log(errors)
            })
        }    
        login()
      },

      // Function to close error message modal
      closeModal: function() {
        this.error_msg = ''
      }
    }
  }
</script>

<!-- LOGIN COMPONENT END -->