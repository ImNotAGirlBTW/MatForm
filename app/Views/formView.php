<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <style>
        
        </style>
</head>
<body class="body">
    <h1>HHHH</h1>
    <label for="D1">BMW</label>
    <input name="Drama" type="checkbox" id="D1"  value="BMW"   > <br>

    <label for="D2">Mercedes</label>
    <input name="Drama"type="checkbox" id="D2"  value="Mercedes"   > <br>
    
    <label for="D3">Audi</label>
    <input name="Drama"type="checkbox" id="D3"  value="Audi"  > <br>
    

    <button onclick="handleButtonClick()">Click me</button>
<?php
if(isset($button)){
    echo $button;
}
?>
    <p id="text" style="display:none">Podmínky splněny</p>
    
    <script>
        function getCheckedCheckboxes() {
            var num =0;
            var text = document.getElementById("text")

  const checkboxes = document.querySelectorAll('input[type="checkbox"]');

  const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);

  const checkedValues = checkedCheckboxes.map(checkbox => checkbox.value);

  const jsonized = JSON.stringify(checkedValues);

  $.ajax('<?= base_url('genPdf'); ?>', {
    type: "POST",
    data: {data: jsonized},
    dataType:'json',
    success: function(res) {
        
    } 
  })
        
  if(checkedValues.length >= 2)
  {
text.style.display = "block";
checkboxes.forEach(checkbox => {
    const label = document.querySelector(`label[for="${checkbox.id}"]`); 
            
    if (!checkbox.checked) {
                checkbox.style.display = "none";
            }

            if (label) {
                label.style.display = checkbox.checked ? "inline" : "none";
            }
        });

//window.location.href = '<?php echo base_url('listView')?>';
  }
  return checkedValues;
}

function handleButtonClick() {
    const result = getCheckedCheckboxes();
    console.log(result);
}
    </script>
</body>
</html>