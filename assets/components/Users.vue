<template>
  <div>
    <h1>Users</h1>
    <table class="table table-hover">
      <thead>
        <tr>
            <td>Prénom</td>
            <td>Nom</td>
            <td>Actions</td>
        </tr>
      </thead>
      <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.firstname }}</td>
            <td>{{ user.lastname }}</td>
            <td>
              <button class="" v-on:click="deleteUser(user.id)">Supprimer</button>
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
        users: []
    }
  },

  mounted() {
    this.getUsers()
  },

  methods: {

    getUsers() {
      this.axios.get('http://localhost:8000/users').then((response) => {
          this.users = response.data.users;
      });
    },

    deleteUser(userId) {
      this.users.splice(userId, 1);
      this.axios.delete('http://localhost:8000/users/' + userId).then((response) => {
        this.getUsers()
      });
    }

  }

}
</script>

<style>

</style>