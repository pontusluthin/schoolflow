<!-- SUBJECT: SWEDISH COMPONENT-->

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
        subject_title: 'Svenska', 
        subject_sub_title: 'Lärande i det svenska språket.',
        
        subjects: [
          {
            path: '/svenska',
            name: 'Svenska', 
            class: 'highlite'
          },
          {
            path: '/matte',
            name: 'Matte', 
            class: 'border'
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
            text: 'Svenska är vårt grundläggande språk och lägger en grund för elvens framtida utveckling. Här kommer eleven att få spela ordlekar, skriva meningar, lära sig orklasser. Allt som är grunden för att eleven skall kunna behärska det svenska språket.'
          }
        ],
        usps: [
          {
            first_row: [
              {
                icon: 'check',
                text: 'Ordförråd'
              },
              {
                icon: 'check',
                text: 'Olika övningar för att stimulera lärandet'
              },
              {
                icon: 'check',
                text: 'Meningsuppbyggnad'
              }
            ],
            second_row: [
              {
                icon: 'check',
                text: 'Automatisk stavningskontroll stavningskontroll'
              },
              {
                icon: 'check',
                text: ' Ändelser/böjning av ord'
              },
              {
                icon: 'check',
                text: 'Över 200 olika övningar i all årskurser'
              }
            ],
            third_row: [
              {
                icon: 'check',
                text: 'Språkbruk'
              },
              {
                icon: 'check',
                text: 'Skapa unika anpassade övningar för elever eller klass'
              },
            
            ]
          }
        ]
      }
    }
  }
</script>

<!-- SUBJECT: SWEDISH COMPONENT END -->