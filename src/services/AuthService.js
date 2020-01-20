import axios from 'axios';
const url = 'http://localhost/Examensarbete/schoolflow/login/';
export default {
  login(credentials) {
    return axios
      .post(url + 'login/', credentials)
      .then(response => console.log(response.data));
  },
  signUp(credentials) {
    return axios
      .post(url + 'sign-up/', credentials)
      .then(response => response.data);
  },
  getSecretContent() {
    return axios.get(url + 'secret-route/').then(response => response.data);
  }
}
