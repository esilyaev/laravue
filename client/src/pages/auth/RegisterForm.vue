<script setup>
import { useUsers } from '@/stores/user'
import { computed, ref } from 'vue'

import EmptyLayout from '../../layouts/EmptyLayout.vue'
import { useRouter } from 'vue-router'
import ValidationErrors from '../../components/ValidationErrors.vue';

const store = useUsers()

const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
})

const router = useRouter()

const processing = ref(false)

const setErrors = ref()

const errors = computed(() => setErrors.value)

const submitRegister = () => {
  store.register(form, setErrors, processing)
}

const toLogin = () => {

  router.push('login')
}

</script>

<template>
  <EmptyLayout>
    <q-page padding class="flex items-center justify-center">
      <q-card class="bg-grey-1 q-pa-md" style="min-width: 400px;  ">
        <q-form @submit="submitRegister" class="q-gutter-md ">
          <q-card-section>
            <div class="justify-center row">
              <div class="text-h4">Регистрация</div>
            </div>
            <ValidationErrors :errors="errors" />
          </q-card-section>
          <q-card-section>
            <q-input class="w-auto" type="text" v-model="form.name" label="Name"
              lazy-rules
              :rules="[val => val && val.length > 0 || 'Please type something']" />

            <q-input type="email" v-model="form.email" label="Email" lazy-rules
              :rules="[val => val && val.length > 0 || 'Please type something']" />
            <q-input type="password" v-model="form.password" label="Password"
              lazy-rules
              :rules="[val => val && val.length > 0 || 'Please type something']" />
            <q-input type="password" v-model="form.password_confirmation"
              label="Confirm your password" lazy-rules
              :rules="[val => val && val.length > 0 || 'Please type something']" />
          </q-card-section>
          <q-separator />
          <q-card-actions align="right">
            <q-btn type="submit" color="primary">Зарегистрироваться </q-btn>
            <q-btn @click="toLogin" flat class="q-ml-sm">Уже
              зарегистрированы?</q-btn>
          </q-card-actions>
        </q-form>

      </q-card>
    </q-page>


  </EmptyLayout>
</template>
