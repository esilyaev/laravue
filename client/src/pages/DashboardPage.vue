<script setup>
import { ref, onMounted } from 'vue'
import { storeToRefs } from 'pinia'

import moment from '../lib/moment';
import { useIssueStore } from '../stores/issue';
import MainLayout from '../layouts/MainLayout.vue';

const issueStore = useIssueStore()
const { issues, isLoading } = storeToRefs(issueStore)

onMounted(() => {
  issueStore.fetchIssues()
})

const columns = [
  { name: 'id', label: '#', field: 'id' },
  { name: 'title', label: 'Замечание', field: 'title', align: "left" },
  { name: 'type', label: 'Тип', field: (item) => item.issue_type.title, align: "left" },
  { name: 'created_at', label: 'Создано', field: (item) => moment(item.created_at).format('ll') },
]


</script>

<template>
  <main-layout>
    <q-page ref="page">
      <q-table :loading="isLoading" class="absolute-full q-pa-md" title="Замечания" :rows="issues" :columns="columns"
        :pagination="{ rowsPerPage: 20 }" :rows-per-page-options="[20, 50]" row-key="name" virtual-scroll />


    </q-page>
  </main-layout>
</template>
