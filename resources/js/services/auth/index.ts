// import {
//   validateEmail,
//   validateStringLength,
//   toast,
//   traslate
// } from '../../helpers'

import api from '../../api'



const makeAuth = async (email: string, password: string) => {
  await api.post('/auth/login', {
    email,
    password
  })
    .then(data => console.log(data))
}

export {
  makeAuth
}