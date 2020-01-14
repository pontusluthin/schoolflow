<template>
  <div class=" startpage page">
    <div class="banner-title">{{ banner_title }}</div>
    <div class="banner-sub-title">{{ banner_sub_title }}</div>
    <router-link class="learn-more-button" :to="learn_more_link"> {{ learn_more }}</router-link> 
    <div class="course-content">
      <div class="course-wrapper" v-for="course in courses" :key="course">
        <img :src="course.image" :alt="course.image" class="course-image">
        <div class="course-title">{{ course.title }}</div>
        <div class="course-text">{{ course.text }}</div>
        <div class="course-checkpoints-wrapper">
          <div v-for="checkpoint in course.checkpoints" :key="checkpoint">
          <div class="course-checkpoint"><font-awesome-icon class="checkpoint-icon" :icon="checkpoint.icon" />
  {{ checkpoint.text }}</div>
        </div>
        </div>
        <router-link class="read-more-button" :to="course.path">{{ read_more }}</router-link>
      </div>
    </div>
    <div class="schoolflow-video">
      <div class="video-title">{{ video_title }}</div>
      <div class="video-wrapper">
        <img class="video-image" :src="video_image" :alt="video_image">
        <img  class="video" :src="video_path" :alt="video_path">
      </div>
    </div>
    <div class="usp-title">{{ usp_title }}</div>
    <div class="usps-content">
      <div class="usp-wrapper" :class="usp.class" v-for="usp in usps" :key="usp">
        <img class="usp-image"  :src="usp.image" :alt="usp.image">
        <div class="usp-text" :class="usp.class" >{{ usp.text }}</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      banner_title: 'Lär dig mer, något nytt eller spela för att det är kul',
      banner_sub_title: 'Schoolflow är digital plattform för elever och lärare i årskurs F-3 som fokuserar på att vidareutveckla elevernas fantastiska kunskaper, minska dokumentationen för lärare och hjälpa de elever som behöver extra stöd', 
      learn_more: 'Lär dig mer', 
      learn_more_link: '/kurser', 
      read_more: 'Läs mer',
      courses: [
        {
          image: require('../assets/images/swedish.png'),
          title: 'Svenska',
          text: 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper.',
          path:'/svenska',
          checkpoints: [
            {
              icon: 'check',
              text: 'Purus Etiam Risus Lorem'
            },
            {
              icon: 'check',
              text: 'Quam Aenean Condimentum'
            },
            {
              icon: 'check',
              text: 'Ligula Porta Vehicula'
            },
            {
              icon: 'check',
              text: 'Amet Tristique Euismod'
            }
          ]
        },
        {
          image: require('../assets/images/english.png'),
          title: 'Engelska',
          text: 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper.',
          path:'/engelska',
          checkpoints: [
            {
              icon: 'check',
              text: 'Purus Etiam Risus Lorem'
            },
            {
              icon: 'check',
              text: 'Quam Aenean Condimentum'
            },
            {
              icon: 'check',
              text: 'Ligula Porta Vehicula'
            },
            {
              icon: 'check',
              text: 'Amet Tristique Euismod'
            }
          ]
        },
              {
          image: require('../assets/images/math.png'),
          title: 'Matte',
          text: 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper.',
          path:'/matte',
          checkpoints: [
            {
              icon: 'check',
              text: 'Purus Etiam Risus Lorem'
            },
            {
              icon: 'check',
              text: 'Quam Aenean Condimentum'
            },
            {
              icon: 'check',
              text: 'Ligula Porta Vehicula'
            },
            {
              icon: 'check',
              text: 'Amet Tristique Euismod'
            }
          ]
        }
      ],
      video_title: 'Hur funkar det?',
      video_image: require('../assets/images/class.png'), 
      video_path: require('../assets/images/video-alt-image.png'),
      usp_title: 'Varför Schoolflow?',
      usps: [
        {
          image: require('../assets/images/studying-child.png'),
          text: 'Anpassad uifrån årskurs och ämnen', 
          class: 'first'
        },
        {
          image: require('../assets/images/tasks.png'),
          text: 'Ge ditt barn chans att nå kunskapskraven även utanför skoltid',
          class: 'second'
        },
        {
          image: require('../assets/images/teaching.png'),
          text: 'Läraren får ägna mer tid åt att vara aktiv på lektionerna',
          class: 'third'
        }
      ]
    }
  }
}
</script>