import validateEmail from './validate_email'
import notification from './toast'
import validateStringLength from './validate_string_lenght'
import validateEmailAndPassword from './validate_email_password'
import toast from './toast'
import i18n from '../langs'

/** 
 * É instacia de i18n
 * para que realizada as traduções
 * fora dos arquivos .vue
 */
const traslate: any = i18n.global

export {
  validateEmail,
  notification,
  validateStringLength,
  validateEmailAndPassword,
  toast,
  traslate
}