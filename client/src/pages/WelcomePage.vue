<script setup>
import { useUsers } from '../stores/user'
import MainLayout from '../layouts/MainLayout.vue'

const store = useUsers()

const auth = store.authUser
</script>

<template>
  <main-layout>
    <q-page padding>
      <div class="text-h1">Welcome {{ auth }}</div>
      <router-link to="dashboard">Dashboard</router-link>
    </q-page>
  </main-layout>

</template>


