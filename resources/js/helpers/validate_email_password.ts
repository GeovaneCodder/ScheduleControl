import {
  validateEmail,
  validateStringLength,
  toast,
  traslate
} from '../helpers'

const validateEmailAndPassword = (email: string, password: string): boolean => {
  let error = null
    const passwordLenght = {
      min: 6,
      max: 20
    }

    if (! validateEmail(email)) {
      error = traslate.t('login.messages.invalid_email')
    }

    if (! validateStringLength(password, passwordLenght)) {
      error = traslate.t('login.messages.invalid_password', passwordLenght)
    }
    
    if (error) {
       toast(error, 'ERROR')
       return false
    }
    
    return true
}

export default validateEmailAndPassword