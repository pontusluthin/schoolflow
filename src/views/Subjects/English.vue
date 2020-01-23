<template>
  <div class="subject page">
    <div class="subject-paths-wrapper">
      <div v-for="subject in subjects" :key="subject">
          <router-link class="subject-path" :class="subject.class" :to="subject.path">{{ subject.name }}</router-link>
      </div>
    </div>
    <div class="title">{{ subject_title }}</div>
    <div class="sub-title">{{ subject_sub_title }}</div>
    <div class="info-wrapper" v-for="subject in subjects_info" :key="subject">
      <img class="info-image" :src="subject.image" :alt="subject.image">
      <div class="info-text">{{ subject.text }}</div>
    </div>
    <div class="usp-wrapper" v-for="usps in usps" :key="usps">
      <div class="usp-section">
        <div v-for="usp in usps.first_row" :key="usp">
          <div class="usp-text"><font-awesome-icon class="usp-icon" :icon="usp.icon" />{{usp.text}}</div>
        </div>
      </div>
      <div class="usp-section border">
        <div v-for="usp in usps.second_row" :key="usp">
          <div class="usp-text"><font-awesome-icon class="usp-icon" :icon="usp.icon" />{{usp.text}}</div>
        </div>
      </div>
      <div class="usp-section">
        <div v-for="usp in usps.third_row" :key="usp">
          <div class="usp-text"><font-awesome-icon class="usp-icon" :icon="usp.icon" />{{usp.text}}</div>
        </div>
      </div>
    </div>
    <router-link class="offers-button" to="/priser">Till våra paket</router-link>
  </div>
</template>
<script>
export default {
  data () {
    return {
      subject_title: 'Engelska', 
      subject_sub_title: 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
      
      subjects: [
        {
          path: '/svenska',
          name: 'Svenska', 
          class: ''
        },
        {
          path: '/matte',
          name: 'Matte', 
          class: 'border'
        },
         {
          path: '/engelska',
          name: 'Engelska',
          class: 'highlite'
        }
      ],

      subjects_info: [
        {
          image: require('../../assets/images/subjects/english.png'),
          text: 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.'

        }
      ],
      usps: [
        {
          first_row: [
            {
              icon: 'check',
              text: 'Euismod Ornare Vulputate'
            },
            {
              icon: 'check',
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur.'
            },
            {
              icon: 'check',
              text: 'Adipiscing Ornare Tristique Bibendum Sollicitudin'
            }
          ],
           second_row: [
            {
              icon: 'check',
              text: 'Euismod Ornare Vulputate'
            },
            {
              icon: 'check',
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur.'
            },
            {
              icon: 'check',
              text: 'Adipiscing Ornare Tristique Bibendum Sollicitudin'
            }
          ],
           third_row: [
            {
              icon: 'check',
              text: 'Euismod Ornare Vulputate'
            },
            {
              icon: 'check',
              text: 'Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Aenean lacinia bibendum nulla sed consectetur.'
            },
            {
              icon: 'check',
              text: 'Adipiscing Ornare Tristique Bibendum Sollicitudin'
            }
          ]
        }
      ]
    }
  }
}
</script>