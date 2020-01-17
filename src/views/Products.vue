<template>
  <div class="products page">
   
    <div class="title">{{ title }}</div>
    <div class="sub-title">{{ sub_title }}</div>

    <div class="product-flex">
      <div class="product-content" v-for="products in all_products" :key="products">
        <div class="product-title" :class="products.class">{{ products.title }}</div>
        <div class="product-wrapper" :class="products.class">
          <div class="flex-wrapper" v-for="product in products.product" :key="product">
            <div class="product-text">{{ product.text }}</div>
            <div class="price-wrapper">
              <div class="product-price">{{ product.per_month_title }}<span class="price">{{ product.price_month }}</span><span class="country">{{ product.price_country_month }}</span></div>
              <div class="product-price">{{ product.per_year_title }}<span class="price">{{ product.price_year }}</span><span class="country">{{ product.price_country_year }}</span></div>
            </div>
            <div class="buy-buttons">
              <div :class="product.class">{{ product.month }}</div>
              <div class="product-year">{{ product.year }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="usp-content">
        <div class="usp" v-for="usps in all_products" :key="usps">
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

export default {
  name: 'home',
  components: {
    
  },
  data() {

    return {
      title: 'Prenumeration',
      sub_title: 'Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper.',
      all_products: [
        {
          title: 'Prova på', 
          open_icon: 'plus',
          close_icon: 'minus',
          product: [
            {
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
              month: 'Prova på i 30 dagar',
              class: 'product-month first',
              year: 'Börja nu', 
              usp_title: 'Detta ingår:',
              usps: [
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                }
              ]
            }
          ]
        },
        {
          title: 'Liten', 
          open_icon: 'plus',
          close_icon: 'minus',
          class: 'second-border',
          product: [
            {
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
              month: 'Per månad',
              class: 'product-month',
              per_month_title: 'Per månad:',
              price_month: '89',
              price_country_month: 'kr',
              per_year_title:'Helår:',
              price_year: '999',
              price_country_year: 'kr',
              year: 'Helår', 
              usp_title: 'Detta ingår:',
              usps: [
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                }
              ]  
            }
          ]
        },
        {
          title: 'Mellan', 
          open_icon: 'plus',
          close_icon: 'minus',
          class: 'third-border',
          product: [
            {
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
              month: 'Per månad',
              class: 'product-month',
             per_month_title: 'Per månad:',
              price_month: '149',
              price_country_month: 'kr',
              per_year_title:'Helår:',
              price_year: '1299',
              price_country_year: 'kr',
              year: 'Helår', 
              usp_title: 'Detta ingår:',
              usps: [
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                }
              ]
            }
          ]
        },
        {
          title: 'Stor', 
          open_icon: 'plus',
          close_icon: 'minus',
          product: [
            {
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
              month: 'Per månad',
              class: 'product-month',
              per_month_title: 'Per månad:',
              price_month: '249',
              price_country_month: 'kr',
              per_year_title:'Helår:',
              price_year: '1999',
              price_country_year: 'kr',
              year: 'Helår', 
              usp_title: 'Detta ingår:',
              usps: [
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                },
                {
                  check_icon:  'check',
                  text: 'Cras mattis consectetur purus sit amet fermentum.'
                }
              ]
            }
          ]
        }
      ]
    }
  },

  methods: {
    
  },
}
</script>
