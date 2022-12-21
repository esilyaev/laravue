<script setup>
defineProps(['errors'])
</script>

<template>
  <div v-if="errors">
    <div class="text-red-10 text-small">
      Whoops! Something went wrong.
    </div>
    <ul class="">
      <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
    </ul>
  </div>
</template>
