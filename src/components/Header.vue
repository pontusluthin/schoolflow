<template>
<div>
  <header class="header">
    
    <img class="schoolflow-logo" src=".././assets/schoolflow_logo.png" alt="">
    
    <div class="menu-button-wrapper cart">
      <div class="menu-button-name" >{{ shopping_cart }}</div>
      <font-awesome-icon class="menu-button cart" icon="shopping-cart" />
    </div>

    <div class="menu-button-wrapper log-in">
      <div class="menu-button-name" >{{ log_in }}</div>
      <font-awesome-icon class="menu-button log-in" icon="key" />
    </div>

    <font-awesome-icon class="menu-button" @click.prevent="openMenu" icon="bars" :class="{ 'hide-button' : isMobileMenuActive }"/>
    <font-awesome-icon @click.prevent="closeMenu" icon="times-circle" class="close-menu-button" :class="{ 'hide-button' : !isMobileMenuActive }"/>
 </header>
    <nav class="menu" :class="{ 'show-menu' : isMobileMenuActive }">
      <a href="" class="log-in-menu-button">{{ log_in }}</a>
      <ul class="parent-list">
        <li v-for="(link, index) in links" :key="link" @click="collapseItem(index, link)" class="item">      
          <router-link :to="link.path" id="parent-link">
          <p class="item-name">
            {{ link.link_title }}
            <font-awesome-icon icon="plus" class="parent-link-icon" :class="{'hide-button' : openedItems[index] }" />
            <font-awesome-icon icon="minus" class="parent-link-icon" :class="{'hide-button' : !openedItems[index] }" />
          </p>
          <transition name="slide-fade">
            <ul class="child-items" v-if="openedItems[index]" id="child-link">
              <li class="child-item" v-for="child in link.children" :key="child" @click.prevent="closeMenu">
                <router-link :to="child.path" @click.stop>
                  {{child.link_title}}
                </router-link>
              </li>
            </ul>
          </transition>
          </router-link>
        </li> 
      </ul>
    </nav>
    
  </div>
</template>
<script>
export default {
  data() {
    return {
      shopping_cart: 'Varukorg', 
      log_in: 'Logga in', 
      isMobileMenuActive: false,
      openedItems: {},
      links: [
       {
          path: '/prenumerationer',
          link_title: 'Prenumerationer'
       },
       {
          path: '',
          link_title: 'Årskurser',
          children: [
            {
              path: 'Arskurs1',
              link_title: 'Årskurs 1'
            },
            {
              path: 'Arskurs2',
              link_title: 'Årskurs 2'
            },
            {
              path: 'Arskurs3',
              link_title: 'Årskurs 3'
            }
          ]
       },
       {
          path: '',
          link_title: 'Ämnen',
          children: [
            {
              path: '/svenska',
              link_title: 'Svenska'
            },
            {
              path: '/engelska',
              link_title: 'Engelska'
            },
            {
              path: '/matte',
              link_title: 'Matte'
            }
          ]
       },
       {
          path: '/om-oss',
          link_title: 'Om oss'
       },
       {
          path: '/kontakt',
          link_title: 'Kontakt'
       }
      ]
    }
  },
  methods: {
    openMenu: function() {
      this.isMobileMenuActive = !this.isMobileMenuActive
    },
    closeMenu: function() {
     this.isMobileMenuActive = false
    },
    collapseItem(index, link) {

      if (link.children != null) {
        this.openedItems[index] = !this.openedItems[index]
        this.$forceUpdate()
      }

    }
  }
}
</script>