<html>
<head>
<title>Random Password Generator</title>
</head>
<body>
<script>
function generatePassword(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

document.write(generatePassword(10));
</script>
</body>
</html>