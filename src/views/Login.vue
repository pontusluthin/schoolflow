<template>
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
  </div>
</template>
<script>
import axios from 'axios';
import router from '../router/index';


export default {
  data () {
    return {
      login_title: 'Logga in',
      username_title: 'Användarnamn', 
      password_title: 'Lösenord', 
        email: '',
        customer_password: ''
      
    }
  },
  methods: {

    /*login() {

      axios.post('http://localhost/Examensarbete/schoolflow/login/', this.logindetails)
      .then(response =>  {
        console.log(response) 
      })
      
      console.log(this.email)
      console.log(this.customer_password)
    },*/

    /*login() {
        const session_url = 'http://localhost/Examensarbete/schoolflow/login/'
        var email = this.email
        var customer_password = this.customer_password
        axios({
            method: 'get',
            url: session_url,
            auth: {
              email: email,
              customer_password: customer_password
            }
        })
        .then(response => {
          console.log('Authenticated')
          console.log(response.data)
          /*this.$store.dispatch('signin', response.data)*/
        /*}).catch(error => {
          console.log('Error on Authentication')
          this.error = error
          console.log(error)
        });*/
    
    login () {    
       
                 
                let email = this.email   
                let customer_password = this.customer_password    
              
                let login = () => {    
                    let data = {    
                        email: email,    
                        customer_password: customer_password    
                    }    
                    axios.post("http://localhost/Examensarbete/schoolflow/login/", data)    
                        .then((response) => {    
                            console.log("Logged in", response)    
                            router.push("/betalning")    
                        })    
                        .catch((errors) => {    
                            console.log("Cannot log in")    
                            console.log(errors)
                        })   
                }    
                login()    
    }
    }
  }

</script>