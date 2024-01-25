<script>
import axios from 'axios';

export default {
  data() {
    return {
      lista: [],
    }
  },
  mounted() {
    axios
      .get('http://localhost/')
      .then((res) => {
        console.log("lista", res.data);
        this.lista = res.data;
      });
  },
};
</script>

<template>
  <h1>TO DO LIST</h1>
  <ul>
    <li v-for="elemento in lista">
      {{ elemento.name }}
    </li>
  </ul>
</template>

<style scoped></style>
