<template>
  <div>
    <h1>Tasks</h1>
    <table class="table table-hover">
      <thead>
        <tr>
            <td>Titre</td>
            <td>Qui ?</td>
            <td>Actions</td>
        </tr>
      </thead>
      <tbody>
          <tr v-for="task in tasks" :key="task.id">
            <td>{{ task.title }}</td>
            <td>{{ task.user }}</td>
            <td>
              <button class="" v-on:click="deleteTask(task.id)">Supprimer</button>
            </td>
          </tr>
      </tbody>
  </table>
  </div>
</template>

<script>
export default {

data() {
    return {
        tasks: []
    }
  },

  mounted() {
    this.getTasks()
  },

  methods: {

    getTasks() {
      this.axios.get('http://localhost:8000/tasks').then((response) => {
          this.tasks = response.data.tasks;
      });
    },

    deleteTask(taskId) {
      this.tasks.splice(taskId, 1);
      this.axios.delete('http://localhost:8000/tasks/' + taskId).then((response) => {
        this.getTasks()
      });
    }

  }
}
</script>

<style>

</style>