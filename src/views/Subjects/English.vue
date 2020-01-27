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
      subject_sub_title: 'Att behärska internationell kommunikation är ett måste för framtiden.',
      
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
          text: 'I ämnet engelska så lär sig eleven att både läsa och lyssna för att så småningom kunna börja kommunicera via engelska. Det är allt från glosor till enklare samtal, dialoger och meningsbyggnader'

        }
      ],
      usps: [
        {
          first_row: [
            {
              icon: 'check',
              text: 'Bra förklaringar till varje övning och moment för att eleven lätt skall kunna förstå'
            },
            {
              icon: 'check',
              text: 'Meningsuppbyggnad'
            },
            {
              icon: 'check',
              text: 'Uttal'
            }
          ],
           second_row: [
            {
              icon: 'check',
              text: 'Grundpriciperna: tala, skriva och läsa'
            },
            {
              icon: 'check',
              text: 'Stavningsregler'
            },
            {
              icon: 'check',
              text: 'Glosövningar för att lätt kunna lära sig orden på engelska från svenska'
            }
          ],
           third_row: [
            {
              icon: 'check',
              text: 'Över 150 olika övningar, allt från memory till att skriva hela meningar'
            },
            {
              icon: 'check',
              text: 'Ordförråd'
            },
            {
              icon: 'check',
              text: 'Videor som instruerar korrekt uttal'
            }
          ]
        }
      ]
    }
  }
}
</script>