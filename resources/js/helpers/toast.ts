import { useToast } from 'vue-toastification'

const toast = useToast()

const notification = (message: String, type: string) => {
  switch (type) {
    case 'SUCCESS':
      toast.success(message)
      break;

    case 'ERROR':
      toast.error(message)
      break;

    default:
      toast.info(message)
      break;
  }

}

export default notification