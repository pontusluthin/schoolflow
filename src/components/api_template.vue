<template>
  <div class="hello">
    <h2 class="test">{{ all_products_title }}</h2>
    <!-- Visar alla produkter -->
        <!-- Skriv så @click = "delete_product(product.product_id)" som nedan
      som jag sa att delete_product() anropas direkt var inte rätt i denna sammanhang.
      click anropar delete_product(product.product_id) det. -->
    <div v-for="product in all_products.data" :key="product" style="background-color:white">
      {{ product.product_name }}
      {{ product.product_price }}
      {{ product.description }}
      <button @click="delete_product(product.product_id)">Delete {{ product.product_id }}</button>
       <button @click="update_product(product.product_id)">Edit</button>
    </div>
 
    <!-- Visar en produkt-->
    <h2>{{ single_product_title }}</h2>
    <div style="background-color:white;">
      {{ single_product.data.product_name }}
      {{ single_product.data.product_price }}
      {{ single_product.data.description }}
    </div>

     <h2>{{ create_product_title }}</h2>
    <div style="background-color:white;">
      <form @submit.prevent="create_product">
        <label>Product Name</label>
        <input type="text" name="product_name" v-model="product_name">
        <br>
        <label>Product Price</label>
        <input type="text" name="product_price" v-model="product_price">
        <br>
        <label>Description</label>
        <input type="text" name="description" v-model="description">
        <br>
        <input type="submit" value="Skapa produkt">
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      all_products_title: 'All Products',
      all_products: null,
      single_product_title: 'Single Product',
      single_product: null, 
      create_product_title: 'Create Product', 
      product_name: "",
      product_price: "",
      description: "", 
      product_id: "",
      products: []
    }
  }, 
 
  methods: {

    fetch_products: function () {
      axios
      .get('http://localhost/Examensarbete/schoolflow/api')
      .then(response => (this.all_products = response.data ))
      .then(response => {
                  this.products = response.data;
              })
    },

    fetch_single_product: function () {
       axios 
      .get('http://localhost/Examensarbete/schoolflow/api/?product_id=3')
      .then(response => (this.single_product = response ))
     
      
    },

      create_product() {
      axios.post('http://localhost/Examensarbete/schoolflow/api', {
        product_name: this.product_name,
        product_price: this.product_price,
        description: this.description
      }).then(response => {
     
        response
        this.fetch_products();
      }).catch(error => {
        this.response = 'Error: ' + error.response.status
      })
      this.product_name = '';
      this.product_price = '';
      this.description = '';
    },

    update_product() {
      let product_test = {'product_name': this.product_name, 'product_price': this.product_price, 'description': this.description}
      console.log(product_test)
  // console.log(obj)
    },
    //ändra delete_product(this.product_id)
    //url med $product_id ( js string literal)
    delete_product(product_id) {
      console.log(product_id)
      axios.delete(`http:localhost/Examensarbete/schoolflow/api/${product_id}`)
      .then(response => 
      {       console.log(response)
                this.fetch_products();
            }
           
      )      
    }
  },
   mounted() {
    //All products API
    
  this.fetch_products();
      //Single Product API 
   this.fetch_single_product();
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
