<template>
  <div class="flex items-center justify-center body-bg h-screen">
    <div class="">
      <main class="bg-white max-w-md mx-auto p-8 md:p-5 rounded-lg shadow-2xl">
        <section class="section-header">
          <h3 class="font-bold text-1xl">
            {{ $t("login.welcome_to") }} {{ $t("enterprise") }}
          </h3>
          <p class="text-gray-600 pt-2">
            {{ $t("login.sing_in_to_continue") }}.
          </p>
        </section>

        <section class="mt-10">
          <form class="flex flex-col" method="POST" action="#">
            <div class="mb-6 pt-3 rounded bg-gray-200">
              <label
                class="block text-gray-700 text-sm font-bold mb-2 ml-3"
                for="email"
                >{{ $t("email") }}</label
              >
              <input
                v-model="authStore.state.email"
                type="email"
                id="email"
                class="
                  bg-gray-200
                  rounded
                  w-full
                  text-gray-700
                  focus:outline-none
                  border-b-4 border-gray-300
                  focus:border-purple-600
                  transition
                  duration-500
                  px-3
                  pb-3
                "
              />
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
              <label
                class="block text-gray-700 text-sm font-bold mb-2 ml-3"
                for="password"
                >{{ $t("password") }}</label
              >
              <input
                v-model="authStore.state.password"
                type="password"
                id="password"
                class="
                  bg-gray-200
                  rounded
                  w-full
                  text-gray-700
                  focus:outline-none
                  border-b-4 border-gray-300
                  focus:border-purple-600
                  transition
                  duration-500
                  px-3
                  pb-3
                "
              />
            </div>
            <div class="flex justify-end">
              <a
                href="#"
                class="
                  text-sm text-purple-600
                  hover:text-purple-700 hover:underline
                  mb-6
                "
                >{{ $t("login.forgot_password") }}</a
              >
            </div>
            <button
              type="button"
              @click="authStore.actions.login()"
              class="
                bg-purple-600
                hover:bg-purple-700
                text-white
                font-bold
                py-2
                rounded
                shadow-lg
                hover:shadow-xl
                transition
                duration-200
              "
            >
              {{ $t("login.sing_in") }}
            </button>
          </form>
        </section>
      </main>

      <div class="max-w-lg mx-auto text-center mt-6">
        <p class="text-white">
          {{ $t("login.dont_have_a_account") }}
          <a href="#" class="font-bold hover:underline">{{
            $t("login.sing_up")
          }}</a
          >.
        </p>
      </div>

      <!-- <footer class="max-w-lg mx-auto flex justify-center text-white">
        <a href="#" class="hover:underline">Contact</a>
        <span class="mx-3">•</span>
        <a href="#" class="hover:underline">Privacy</a>
    </footer> -->
    </div>
  </div>
</template>

<script lang="ts">
import { inject } from "vue";

export default {
  name: "login",

  setup() {
    const store: any = inject("store");

    return {
      authStore: store.auth,
    };
  },
};
</script>

<style lang="scss" scoped>
.body-bg {
  background-color: #9921e8;
  background-image: linear-gradient(315deg, #9921e8 0%, #5f72be 74%);
}

.section-header {
  text-align: center;
}
</style>
