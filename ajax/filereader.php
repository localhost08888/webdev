<!DOCTYPE html>
<html>
<body>
  <h1>Ajax File Reader</h1>

  <label for="fileName">Enter File Name:</label>
  <input type="text" id="fileName" placeholder="example.txt">
  <br>
  <button onclick="readFile()">Read File</button>

  <div id="fileContent" style="margin-top: 20px; border: 1px solid #ccc; padding: 10px;"></div>




  <script>
    function readFile() {
      var fileName = document.getElementById("fileName").value.trim();
      if (fileName === "") {
        alert("Please enter a file name!");
        return;
      }

      var xhr = new XMLHttpRequest();
      xhr.open("GET", fileName, true);

      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
          if (xhr.status == 200) {
            document.getElementById("fileContent").innerHTML = xhr.responseText;
          }
          else {
            document.getElementById("fileContent").innerHTML = "<span>Error: File not found!</span>";
          }
        }
      };

      xhr.send();
    }
  </script>
</body>

</html>