import { reactive } from 'vue'
import { validateEmailAndPassword } from '../helpers'
import { makeAuth } from '../services/auth'

const state = reactive({
  email: '',
  password: '',
})

const actions = {
  login(): void {
    // if (! validateEmailAndPassword(state.email, state.password)) {
    //   return
    // }

    makeAuth(state.email, state.password)
  }
}

export default {
  state,
  actions,
}