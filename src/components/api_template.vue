<template>
  <div class="hello">
    <h2 class="test">{{ all_products_title }}</h2>
    <!-- Visar alla produkter -->
    <div v-for="product in all_products.data" :key="product" style="background-color:white">
      {{ product.product_name }}
      {{ product.product_price }}
      {{ product.description }}
      <button @click="delete_product(product)">Delete {{ product.product_id }}</button>
       <button @click="update_product()">Edit</button>
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
      .get('http://localhost/Examensarbete/schoolflow/php/components/products/api/read.php')
      .then(response => (this.all_products = response.data ))
      .then(response => {
                  this.products = response.data;
              })
    },

    fetch_single_product: function () {
       axios 
      .get('http://localhost/Examensarbete/schoolflow/php/components/products/api/read_single.php?product_id=3')
      .then(response => (this.single_product = response ))
      
    },

      create_product() {
      axios.post('http://localhost/Examensarbete/schoolflow/php/components/products/api/create.php', {
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

      axios.put(' http://localhost/Examensarbete/schoolflow/php/components/products/api/update.php', {params: {product_id:this.product_id}})
      .then((response) => {
        console.log(response)
      })
      let product_test = {'product_name': this.product_name, 'product_price': this.product_price, 'description': this.description}
      console.log(product_test)
  // console.log(obj)
    },
    delete_product() {
      axios.delete('http://localhost/Examensarbete/schoolflow/php/components/products/api/delete.php',  {params: 3})
      .then(response => 
      {       console.log("Product id " , response.data)
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
