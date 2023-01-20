/**
 * Vérifie qu'une chaine correspond à une adresse email.
 *
 * @param email
 * @returns {boolean}
 */
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

/**
 * Vérifie que la chaine correspond à un numéro de téléphone.
 *
 * @param phone
 * @returns {boolean}
 */
function validatePhone(phone) {
  var regex = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  return regex.test(phone);
}