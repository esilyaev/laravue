<script setup>
import MainLayout from '../layouts/MainLayout.vue';
import { ref } from 'vue'
import axios from '../lib/axios';
import moment from 'moment';
import 'moment/dist/locale/ru';
moment.locale('ru')

const issues = ref([])

axios.get('api/issue').then(
  (data) => {
    console.log(data)
    issues.value = [...data.data]
  }
)

const columns = [
  { name: 'id', label: '#', field: 'id' },
  { name: 'title', label: 'Замечание', field: 'title', align: "left" },
  { name: 'type', label: 'Тип', field: (item) => item.issue_type.title, align: "left" },
  { name: 'created_at', label: 'Создано', field: (item) => moment(item.created_at).format('ll') },
]
</script>

<template>
  <main-layout>
    <q-page padding>
      <div class="q-pa-md">
        <q-table title="Замечания" :rows="issues" :columns="columns"
          :pagination="{ rowsPerPage: 10 }"
          :rows-per-page-options="[10, 20, 50]" row-key="name" />
      </div>

    </q-page>
  </main-layout>
</template>
