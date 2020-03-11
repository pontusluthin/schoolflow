<!-- PAGE FOOTER -->

<template>
  <footer class="footer">
    <BackToTop visibleoffset="50" bottom="50px" right="50px">
    <div class="back-to-top-wrapper">
      <font-awesome-icon icon="arrow-circle-up" class="back-to-top-icon"/>
      {{ back_to_top_button }}
    </div>
    </BackToTop>
    <ul class="contact-info-wrapper">
      <li class="contact-info">
        <img class="schoolflow-footer-logo" src=".././assets/schoolflow_logo.png" alt="">
      </li>
      <li v-for="c_info in contact_info " :key="c_info" class="contact-info">
        {{ c_info.info }}
      </li>
    </ul>
    <div class="copyright-info">{{ copyright_info }}</div>
    <ul class="footer-menu">
      <li v-for="link in links" :key="link">
        <router-link :to="link.path">{{ link.link_title }}</router-link>
      </li>
    </ul>
  </footer>
</template>
<script>
  import BackToTop from 'vue-backtotop'
  export default {
    data() {
      return {
        contact_info: [
          {
            info: '073-831 44 44'
          },
          {
            info: 'kontakt@schoolflow.se'
          }
        ],
        copyright_info: '© Copyright Schoolflow AB 2019',
        links: [
          {
            path: '/prenumerationer',
            link_title: 'Prenumerationer'
          },
          {
            path: '/arskurser',
            link_title: 'Årskurser',
          },
          {
            path: '/amnen',
            link_title: 'Ämnen',
          },
          {
            path: '/om-oss',
            link_title: 'Om oss'
          }
        ],
        back_to_top_button: 'Tillbaka till toppen'
      }
    }, 
    components: { BackToTop }
  }
</script>

<!-- PAGE FOOTER END -->