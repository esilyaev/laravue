<script setup>
import MainLayout from '../layouts/MainLayout.vue';
import { ref } from 'vue'
import axios from '../lib/axios';
import moment from '../lib/moment';



const issues = ref([])

axios.get('api/issue').then(
  (data) => {
    issues.value = [...data.data]
  }
)

const page = ref(null)

const columns = [
  { name: 'id', label: '#', field: 'id' },
  { name: 'title', label: 'Замечание', field: 'title', align: "left" },
  { name: 'type', label: 'Тип', field: (item) => item.issue_type.title, align: "left" },
  { name: 'created_at', label: 'Создано', field: (item) => moment(item.created_at).format('ll') },
]

// onMounted(() => {
//   dom.height(page)
// })

</script>

<template>
  <main-layout>
    <q-page ref="page">

      <q-table class="absolute-full q-pa-md" title="Замечания" :rows="issues" :columns="columns"
        :pagination="{ rowsPerPage: 20 }" :rows-per-page-options="[20, 50]" row-key="name" virtual-scroll />


    </q-page>
  </main-layout>
</template>
