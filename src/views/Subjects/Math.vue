<!-- SUBJECT: MATH COMPONENT-->

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
        subject_title: 'Matematik', 
        subject_sub_title: 'Siffror, plus, minus, det är något som alla har nytta av.',
        
        subjects: [
          {
            path: '/svenska',
            name: 'Svenska', 
            class: ''
          },
          {
            path: '/matte',
            name: 'Matte', 
            class: 'border highlite'
          },
          {
            path: '/engelska',
            name: 'Engelska',
            class: ''
          }
        ],

        subjects_info: [
          {
            image: require('../../assets/images/subjects/english.png'),
            text: 'I ämnet matematik lär eleven sig att hantera de fyra olika grundläggande räknesätten, addition, subtration, multiplikation, division. Här finns spännande övningar anpassade för årskurs 1 - 3, allt ifrån att räkna hur många äpplen som existerar på marken till summan av olika större tal.'
          }
        ],
        usps: [
          {
            first_row: [
              {
                icon: 'check',
                text: 'De fyra räknesätten'
              },
              {
                icon: 'check',
                text: 'Huvudräkning'
              },
              {
                icon: 'check',
                text: 'Strategier'
              }
            ],
            second_row: [
              {
                icon: 'check',
                text: ' Problemlösning'
              },
              {
                icon: 'check',
                text: 'Deltester och större slutprov'
              },
              {
                icon: 'check',
                text: 'Över 300 olika övningar i alla dess former'
              }
            ],
            third_row: [
              {
                icon: 'check',
                text: 'Målbild för vad eleven skall klara av'
              },
              {
                icon: 'check',
                text: 'Bra förklaringar till varje moment och övning'
              },
              {
                icon: 'check',
                text: 'Anpassad miljö för varje klass eller elev'
              }
            ]
          }
        ]
      }
    }
  }
</script>
<!-- SUBJECT: ENGLISH COMPONENT END -->