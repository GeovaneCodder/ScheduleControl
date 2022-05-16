import { createI18n } from 'vue-i18n'
import pt_br from './pt_br'

const lang = {
    pt_br: pt_br 
}

export default createI18n({
    locale: 'pt_br',
    fallbackLocale: 'pt_br',
    messages: lang
})