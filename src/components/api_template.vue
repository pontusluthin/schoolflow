<template>
  <div class="hello">
    <h2 class="test">{{ all_products_title }}</h2>
    <!-- Visar alla produkter -->
    <div v-for="product in all_products.data" :key="product" style="background-color:white">
      {{ product.product_name }}
      {{ product.product_price }}
      {{ product.description }}
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
      <form>
        <label>Product Name</label>
        <input type="text" name="product_name" v-model="product_name">
        <br>
        <label>Product Price</label>
        <input type="text" name="product_price" v-model="product_price">
        <br>
        <label>Description</label>
        <input type="text" name="description" v-model="description">
        <br>
        <input type="button" @click="create_product()" value="Skapa produkt">
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
      app: window.APP
    }
  }, 
  mounted() {
    //All products API
    axios
      .get('http://localhost/Examensarbete/schoolflow/php/components/products/api/read.php')
      .then(response => (this.all_products = response.data ))
      //Single Product API 
    axios 
      .get('http://localhost/Examensarbete/schoolflow/php/components/products/api/read_single.php?product_id=1')
      .then(response => (this.single_product = response ))
      
  },
  methods: {
    create_product: function () {

      let form_data = new form_data();

      form_data.append('prduct_name', this.product_name)
      form_data.append('product_price', this.product_price)
      form_data.append('description', this.description)

      let product = {};

      form_data.forEach(function(value,key){
        product[key] = value; 
      })

      axios ({
        method: 'post',
        url: ' http://localhost/Examensarbete/schoolflow/php/components/products/api/create.php',
        data: form_data, 
        config: {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        } 
      })
      .then(function() {
       
        app.product.push(product)
        app.reset_form();
      })
      .catch(function(){
        console.log("Produkt ej uppladdad")
      })
    },

    reset_form: function () {
      this.product_name = '',
      this.product_price = '',
      this.description = ''
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
