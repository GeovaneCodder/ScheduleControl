interface stringLenght {
  min: number,
  max: number
}

const validateStringLength = (string: string, values: stringLenght) => {
  const size = string.length

  return (size < values.min || size > values.max)
    ? false
    : true
}

export default validateStringLength