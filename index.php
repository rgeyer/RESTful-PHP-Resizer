<html>
<head>

</head>
<body>
<form action="resizer.php" method="POST" enctype="multipart/form-data">
  <div class="formField">
    <label for="picture">Picture:</label>
    <input type="file" name="picture" id="picture"/>
  </div>
  <div class="formField">
    <label for="largestDimInPx">Largest Dimension in Px:</label>
    <input type="text" name="largestDimInPx" id="largestDimInPx"/>
  </div>
  <input type="submit" name="Submit" value="Submit" />
  <input type="hidden" name="param[unique_id]" value="123456" />
  <input type="hidden" name="param[other]" value="Something else useful" />
</form>
</body>
</html>