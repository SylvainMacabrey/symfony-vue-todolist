<template>
  <div>
    <nav>
        <router-link :to="{ name: 'Tasks' }" class="btn btn-primary">Tâches</router-link>
        <router-link :to="{ name: 'Users' }" class="btn btn-primary">Utilisateurs</router-link>
    </nav>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
    
}
</script>

<style>

</style>