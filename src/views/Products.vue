<template>
  <div class="products page">
   
    <div class="title">{{ title }}</div>
    <div class="sub-title">{{ sub_title }}</div>

    <div class="product-flex">
      <div class="product-content" v-for="p in products_content.data.slice(0,4)" :key="p">
        <div class="product-title"> {{ p.name }}</div>
        <div class="product-wrapper" >
          <div class="flex-wrapper">
            <div class="product-text">{{ p.description }}</div>
            <div class="price-wrapper">
              <div class="product-price" v-if="p.month_price">Per månad<span class="price">{{ p.month_price }}</span><span class="country">KR</span></div>
            </div>
            <div class="buy-buttons">
              <div class="product-year" @click.prevent="addProduct(p.product_id)">Beställ</div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="usp-content">
        <div class="usp">
         <!-- <div v-for="usp in usps.product" :key="usp">
              
              <div class="usp-title"> {{ usp.usp_title }} </div>
                <div class="usp-wrapper">
                  <div v-for="uspKey in usp.usps" :key="uspKey">
                    <div class="usp-text" ><font-awesome-icon  class="usp-icon" :icon="uspKey.check_icon" />{{ uspKey.text }}</div>
                  </div>
                </div>
           
          </div>-->
        </div>
      </div>
  </div>
</template>

<script>
// @ is an alias to /src
//import HelloWorld from '@/components/HelloWorld.vue'
import axios from 'axios';
export default {
  name: 'home',
  components: {
    
  },
  data() {

    return {
      products_content: null,
      title: 'Prenumeration',
      sub_title: 'Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.',
     
    }
  },

  methods: {

    fetch_products: function () {
    axios
    .get('http://localhost/Examensarbete/schoolflow/api')
    .then(response => (this.products_content = response.data))
    },

    addProduct(product_id){    
      localStorage.setItem('product', product_id)
      
    },

    getStorage(){
      let storage = localStorage.getItem('product')
      console.log(storage)
    }
   
  },
   mounted() {
  
        this.fetch_products();
        this.getStorage();
    }
}
</script>
