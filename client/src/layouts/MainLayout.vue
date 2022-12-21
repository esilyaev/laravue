<script setup>
import { onBeforeMount } from 'vue'
import { useUsers } from '@/stores/user'
import ApplicationLogo from '@/components/ApplicationLogo.vue'
import { useRouter } from 'vue-router';



const store = useUsers()

const auth = store.authUser

onBeforeMount(() => {
  if (!store.hasUserData) {
    store.getData()
  }
})

const submitLogout = () => {
  store.logout()
}

const router = useRouter()

const goToLogin = () => {
  router.push('login')
}
</script>


<template>
  <q-layout view="hHh lpR fFf">

    <q-header elevated class="text-white bg-primary">
      <q-toolbar>
        <q-toolbar-title>
          OpenDocs
        </q-toolbar-title>

        <q-btn outline @click="submitLogout" v-if="auth">Logout</q-btn>
        <q-btn outline @click="goToLogin" v-if="!auth">Login</q-btn>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <slot />
    </q-page-container>

  </q-layout>
</template>

