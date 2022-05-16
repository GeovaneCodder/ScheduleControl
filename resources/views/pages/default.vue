<template>
  <router-view></router-view>
</template>
<script lang="ts">
import { provide } from 'vue'
import store from '../../js/store'

export default {
  setup() {
    /** Prover o estado global da aplicação */
    provide('store', store)
  }
}
</script>
