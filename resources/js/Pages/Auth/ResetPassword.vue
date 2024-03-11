<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import InputError from '@/Components/Admin/InputError.vue'
import InputLabel from '@/Components/Admin/InputLabel.vue'
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue'
import TextInput from '@/Components/Admin/TextInput.vue'
import { Head, useForm } from '@inertiajs/vue3'

const props = defineProps({
  email: {
    type: String,
    required: true
  },
  token: {
    type: String,
    required: true
  }
})

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: ''
})

const submit = () => {
  form.post(route('password.store'), {
    onFinish: () => form.reset('password', 'password_confirmation')
  })
}
</script>

<template>
  <GuestLayout>
    <Head title="Сброс пароля" />

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="email" value="Email" />

        <TextInput
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          required
          autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email" />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="Password" />

        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="Confirm Password" />

        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <div class="flex items-center justify-end mt-4">
        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
          Reset Password
        </PrimaryButton>
      </div>
    </form>

      <main class="bg-white">

          <div class="relative flex">

              <!-- Content -->
              <div class="w-full md:w-1/2">
                  <div class="min-h-screen h-full flex flex-col after:flex-1">

                      <div class="flex-1">
                          <div class="flex items-center justify-center h-16 px-4 sm:px-6 lg:px-8">
                              <!-- Logo -->
                              <Link href="/">
                                  <svg width="32" height="32" viewBox="0 0 32 32">
                                      <defs>
                                          <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%"
                                                          id="logo-a">
                                              <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"/>
                                              <stop stop-color="#A5B4FC" offset="100%"/>
                                          </linearGradient>
                                          <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                              <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"/>
                                              <stop stop-color="#38BDF8" offset="100%"/>
                                          </linearGradient>
                                      </defs>
                                      <rect fill="#6366F1" width="32" height="32" rx="16"/>
                                      <path
                                          d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                                          fill="#4F46E5"/>
                                      <path
                                          d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                                          fill="url(#logo-a)"/>
                                      <path
                                          d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                                          fill="url(#logo-b)"/>
                                  </svg>
                              </Link>
                          </div>
                      </div>

                      <div class="max-w-sm mx-auto px-4 py-8">
                          <h1 class="text-3xl text-slate-800 font-bold mb-6">Подтверждение пароля ✨</h1>
                          <!-- Form -->
                          <form @submit.prevent="submit">
                              <div class="space-y-4">
                                  <div>
                                      <InputLabel for="email" value="Email *" />

                                      <TextInput
                                          id="email"
                                          type="email"
                                          class="mt-1 block w-full"
                                          v-model="form.email"
                                          required
                                          autofocus
                                          autocomplete="username"
                                      />

                                      <InputError class="mt-2" :message="form.errors.email" />
                                  </div>

                                  <div class="mt-4">
                                      <InputLabel for="password" value="Пароль *" />

                                      <TextInput
                                          id="password"
                                          type="password"
                                          class="mt-1 block w-full"
                                          v-model="form.password"
                                          required
                                          autocomplete="new-password"
                                      />

                                      <InputError class="mt-2" :message="form.errors.password" />
                                  </div>

                                  <div class="mt-4">
                                      <InputLabel for="password_confirmation" value="Подтверждение пароля *" />

                                      <TextInput
                                          id="password_confirmation"
                                          type="password"
                                          class="mt-1 block w-full"
                                          v-model="form.password_confirmation"
                                          required
                                          autocomplete="new-password"
                                      />

                                      <InputError class="mt-2" :message="form.errors.password_confirmation" />
                                  </div>
                              </div>
                              <div class="flex justify-center mt-6">
                                  <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                      Сбросить пароль
                                  </PrimaryButton>
                              </div>
                          </form>
                      </div>

                  </div>
              </div>

              <!-- Image -->
              <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
                  <img class="object-cover object-center w-full h-full" src="../../../images/auth-image.jpg"
                       width="760"
                       height="760" alt="Authentication"/>
              </div>

          </div>

      </main>

  </GuestLayout>
</template>
