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
      <div>{{error_msg}}</div>
      <input type="submit" class="login-submit-buttom"  @click.prevent="login" value="Logga in">

    </form>
  </div>
</template>
<script>
import axios from 'axios';
import router from '../router/index';



export default {
  components: {
   
  },
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
                            router.push({
                              name: "customer_login",
                              params: {
                                email: 'test'
                              }
                            })  
                          
                        })    
                        .catch((errors) => {    
                            this.error_msg = 'Fel användarnamn eller lösenord, försök igen'
                            console.log("Cannot log in")    
                            console.log(errors)
                        })   
                }    
                login()    
    }
    }
  }

</script>