<template>
  <div class="courses page">
    <div class="subject-paths-wrapper">
      <div v-for="course in courses" :key="course">
          <router-link class="subject-path" :class="course.class" :to="course.path">{{ course.name }}</router-link>
      </div>
    </div>
    <div class="title">{{ course_title }}</div>
    <div class="sub-title">{{ course_sub_title }}</div>
    <div class="info-wrapper" v-for="course in courses_info" :key="course">
      <img class="info-image" :src="course.image" :alt="course.image">
      <div class="info-text">{{ course.text }}</div>
    </div>
    <div class="subjects-content">
      <div class="subject-title">{{ subject_title }}</div>
      <div class="subjects-wrapper">
        <div v-for="subject in subjects" :key="subject">
          <router-link class="subject" :to="subject.path" >{{ subject.name }}</router-link>
        </div>
      </div>
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
      course_title: 'Årskurs 2', 
      course_sub_title: 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros.',
      
      courses: [
        {
          path: '/arskurs-1',
          name: 'Årskurs 1', 
          class: ''
        },
        {
          path: '/arskurs-2',
          name: 'Årskurs 2', 
          class: 'border highlite'
        },
         {
          path: '/arskurs-3',
          name: 'Årskurs 3',
          class: ''
        }
      ],

      courses_info: [
        {
          image: require('../../assets/images/subjects/english.png'),
          text: 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.'

        }
      ],
      subject_title: 'Vilka ämnen finns för årskurs 1 på Scoolflow?',
      subjects: [
        {
          path: '/svenska', 
          name: 'Svenska'
        },
        {
          path: '/matte', 
          name: 'Matte'
        },
        {
          path: '/engelska', 
          name: 'Engelska'
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