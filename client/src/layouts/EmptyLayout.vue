<script setup>
import ApplicationLogo from '@/components/ApplicationLogo.vue'
</script>

<template>
  <q-layout view="hHh lpR fFf">

    <q-header elevated class="bg-primary text-white">
      <q-toolbar>
        <q-toolbar-title>
          <q-avatar>
            <application-logo />
          </q-avatar>
          Title
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <slot />
    </q-page-container>

  </q-layout>
</template>
