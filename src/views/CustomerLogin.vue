<template>
  <div class="customer page">
    <div v-for="customer in uniq_customer" :key="customer">
    <div class="customer-firstname">{{ customer.first_name }}</div>
    </div>

    <div class="customer-info-wrapper">
      <div class="customer-name">
        {{ customer.name }}
      </div>
      <div class="customer-address">
        {{ customer.address }}
        {{ customer.zip }}
        {{ customer.city }}
      </div>
      <div class="customer-contact">
        {{ customer.email }}
        {{ customer.phone }}
      </div>
    </div>
    <form class="change-form">
      <div class="form_title">{{ mail.form_title }}</div>
      <div>
      <input class="field" type="text" :value="customer.name">
      </div>
      <input type="submit" class="save-button" value="Spara">
      <div class="form_sub_title">{{ mail.sub_title }}</div>
    </form>
    <form class="change-form">
      <div class="form-title"> {{ password.form_title }}</div>
      <input  class="field" type="text">

    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {

    }
  }
}
</script>