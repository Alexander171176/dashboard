<script setup>
import { computed } from 'vue'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import PrimaryButton from '@/Components/Admin/PrimaryButton.vue'
import { Head, Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  status: {
    type: String
  }
})

const form = useForm({})

const submit = () => {
  form.post(route('verification.send'))
}

const verificationLinkSent = computed(() => props.status === 'verification-link-sent')
</script>

<template>
  <GuestLayout>
    <Head title="Проверка электронной почты" />

    <div class="mb-4 text-sm text-gray-600">
        Спасибо за регистрацию! Прежде чем приступить к работе,
        не могли бы вы подтвердить свой адрес электронной почты,
        нажав на ссылку, которую мы только что отправили вам по электронной почте?
        Если вы не получили электронное письмо, мы с радостью отправим вам другой.
    </div>

    <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
        На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.
    </div>

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
                              <div class="flex justify-center mt-6">
                                  <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                      Отправить письмо на Email для подтверждения
                                  </PrimaryButton>
                              </div>
                              <div class="flex justify-center mt-6">
                                  <Link
                                      :href="route('logout')"
                                      method="post"
                                      as="button"
                                      class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                  >Выход из системы</Link>
                              </div>
                          </form>
                          </div>
                      </div>

                  </div>
              </div>

          <!-- Image -->
          <div class="hidden md:block absolute top-0 bottom-0 right-0 md:w-1/2" aria-hidden="true">
              <img class="object-cover object-center w-full h-full" src="../../../images/auth-image.jpg"
                   width="760"
                   height="760" alt="Authentication"/>
          </div>

      </main>

  </GuestLayout>
</template>
