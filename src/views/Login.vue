<template>
  <div class="login page">
    <div class="login-title">{{ login_title }}</div>
    <form>
      <div class="field-wrapper">
        <label class="login-sub-title">{{ username_title }}</label>
        <input type="text" class="field">
      </div>

       <div class="field-wrapper">
        <label class="login-sub-title">{{ password_title }}</label>
        <input type="text" class="field">
      </div>

      <input type="submit" class="login-submit-buttom" value="Logga in">

    </form>
  </div>
</template>
<script>
export default {
  data () {
    return {
      login_title: 'Logga in',
      username_title: 'Användarnamn', 
      password_title: 'Lösenord' 
    }
  }
}
</script>