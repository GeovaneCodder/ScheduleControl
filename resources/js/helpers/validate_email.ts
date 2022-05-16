const validateEmail = (email: string): boolean => {
  const partern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
  return partern.test(email)
    ? true
    : false
}

export default validateEmail