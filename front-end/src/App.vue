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
  methods: {
    delTask(index) {
      console.log("delete task " + index);
    }
  }
};
</script>

<template>
  <h1>TO DO LIST</h1>
  <ul>
    <li v-for="(elemento, index) in lista">
      {{ elemento.name }}
      <button @click="delTask(index)" type="button">X</button>
    </li>
  </ul>
</template>

<style scoped></style>
