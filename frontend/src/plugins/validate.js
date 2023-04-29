import { defineRule, configure } from 'vee-validate'
import {
  required,
  email,
  image,
  mimes,
  size,
  dimensions,
  max,
  alpha_spaces
} from '@vee-validate/rules'
import { localize } from '@vee-validate/i18n'

defineRule('required', required)
defineRule('email', email)
defineRule('image', image)
defineRule('mimes', mimes)
defineRule('size', size)
defineRule('dimensions', dimensions)
defineRule('max', max)
defineRule('alpha_spaces', alpha_spaces)

configure({
  validateOnInput: true,
  generateMessage: localize('en', {
    messages: {
      required: 'The {field} field is required.',
      email: 'The {field} field must be a valid email address.',
      image: 'The {field} file must be an image.',
      mimes: 'The {field} field must be a file of type 0:{value} 1:{value}.',
      size: 'The {field} file cannot be larger than 0:{size} kilobytes.',
      max: 'The {field} field must not be greater than 0:{max} characters.',
      alpha_spaces: 'The {field} field  must only contain letters and spaces.'
    }
  })
})
