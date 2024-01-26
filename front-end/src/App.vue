<script>
import axios from 'axios';

export default {
  data() {
    return {
      allTasks: [],
      newTask: '',
    }
  },
  methods: {
    delTask(index) {

      const t = this;
      const params = {
        params: {
          index: index
        }
      };
      axios.get("http://localhost/deletePost.php", params)
        .then(res => {
          t.allTasks = res.data;
        })
        .catch(err => console.log(err));
    },
    pushTask(index) {

      const t = this;
      const params = {
        text: this.newTask
      };
      const config = {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      };
      axios.post('http://localhost/pushPost.php', params, config)
        .then(res => {
          t.allTasks = res.data;
          t.newTask = "";
        }).catch(err => console.log(err));
    },
    changeStatus(index) {
      const task = this.allTasks[index];
      task.done = !task.done;
    }
  },
  mounted() {
    axios
      .get('http://localhost/index.php')
      .then((res) => {
        console.log("allTasks", res.data);
        this.allTasks = res.data;
      });
  }
};
</script>

<template>
  <h1>TO DO LIST</h1>
  <form @submit.prevent="pushTask">
    <input type="text" name="text" v-model="newTask">
    <input type="submit" value="ADD">
  </form>
  <ul>
    <li v-for="(task, index) in allTasks" :key="index" @click="changeStatus(index)" :class="{ 'barrato': task.done }">
      {{ task.name }}
      <button @click="delTask(index)">X</button>
    </li>
  </ul>
</template>

<style scoped>
.barrato {
  text-decoration-line: line-through;
}
</style>
