<!-- COURCE THREE COMPONENT -->

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
        course_title: 'Årskurs 3', 
        course_sub_title: 'Vår framtid ligger i deras händer!',
        
        courses: [
          {
            path: '/arskurs-1',
            name: 'Årskurs 1', 
            class: ''
          },
          {
            path: '/arskurs-2',
            name: 'Årskurs 2', 
            class: 'border'
          },
          {
            path: '/arskurs-3',
            name: 'Årskurs 3',
            class: 'highlite'
          }
        ],

        courses_info: [
          {
            image: require('../../assets/images/subjects/english.png'),
            text: 'Åk 3 är slutmålet för den första delen av grundskolan. Schoolflow kommer säkerhetsställa att eleven avslutar åk 3 mot de kraven som kommer från skolverket. Är det någon som ligger före eller till och med efter är Schoolflow rätt plattform de eleverna. Det finns inte den eller dom, hos oss är det vi!'
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
                text: 'Svenska, engelska och matematik'
              },
              {
                icon: 'check',
                text: 'Kunskapskontroller som skapas av läraren eller befintliga som är skapade utifrån skolverkets riktlinjer'
              },
              {
                icon: 'check',
                text: 'Tidsräkning, ha koll på hur lång tid det ta för eleverna att genomföra en uppgift.'
              }
            ],
            second_row: [
              {
                icon: 'check',
                text: 'Över 650 övningar, spel och lekar som främjar lärande och gör det roligare.'
              },
              {
                icon: 'check',
                text: 'Kan anpassas för en skola om det finns fler klasser av samma årskurs'
              },
              {
                icon: 'check',
                text: 'Skapa mindre tester för att säkerhetsställa så att eleven lär sig i rätt takt'
              }
            ],
            third_row: [
              {
                icon: 'check',
                text: 'Bra hjälpmedel som beskriver varje övning och vad för syfte den har'
              },
              {
                icon: 'check',
                text: 'Allt är baserat på kunskapskraven från skolverket'
              },
              {
                icon: 'check',
                text: 'Läraren ska kunna utgå från plattformen och inte använda den som ett extra verktyg som minskar tiden med eleverna'
              }
            ]
          }
        ]
      }
    }
  }
</script>

<!-- COURCE THREE COMPONENT END -->