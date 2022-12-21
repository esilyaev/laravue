<script setup>
import { useRouter } from 'vue-router'
import { useUsers } from '@/stores/user'
import { computed, ref } from 'vue'
import ValidationErrors from '../../components/ValidationErrors.vue'
import EmptyLayout from '../../layouts/EmptyLayout.vue'



const store = useUsers()

const form = ref({
  email: '',
  password: '',
  remember: false,
})

const processing = ref(false)

const setErrors = ref()

const errors = computed(() => setErrors.value)



form.value = store.userLogin

const submitLogin = () => {
  store.login(setErrors, processing)
}

const router = useRouter()
const toRegister = () => {
  router.push('register')
}
</script>

<template>
  <EmptyLayout>
    <q-page padding class="flex items-center justify-center">
      <q-card class="bg-grey-1 q-pa-md" style="min-width: 400px;  ">
        <q-form @submit="submitLogin" class="q-gutter-md ">
          <q-card-section>
            <div class="justify-center row">
              <div class="text-h4">Вход</div>

            </div>
            <ValidationErrors :errors="errors" />
          </q-card-section>
          <q-card-section>
            <q-input class="w-auto" type="email" v-model="form.email"
              label="Email" lazy-rules
              :rules="[val => val && val.length > 0 || 'Please type something']" />

            <q-input type="password" v-model="form.password" label="Password"
              lazy-rules
              :rules="[val => val && val.length > 0 || 'Please type something']" />
          </q-card-section>
          <q-separator />
          <q-card-actions align="right">
            <q-btn label="Войти" type="submit" color="primary" />
            <q-btn label="Зарегистрироваться" @click="toRegister"
              color="primary" flat class="q-ml-sm" />
          </q-card-actions>
        </q-form>

      </q-card>
    </q-page>
  </EmptyLayout>
</template>
