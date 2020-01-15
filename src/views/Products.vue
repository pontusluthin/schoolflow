<template>
  <div class="products page">
   
    <div class="title">{{ title }}</div>
    <div class="sub-title">{{ sub_title }}</div>

    
      <div class="product-content" v-for="product in all_products" :key="product">
        <div class="product-title">{{ product.title }}</div>
        <div class="product-wrapper">
          <div v-for="product in product.product" :key="product">
            <div class="product-text">{{ product.text }}</div>
            <div class="buy-buttons">
              <div :class="product.class">{{ product.month }}</div>
              <div class="product-year">{{ product.year }}</div>
            </div>
            <div class="usp-content">
              <div class="usp-title"> {{ product.usp_title }} </div>
              <div class="usp-wrapper">
                <div v-for="usp in product.usps" :key="usp">
                  <div class="usp-text" ><font-awesome-icon  class="usp-icon" :icon="usp.check_icon" />{{ usp.text }}</div>
                </div>
              </div>
            </div>
          </div>
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
          product: [
            {
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
              month: 'Per månad',
              class: 'product-month',
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
          product: [
            {
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
              month: 'Per månad',
              class: 'product-month',
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
