<!doctype html>
<html >
  <head>
    <script>
      window.opener.oauth = <?php
      $code = sanitize_text_field($_GET['code']);
echo json_encode(array(
  'status'=> 1,
  'code'=>$code
));
      ?>;
      self.close ();
    </script>
  </head>
  <body>

</html>